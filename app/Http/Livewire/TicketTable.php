<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Ticket;

class TicketTable extends DataTableComponent
{
    protected $model = Ticket::class;

    public function query()
    {
        return Ticket::query()
            ->join('users', 'users.id', '=', 'tickets.user_id')
            ->select('tickets.description', 'tickets.id', 'tickets.answered_at', 'tickets.user_id', 'tickets.reference_id', 'users.name as name')
            ->orderBy('tickets.answered_at');

    }
    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Description", "description")
                ->sortable(),
            Column::make("User", "user.name")
                ->sortable()
            ->searchable(),
            Column::make("Reference id", "reference_id")
                ->sortable(),
            Column::make("Answered at", "answered_at")
                ->sortable(),

        ];
    }
    public function configure(): void
    {
        $this->setSearchEnabled();

        $this->setPrimaryKey('id')
            ->setTableRowUrl(function($row) {
                return route('tickets.edit', $row);
            });

        // Takes a callback that gives you the current row and its index
        $this->setTrAttributes(function($row, $index) {
            if (is_null($row->answered_at)) {
                return [
                    'style' => 'font-weight: bold;',
                ];
            }

            return [];
        });
    }
}
