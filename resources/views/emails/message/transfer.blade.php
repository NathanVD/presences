@component('mail::message')
Message de : 
  {{$sent_message ? $sent_message->firstname.' '.$sent_message->firstname : "#Nom"}}
<hr>
{{$sent_message ? $sent_message->message : "#Message"}}
@endcomponent
