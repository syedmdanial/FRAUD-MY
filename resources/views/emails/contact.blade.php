<!-- email content to admin-->
@component('mail::message')
Dear Danial,

You got one feedback from {{ $name }}.

<p>

Message : {{ $message }}

<p>

Contact Number : {{ $phone }}
<p>

Email : {{ $email }}


@endcomponent
