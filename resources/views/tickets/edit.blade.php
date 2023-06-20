@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container">
                    @include('flash::message')

                    <div class="card-header container m-2">{{ __('Provide an answer') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div>
                            <div class="col-md-8">
                                <div class="card">

                                    <div class="card-body">
                                        <form method="POST" action="{{ route('tickets.update',$ticket) }}">
                                            @csrf
                                            @method('patch')


                                            <div class="row mb-3">
                                                <label for="description"
                                                       class="col-md-4 col-form-label text-md-end">{{ __('Ticket Description') }}</label>

                                                <div class="col-md-6">
                                                    <textarea
                                                        cols="50"
                                                        rows="10"
                                                        disabled
                                                        id="description"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="description" required >
                                                        {{$ticket->description}}
                                                    </textarea>
                                                    @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="answer"
                                                       class="col-md-4 col-form-label text-md-end">{{ __('Answer') }}</label>

                                                <div class="col-md-6">
                                                    <textarea
                                                        cols="50"
                                                        rows="10"
                                                        id="reply"
                                                        class="form-control @error('answer') is-invalid @enderror"
                                                        name="answer" required >
                                                    </textarea>
                                                    @error('answer')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="row mb-0">
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Send Reply') }}
                                                    </button>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
