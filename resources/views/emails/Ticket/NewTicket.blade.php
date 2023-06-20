<x-mail::message>
Hi ,{{$user->email}}

    We are working on your concerns and will provide an answer as soon as possible .Meanwhile you can check the status of your concern through this portal.
    The unique reference  id for you ticket is {{$ticket->reference_id}}

<x-mail::button :url="route('status.index',$ticket->reference_id)">
Check status
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
