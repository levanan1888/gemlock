<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'page_type',
        'name',
        'file_path',
        'file_type',
        'mime_type',
        'file_size',
        'description',
        'alt_text',
        'width',
        'height',
    ];

    protected function casts(): array
    {
        return [];
    }

    public function getUrlAttribute(): string
    {
        return $this->file_path ? asset('storage/'.$this->file_path) : '';
    }
}
