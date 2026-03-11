<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Awcodes\Curator\Models\Media as CuratorMedia;

class Media extends CuratorMedia
{
    use HasUuids;

    /**
     * Sản phẩm sử dụng ảnh này làm ảnh đại diện
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'media_product')
            ->withPivot('order');
    }
}
