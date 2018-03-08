<h2>Direct Message</h2> [Origin: <b><a href="{{ env('APP_URL') }}">{{ env('APP_NAME') }}</a></b>]
<br /><br /><br />
<strong>Sender's Email: </strong> {{ $sender }}<br />
<strong>Subject: </strong> {{ $subject }}<br />
<strong>Message:</strong><br /><br />{{ $content }}