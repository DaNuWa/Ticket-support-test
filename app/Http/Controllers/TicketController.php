<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketUpdateRequest;
use App\Http\Requests\UserTicketRequest;
use App\Mail\NewTicketCreated;
use App\Mail\TicketAnswer;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class TicketController extends Controller
{
    public function __construct()
    {
        //Apply Middleware protection
        $this->middleware(['auth', 'supporterOnly'])->except('create', 'store');

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tickets.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tickets.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserTicketRequest $request)
    {
        DB::beginTransaction();

        try {

            //Check and creating a new user
            $user = User::firstOrCreate([
                'email' => $request->email,
            ], [
                'name' => $request->name,
                'contact' => $request->contact,
                'password' => Hash::make(Str::random(10)),
            ]);

            //Creating a ticket
            $reference_id = Str::uuid();
            $ticket = Ticket::create([
                'description' => $request->description,
                'reference_id' => $reference_id,
                'user_id' => $user->id,
            ]);
            DB::commit();
            Mail::to($user)->send(new NewTicketCreated($ticket, $user));
            flash('Successfully Created The Ticket')->success();

            return to_route('status.index');
        } catch (\Exception $e) {
            DB::rollback();
            flash('Please try again')->error();

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('ticket.show');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TicketUpdateRequest $request, Ticket $ticket)
    {
        DB::beginTransaction();

        try {
            $ticket->load('user');
            $ticket->update($request->validated() + ['answered_at' => now()]);
            DB::commit();
            Mail::to($ticket->user->email)->send(new TicketAnswer($ticket));
            flash('Answer stored and sent to the user successfully')->success();

            return to_route('tickets.index');
        } catch (\Exception $e) {
            DB::rollback();
            flash('Please try again')->error();

            return redirect()->back();
        }

    }
}
