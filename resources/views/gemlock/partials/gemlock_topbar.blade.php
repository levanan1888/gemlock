@php
    use App\Helpers\ContentHelper;

    $topbarText = ContentHelper::text('header_topbar_text_gemlock', 'Quay lại Perfect House để trải nghiệm nhiều hơn nữa', 'gemlock', 'header');
    $topbarLink = ContentHelper::link('header_topbar_link_gemlock', url('/'), 'gemlock', 'header');
    $topbarActive = App\Models\ContentItem::where('page_type', 'gemlock')
        ->where('section', 'header')
        ->where('key', 'header_topbar_text_gemlock')
        ->value('is_active');
@endphp

@if((bool) ($topbarActive ?? true))
<div class="gemlock-topbar" aria-label="Quay lại Perfect House">
    <div class="header-container">
        <a class="gemlock-topbar-link" href="{{ $topbarLink ?: url('/') }}">
            <span class="gemlock-topbar-text">{{ $topbarText }}</span>
        </a>
    </div>
</div>
@endif

