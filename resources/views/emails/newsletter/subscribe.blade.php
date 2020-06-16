@component('mail::message')
# {{$message_model ? $message_model->intro : "Merci de votre inscription !"}}

{{$message_model ? $message_model->body : "Félicitations, vous êtes maintenant inscrit à notre newsletter et ne manquerez plus une seule nouvelle !"}}


{{$message_model ? $message_model->end : "Merci et à très bientôt,"}}<br>
{{"L'équipe ".config('app.name').'.'}}
@endcomponent
