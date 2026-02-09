<?php

namespace App\Filament\Admin\Resources\Media\Pages;

use App\Filament\Admin\Resources\Media\MediaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMedia extends CreateRecord
{
    protected static string $resource = MediaResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (isset($data['file_path']) && is_array($data['file_path'])) {
            $filePath = $data['file_path'][0] ?? null;
            if ($filePath) {
                $data['file_path'] = $filePath;
                $fullPath = storage_path('app/public/'.$filePath);

                if (file_exists($fullPath)) {
                    $data['file_size'] = filesize($fullPath);
                    $data['mime_type'] = mime_content_type($fullPath);

                    if (str_starts_with($data['mime_type'], 'image/')) {
                        $data['file_type'] = 'image';
                        $imageInfo = getimagesize($fullPath);
                        if ($imageInfo) {
                            $data['width'] = $imageInfo[0];
                            $data['height'] = $imageInfo[1];
                        }
                    } elseif (str_starts_with($data['mime_type'], 'video/')) {
                        $data['file_type'] = 'video';
                    } else {
                        $data['file_type'] = 'document';
                    }
                }
            }
        }

        return $data;
    }
}
