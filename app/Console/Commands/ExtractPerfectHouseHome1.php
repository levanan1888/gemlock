<?php

namespace App\Console\Commands;

use App\Models\ContentItem;
use Illuminate\Console\Command;

class ExtractPerfectHouseHome1 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'perfecthouse:extract-home1';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Extract fixed Perfect House sections from home1.html into ContentItem records.';

    public function handle(): int
    {
        $path = base_path('home1.html');

        if (! is_file($path)) {
            $this->error("File [{$path}] not found.");

            return self::FAILURE;
        }

        $html = file_get_contents($path);

        if ($html === false) {
            $this->error('Unable to read home1.html.');

            return self::FAILURE;
        }

        /**
         * Map of ContentItem keys => [start marker, optional end marker].
         *
         * These markers are based on existing IDs in home1.html.
         */
        $sections = [
            // Section 2 - first main hero section on Trang chủ.
            'section2_html' => ['id="w-gpls1s9r"', 'id="w-vgiz3u9m"'],

            // Section 3 - Sứ mệnh & Giá trị cốt lõi block.
            'section3_html' => ['id="w-vgiz3u9m"', 'id="w-coiwyvvz"'],

            // Section 4 - business services block.
            'section4_html' => ['id="w-coiwyvvz"', 'id="w-nypif9tt"'],

            // Section 5 - giới thiệu Perfect House.
            'section5_html' => ['id="w-nypif9tt"', 'id="w-j7njhkti"'],

            // Section 6 - Về chúng tôi.
            'section6_html' => ['id="w-j7njhkti"', 'id="w-efrfvi0v"'],

            // Section 8, 9: keep placeholders if markers exist.
            'section8_html' => ['id="w-ynofe2b1"', null],
            'section9_html' => ['id="w-2pll8ynd"', null],

            // Section 10 - footer contact block.
            'section10_html' => ['id="w-efrfvi0v"', null],
        ];

        $savedCount = 0;

        foreach ($sections as $key => [$startMarker, $endMarker]) {
            $extracted = $this->extractSection($html, $startMarker, $endMarker);

            if ($extracted === null) {
                $this->warn("Marker [{$startMarker}] not found, skipping [{$key}].");

                continue;
            }

            ContentItem::updateOrCreate(
                [
                    'page_type' => 'perfect_house',
                    'key' => $key,
                ],
                [
                    'page_type' => 'perfect_house',
                    'section' => 'home',
                    'key' => $key,
                    'type' => 'html',
                    'label' => ucfirst(str_replace('_', ' ', $key)),
                    'value' => $extracted,
                    'is_active' => true,
                    'order' => 0,
                ],
            );

            $savedCount++;

            $this->info("Saved content for [{$key}].");
        }

        $this->info("Done. Saved {$savedCount} section(s) into ContentItem for page_type=perfect_house.");

        return self::SUCCESS;
    }

    protected function extractSection(string $html, string $startMarker, ?string $endMarker = null): ?string
    {
        $startPos = strpos($html, $startMarker);

        if ($startPos === false) {
            return null;
        }

        $startPos = $this->moveToSectionStart($html, $startPos);

        if ($endMarker === null) {
            return substr($html, $startPos);
        }

        $endPos = strpos($html, $endMarker, $startPos);

        if ($endPos === false) {
            return substr($html, $startPos);
        }

        return substr($html, $startPos, $endPos - $startPos);
    }

    /**
     * Move the pointer back to the beginning of the surrounding <div> tag,
     * so the saved HTML is a complete section.
     */
    protected function moveToSectionStart(string $html, int $position): int
    {
        $openDivPos = strrpos(substr($html, 0, $position), '<div');

        if ($openDivPos === false) {
            return $position;
        }

        return $openDivPos;
    }
}

