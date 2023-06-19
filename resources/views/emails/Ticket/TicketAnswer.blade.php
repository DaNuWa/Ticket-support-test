<x-mail::message>
    Hi {{$ticket->user->email}},
    Thank you for connecting with us.This is a direct response from our support team which you asked (Ref
    No:{{$ticket->reference_id}})

    Answer:
    {{$ticket->answer}}

    Question:{{$ticket->description}}
    Thanks


    {{ config('app.name') }}
</x-mail::message>
