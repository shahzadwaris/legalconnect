@component('mail::message')
You have received new MedConnect query from <strong>{{$query->name}}</strong>
# Query Details
{{$query->subject}}
<br>
{{$query->message}}

# From

{{$query->name}}
<br />
{{$query->email}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent