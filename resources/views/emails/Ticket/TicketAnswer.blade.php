<x-mail::message>
    Hi {{$ticket->user->email}},

    Thank you for connecting with us.This is a direct response from our support team which you asked

    (Ref No:{{$ticket->reference_id}})

<x-mail::button :url="route('status.index',$ticket->reference_id)">
        Check status
</x-mail::button>

    Thanks
{{ config('app.name') }}
</x-mail::message>
