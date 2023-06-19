<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketStatusController extends Controller
{
    public function __invoke(){
        return view('status.index');
    }
}
