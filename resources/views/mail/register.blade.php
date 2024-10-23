@component('mail::message')

<h1>Hi {{$data["user"]->first_name}},</h1>

<h2>Thank you for registering with Nova! We’re excited to have you join our community.</h2>

<p>To get started, please verify your email address by clicking the link below:</p>

<a href="">Verify this email address</a>

<p>Once verified, you’ll have access to all the features and resources we offer. If you have any questions or need assistance, feel free to reach out to our support team at <a href="">nova@nova.app</a>.
</p>
<p>Welcome aboard!</p>

<p>The Nova Team</p>

@endcomponent
