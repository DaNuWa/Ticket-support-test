<div>
    <div class="col-md-8">
        <div class="card">

            <div class="card-body">
                <form >

                    <div class="row mb-3">
                        <label for="name"
                               class="col-md-4 col-form-label text-md-end">{{ __('Reference Number') }}</label>

                        <div class="col-md-6">
                            <input id="reference_id" type="text"
                                   class="form-control @error('reference_id') is-invalid @enderror"
                                   wire:model="reference_id"  >

                            @error('reference_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button wire:click.prevent="checkStatus" type="submit" class="btn btn-primary">
                                {{ __('Submit') }}
                            </button>

                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
    <br>
    @if($ticket && !is_null($ticket->answered_at))
        <table class="table">
            <thead>
        <tr>
            <th scope="col">Question</th>
            <th scope="col">Answer</th>
            <th scope="col">Answered at</th>
        </tr>
        </thead>
            <tbody>
        <tr>
            <th >{{$ticket->description}}</th>
            <td>{{$ticket->answer}}</td>
            <td>{{$ticket->answered_at->toDateTimeString()}}</td>
        </tr>
        </tbody>
        </table>
    @elseif($ticket && is_null($ticket->answered_at))
    <div style="background-color: #b8b01d" class="badge-info">Our support team is currently looking on this ticket.You may get an email notification once we checked ,</div>
    @endif

</div>
