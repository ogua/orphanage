<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Notifications\Notification;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Forms;
use Filament\Forms\Form;

class Reportpage extends Page
{
    use InteractsWithFormActions;
    
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    
    protected static string $view = 'filament.pages.reportpage';
    
    protected static ?string $title = 'Generate report';
    
    protected static ?string $navigationGroup = 'Settings';
    protected static ?string $navigationLabel = 'Report';
    
    protected static ?string $slug = 'settings/generatereport';
    protected static ?int $navigationSort = 4;
    
    public ?array $data = [];
    
    public function mount(): void
    {
        //abort_unless(auth()->user()->hasPermissionTo('createadmission'), 403);
        
        $this->fillForm();
    }
    
    public function fillForm(): void
    {        
        $this->form->fill();
    }
    
    public function save()
    {
        
        $data = $this->form->getState();
        //logger($data);
        
        return redirect()->to('/report');
        
        //$this->getSavedNotification()->send();
    }
    
    protected function getSavedNotification(): Notification
    {
        return Notification::make()
        ->success()
        ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'));
    }
    
    
    public function form(Form $form): Form
    {   
        return $form
        ->schema([
            Forms\Components\Section::make('')
            ->description('')
            ->schema([
                
                Forms\Components\Select::make('report_type')
                ->options([
                    'Orphan' => 'Orphan',
                    'Donations' => 'Donations',
                    'Expenses' => 'Expenses',
                    ])
                    ->required(),
                    
                    Forms\Components\DatePicker::make('from_date')
                    // ->label('Appointment date')
                    ->extraAttributes([
                        'name' => 'from_date',
                        ])
                        ->required(),
                        
                        Forms\Components\DatePicker::make('to_date')
                        // ->label('Appointment date')
                        ->extraAttributes([
                            'name' => 'to_date',
                            ])
                            ->required()
                            
                            ])->columns(3)
                            ])->statePath('data');
                        }
                    }
                    