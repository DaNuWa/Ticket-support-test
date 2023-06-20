@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 container">
                <div class="container">

                    @include('flash::message')

                    @livewire('ticket-status')

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
