@component('mail::message')

<h1 style="font-family: Arial">We’re excited to confirm your ticket for Nova on {{ $data['reservation']->arrival }}.</h1>

<h2 style="font-family: Arial">Ticket Details:</h2>
<ul style="font-family: Arial">
    <li>Event: Nova</li>
    <li>Date: {{ $data['reservation']->arrival }} to {{ $data['reservation']->departing }}</li>
    <li>Ticket Type: {{ $data['packages'][$data['reservation']->package_id-1]->title }}</li>
    <li>Order Number: {{ $data['reservation']->id }}</li>
    <li>Name : {{ $data['user']->first_name }} {{ $data['user']->last_name }}</li>
</ul>

<p style="font-family: Arial">Please keep this email as your receipt. If you have any questions or need further
    assistance, don’t hesitate to reach
    out to us at <a href="">nova@nova.app</a></p>

<p>We can’t wait to see you there!</p>

<p>Best regards,</p>

<p>The Nova team.</p>

<img src="{{ $message->embed("medias/chien-piteux.png") }}" style="width:450px">

@endcomponent
