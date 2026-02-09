<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuItem extends Model
{
    protected $fillable = [
        'page_type',
        'menu_type',
        'label',
        'url',
        'icon',
        'parent_id',
        'order',
        'is_active',
        'open_in_new_tab',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'open_in_new_tab' => 'boolean',
            'order' => 'integer',
            'parent_id' => 'integer',
        ];
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(MenuItem::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(MenuItem::class, 'parent_id')->orderBy('order');
    }

    public static function getMenu(string $pageType, string $menuType = 'header'): array
    {
        $menus = self::where('page_type', $pageType)
            ->where('menu_type', $menuType)
            ->where('is_active', true)
            ->whereNull('parent_id')
            ->orderBy('order')
            ->with(['children' => function ($query) {
                $query->where('is_active', true)->orderBy('order');
            }])
            ->get();

        return $menus->map(function ($menu) {
            return [
                'id' => $menu->id,
                'label' => $menu->label,
                'url' => $menu->url,
                'icon' => $menu->icon,
                'open_in_new_tab' => $menu->open_in_new_tab,
                'parent_id' => $menu->parent_id,
                'children' => $menu->children->map(function ($child) {
                    return [
                        'id' => $child->id,
                        'label' => $child->label,
                        'url' => $child->url,
                        'icon' => $child->icon,
                        'open_in_new_tab' => $child->open_in_new_tab,
                        'parent_id' => $child->parent_id,
                    ];
                })->toArray(),
            ];
        })->toArray();
    }
}
