@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container">
<div class="d-flex justify-content-center align-items-center">
<a href="{{route('tickets.create')}}" >Create  a new ticket</a>
</div>
                    <div class="card-header container m-2">{{ __('Check Ticket status') }}</div>

                    @livewire('ticket-status')

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
