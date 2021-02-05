<?php

namespace App\Http\Livewire\Backend;

use App\Models\Theatre;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Traits\HtmlComponents;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class TheatresTable.
 */
class TheatresTable extends TableComponent
{
    use HtmlComponents;

    /**
     * @var string
     */
    public $sortField = 'id';

    /**
     * @var array
     */
    protected $options = [
        'bootstrap.container' => false,
        'bootstrap.classes.table' => 'table table-striped',
    ];

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Theatre::with('cinema');
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make(__('Cinema'), 'cinema.name')
                ->searchable()
                ->sortable(),
            Column::make('Allocation', 'allocation')->sortable()
        ];
    }
}
