<?php

namespace App\Http\Livewire;

use App\Models\SupportTicket;
use Livewire\Component;

class Tickets extends Component
{


    public function render()
    {

        $tickets = SupportTicket::all();

        return view('livewire.tickets',['tickets'=>$tickets]);
    }
}
