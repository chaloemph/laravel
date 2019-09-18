@component('mail::message')

#Thank you fo you message
<strong>Name</strong> {{ $data['name'] }}
<strong>Email</strong> {{ $data['email'] }}

<strong>message</strong>
{{ $data['message'] }}

@endcomponent
