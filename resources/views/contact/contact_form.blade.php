@component('mail::message')
<h3>New Message{{ $contact_from['email'] }}</h3>
<p> Name:{{ $contact_from['name'] }}</p>
<p> Name:{{ $contact_from['phone'] }}</p>
<p> Name:{{ $contact_from['message'] }}</p>
@endcomponent
