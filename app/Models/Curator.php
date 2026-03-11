<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curator extends Model
{
    protected $table = 'curator';

    protected $fillable = [
        'disk',
        'directory',
        'visibility',
        'name',
        'path',
        'width',
        'height',
        'size',
        'type',
        'ext',
        'alt',
        'title',
        'description',
        'caption',
        'pretty_name',
        'exif',
        'curations',
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'exif' => 'array',
            'curations' => 'array',
            'width' => 'integer',
            'height' => 'integer',
            'size' => 'integer',
        ];
    }

    /**
     * Get the URL for the media file
     */
    public function getUrlAttribute(): string
    {
        return asset('storage/' . $this->path);
    }
}
