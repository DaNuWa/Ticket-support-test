@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container">
                    <div class="card-header container m-2">{{ __('Create a new Ticket') }}</div>

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
                                        <form method="POST" action="{{ route('tickets.store') }}">
                                            @csrf


                                            <div class="row mb-3">
                                                <label for="name"
                                                       class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                                <div class="col-md-6">
                                                    <input id="name" type="text"
                                                           class="form-control @error('name') is-invalid @enderror"
                                                           name="name" value="{{ old('name') }}" >

                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="email"
                                                       class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                                <div class="col-md-6">
                                                    <input id="email" type="email"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           name="email" value="{{ old('email') }}" >

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="contact"
                                                       class="col-md-4 col-form-label text-md-end">{{ __('Contact number') }}</label>

                                                <div class="col-md-6">
                                                    <input id="contact" type="text"
                                                           class="form-control @error('contact') is-invalid @enderror"
                                                           name="contact" value="{{old('contact')}}"  >

                                                    @error('contact')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="description"
                                                       class="col-md-4 col-form-label text-md-end">{{ __('Ticket Description') }}</label>

                                                <div class="col-md-6">
                                                    <textarea
                                                        id="description"
                                                        class="form-control @error('description') is-invalid @enderror"
                                                        name="description" required >{{old('description')}}
                                                    </textarea>
                                                    @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="row mb-0">
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Submit') }}
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
