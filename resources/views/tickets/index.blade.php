@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container">
                    @include('flash::message')
                    <div class="card-header container m-2">{{ __('All Tickets') }}</div>
                    <div class="container w-100">
                        <livewire:ticket-table/>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
