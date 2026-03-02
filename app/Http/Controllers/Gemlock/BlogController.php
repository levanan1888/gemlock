<?php

namespace App\Http\Controllers\Gemlock;

use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class BlogController extends Controller
{
    public function index()
    {
        return view('gemlock.blog');
    }

    public function show(string $slug)
    {
        $posts = $this->demoPosts();

        /** @var array|null $post */
        $post = collect($posts)->firstWhere('slug', $slug);

        abort_unless($post, 404);

        return view('gemlock.blog_detail', compact('post'));
    }

    /**
     * Demo data cho blog detail (giống logic cũ ở routes/web.php).
     *
     * @return array<int, array<string, mixed>>
     */
    protected function demoPosts(): array
    {
        return [
            [
                'slug' => 'giai-phap-khoa-thong-minh-can-ho-hien-dai',
                'image' => 'post-1.jpg',
                'title' => 'Giải pháp khóa thông minh cho căn hộ hiện đại',
                'excerpt' => 'Giới thiệu các tiêu chí chọn khóa thông minh phù hợp cho căn hộ chung cư: bảo mật, tiện lợi, thẩm mỹ.',
                'author' => 'Gemlock Team',
                'date' => 'Jan 15, 2026',
                'content' => 'Nội dung demo chi tiết cho giải pháp khóa thông minh căn hộ hiện đại. Bạn có thể thay bằng dữ liệu thật sau này...',
            ],
            [
                'slug' => '5-meo-su-dung-khoa-van-tay-an-toan-hon',
                'image' => 'post-2.jpg',
                'title' => '5 mẹo sử dụng khóa vân tay an toàn hơn',
                'excerpt' => 'Một vài lưu ý đơn giản giúp bạn sử dụng khóa vân tay đúng cách và hạn chế rủi ro bảo mật.',
                'author' => 'Gemlock Team',
                'date' => 'Jan 10, 2026',
                'content' => 'Nội dung demo chi tiết cho 5 mẹo sử dụng khóa vân tay an toàn hơn...',
            ],
            [
                'slug' => 'tich-hop-khoa-thong-minh-vao-smart-home',
                'image' => 'post-3.jpg',
                'title' => 'Tích hợp khóa thông minh vào hệ sinh thái Smart Home',
                'excerpt' => 'Cách kết nối khóa thông minh với hệ sinh thái nhà thông minh để mở khóa từ xa, tự động hóa ngữ cảnh.',
                'author' => 'Gemlock Team',
                'date' => 'Jan 05, 2026',
                'content' => 'Nội dung demo chi tiết cho tích hợp khóa thông minh vào Smart Home...',
            ],
            [
                'slug' => 'chon-khoa-cho-cua-nhom-kinh',
                'image' => 'post-1.jpg',
                'title' => 'Chọn khóa phù hợp cho cửa nhôm kính',
                'excerpt' => 'Tổng hợp những lưu ý khi chọn khóa cho cửa nhôm kính: kích thước, kết cấu, tính năng chống cắt phá.',
                'author' => 'Gemlock Team',
                'date' => 'Dec 28, 2025',
                'content' => 'Nội dung demo chi tiết cho chọn khóa phù hợp cho cửa nhôm kính...',
            ],
            [
                'slug' => 'so-sanh-khoa-face-id-3d',
                'image' => 'post-2.jpg',
                'title' => 'So sánh các dòng khóa Face ID 3D',
                'excerpt' => 'Đánh giá nhanh ưu nhược điểm giữa các dòng khóa nhận diện khuôn mặt 3D phổ biến hiện nay.',
                'author' => 'Gemlock Team',
                'date' => 'Dec 20, 2025',
                'content' => 'Nội dung demo chi tiết cho so sánh các dòng khóa Face ID 3D...',
            ],
            [
                'slug' => 'kinh-nghiem-lap-dat-khoa-thong-minh-biet-thu',
                'image' => 'post-3.jpg',
                'title' => 'Kinh nghiệm lắp đặt khóa thông minh cho biệt thự',
                'excerpt' => 'Chia sẻ kinh nghiệm triển khai khóa thông minh cho nhà diện tích lớn, nhiều cửa ra vào.',
                'author' => 'Gemlock Team',
                'date' => 'Dec 10, 2025',
                'content' => 'Nội dung demo chi tiết cho kinh nghiệm lắp đặt khóa thông minh cho biệt thự...',
            ],
        ];
    }
}

