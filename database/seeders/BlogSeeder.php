<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $author = User::query()->where('email', 'admin@gemlock.vn')->first()
            ?? User::query()->first();

        if (! $author) {
            $this->command?->warn('No users found, skipping BlogSeeder.');

            return;
        }

        $categories = BlogCategory::query()
            ->where('is_active', true)
            ->pluck('name', 'id');

        if ($categories->isEmpty()) {
            $this->command?->warn('No blog categories found, skipping BlogSeeder.');

            return;
        }

        $posts = [
            [
                'title' => 'Giới thiệu về khóa cửa thông minh Gemlock',
                'excerpt' => 'Tổng quan về các dòng khóa cửa thông minh Gemlock, ưu điểm và các tính năng nổi bật.',
                'content' => "Khóa cửa thông minh Gemlock mang đến giải pháp an toàn và tiện lợi cho ngôi nhà hiện đại.\n\nVới khả năng mở khóa bằng vân tay, mã số, thẻ từ và chìa cơ dự phòng, Gemlock phù hợp với nhiều nhu cầu sử dụng khác nhau.\n\nTrong bài viết này, chúng ta sẽ cùng tìm hiểu các dòng sản phẩm chủ lực và những ưu điểm mà Gemlock mang lại.",
            ],
            [
                'title' => '5 lưu ý khi lắp đặt khóa cửa điện tử',
                'excerpt' => 'Những điểm quan trọng cần kiểm tra trước khi lắp đặt khóa cửa điện tử Gemlock.',
                'content' => "Để khóa cửa điện tử hoạt động ổn định và bền bỉ, việc lắp đặt đúng kỹ thuật là vô cùng quan trọng.\n\nBạn cần lưu ý về độ dày cửa, loại chất liệu cửa, nguồn điện cấp cho khóa và vị trí lắp đặt.\n\nBài viết sẽ gợi ý cho bạn các bước kiểm tra cơ bản trước khi hẹn lịch lắp đặt.",
            ],
            [
                'title' => 'So sánh khóa cơ truyền thống và khóa thông minh',
                'excerpt' => 'Khóa cơ hay khóa thông minh phù hợp hơn với nhu cầu sử dụng hiện nay?',
                'content' => "Khóa cơ truyền thống có ưu điểm là đơn giản, chi phí thấp nhưng hạn chế về tính tiện dụng.\n\nKhóa thông minh Gemlock giúp bạn quản lý ra vào dễ dàng, cấp quyền tạm thời cho khách và theo dõi lịch sử mở cửa.\n\nTùy theo ngân sách và nhu cầu, bạn có thể lựa chọn giải pháp phù hợp nhất cho gia đình.",
            ],
        ];

        $categoryIds = $categories->keys()->all();
        $categoryNames = $categories->values()->all();

        foreach ($posts as $index => $data) {
            $categoryId = $categoryIds[$index % count($categoryIds)];
            $categoryName = $categoryNames[$index % count($categoryNames)];

            Blog::updateOrCreate(
                ['slug' => Str::slug($data['title'])],
                [
                    'title' => $data['title'],
                    'excerpt' => $data['excerpt'],
                    'content' => $data['content'],
                    'thumbnail' => null,
                    'author_name' => $author->name,
                    'blog_category_id' => $categoryId,
                    'category' => $categoryName,
                    'is_active' => true,
                    'is_featured' => $index === 0,
                    'published_at' => now()->subDays(3 - $index),
                ],
            );
        }
    }
}

