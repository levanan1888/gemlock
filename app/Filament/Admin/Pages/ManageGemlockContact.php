<?php

namespace App\Filament\Admin\Pages;

use App\Models\ContentItem;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class ManageGemlockContact extends Page implements HasForms
{
    use InteractsWithForms;

    protected static \BackedEnum|string|null $navigationIcon = Heroicon::OutlinedPhone;

    protected string $view = 'filament.admin.pages.manage-gemlock-contact';

    protected static ?string $navigationLabel = 'Cấu hình Liên hệ';

    protected static ?string $title = 'Cấu hình Liên hệ';

    protected static ?int $navigationSort = 10;

    public static function getNavigationGroup(): ?string
    {
        return 'Gemlock';
    }

    public static function canAccess(): bool
    {
        $user = auth()->user();
        return $user && ($user->isAdmin() || $user->isGemlockAdmin());
    }

    public ?array $data = [];

    public function mount(): void
    {
        $this->loadContent();
    }

    public function loadContent(): void
    {
        $items = ContentItem::where('page_type', 'gemlock')
            ->where('section', 'contact')
            ->get();

        $formattedData['contact'] = [
            'address' => $items->where('key', 'contact_address_gemlock')->first()?->value ?? '',
            'address_active' => (bool) ($items->where('key', 'contact_address_gemlock')->first()?->is_active ?? true),
            'email' => $items->where('key', 'contact_email_gemlock')->first()?->value ?? '',
            'email_active' => (bool) ($items->where('key', 'contact_email_gemlock')->first()?->is_active ?? true),
            'phone' => $items->where('key', 'contact_phone_gemlock')->first()?->value ?? '',
            'phone_active' => (bool) ($items->where('key', 'contact_phone_gemlock')->first()?->is_active ?? true),
        ];

        $this->form->fill($formattedData);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Thông tin liên hệ')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('contact.address')
                                ->label('Địa chỉ')
                                ->maxLength(255),
                            Toggle::make('contact.address_active')->label('Hiển thị')->inline(false),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('contact.email')
                                ->label('Email')
                                ->maxLength(255),
                            Toggle::make('contact.email_active')->label('Hiển thị')->inline(false),
                        ]),
                        Grid::make(2)->schema([
                            TextInput::make('contact.phone')
                                ->label('Số điện thoại')
                                ->maxLength(255),
                            Toggle::make('contact.phone_active')->label('Hiển thị')->inline(false),
                        ]),
                    ])
                    ->columnSpanFull(),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $mappings = [
            'contact_address_gemlock' => [
                'value' => $data['contact']['address'] ?? '',
                'is_active' => (bool) ($data['contact']['address_active'] ?? true),
                'type' => 'text',
                'label' => 'Địa chỉ liên hệ',
            ],
            'contact_email_gemlock' => [
                'value' => $data['contact']['email'] ?? '',
                'is_active' => (bool) ($data['contact']['email_active'] ?? true),
                'type' => 'text',
                'label' => 'Email liên hệ',
            ],
            'contact_phone_gemlock' => [
                'value' => $data['contact']['phone'] ?? '',
                'is_active' => (bool) ($data['contact']['phone_active'] ?? true),
                'type' => 'text',
                'label' => 'Số điện thoại liên hệ',
            ],
        ];

        foreach ($mappings as $key => $values) {
            ContentItem::updateOrCreate(
                ['key' => $key],
                [
                    'page_type' => 'gemlock',
                    'section' => 'contact',
                    'type' => $values['type'],
                    'label' => $values['label'],
                    'value' => $values['value'] ?? '',
                    'is_active' => $values['is_active'],
                ]
            );
        }

        Notification::make()
            ->title('Đã lưu cấu hình Liên hệ thành công!')
            ->success()
            ->send();
    }

    protected function getFormActions(): array
    {
        return [
            \Filament\Actions\Action::make('save')
                ->label('Lưu thay đổi')
                ->submit('save')
                ->color('primary'),
        ];
    }
}
