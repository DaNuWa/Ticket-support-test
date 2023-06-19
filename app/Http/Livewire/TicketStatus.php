<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Livewire\Component;

class TicketStatus extends Component
{
    public $reference_id = null;
    public $is_valid = false;
    public $ticket;

    protected $rules = [
        'reference_id' => ['required', 'exists:tickets,reference_id']
    ];

    public function mount()
    {
        $this->reference_id = request('reference_id');
    }

    public function checkStatus()
    {
        $this->ticket=null;
        $this->validate();
        $this->ticket = Ticket::where('reference_id', $this->reference_id)->first();

    }

    public function render()
    {
        return view('livewire.ticket-status');
    }
}
