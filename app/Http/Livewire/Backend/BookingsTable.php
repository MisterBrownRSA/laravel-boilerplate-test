<?php

namespace App\Http\Livewire\Backend;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Traits\HtmlComponents;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class BookingsTable.
 */
class BookingsTable extends TableComponent
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
        return Booking::with(['showing.film','user']);
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make(__('Showing'), 'showing.film.name')
                ->searchable()
                ->sortable(),
            Column::make('Reference', 'reference'),
            Column::make('User', 'user.name'),
            Column::make('Created At', 'created_at')->sortable()
        ];
    }
}
