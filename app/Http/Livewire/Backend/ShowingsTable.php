<?php

namespace App\Http\Livewire\Backend;

use App\Models\Showing;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Traits\HtmlComponents;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class ShowingsTable.
 */
class ShowingsTable extends TableComponent
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
        return Showing::with(['film', 'theatre.cinema']);
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make(__('Film Name'), 'film.name')
                ->searchable()
                ->sortable(),
            Column::make('Showing At', 'showing_at')->sortable()
        ];
    }
}
