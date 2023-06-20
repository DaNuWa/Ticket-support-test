<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class TicketTable extends DataTableComponent
{
//    protected $model = Ticket::class;

    public function builder(): \Illuminate\Database\Eloquent\Builder
    {
        return Ticket::query()
            ->join('users', 'users.id', '=', 'tickets.user_id')
            ->select('tickets.description', 'tickets.id', 'tickets.answered_at', 'tickets.user_id', 'tickets.reference_id', 'users.name as name')
            ->latest('tickets.created_at');

    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
            ,
            Column::make('Description', 'description')
            ,
            Column::make('User', 'user.name')
                ->searchable(),
            Column::make('Reference id', 'reference_id')
                ->searchable(),
            Column::make('Answered at', 'answered_at')
            ,

        ];
    }

    public function configure(): void
    {
        $this->setSortingStatus(false);

        $this->setSearchEnabled();

        $this->setPrimaryKey('id')
            ->setTableRowUrl(function ($row) {
                return route('tickets.edit', $row);
            });

        // Takes a callback that gives you the current row and its index
        $this->setTrAttributes(function ($row, $index) {
            if (is_null($row->answered_at)) {
                return [
                    'style' => 'font-weight: bold;',
                ];
            }

            return [];
        });
    }
}
