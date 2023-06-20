<?php

namespace App\Http\Controllers;

class TicketStatusController extends Controller
{
    public function __invoke()
    {
        return view('status.index');
    }
}
