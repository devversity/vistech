@component('mail::message')

    {{ $mailData['intro'] }}

    ## Account:
    @component('mail::table')
        @foreach ($mailData['fields'] as $key => $value)
           | {{$key}} | {{$value}} |
        @endforeach
    @endcomponent

    @component('mail::button', ['url' => $mailData['url']])
        Visit Site
    @endcomponent

        Thanks,<br>
        {{ config('app.name') }}

@endcomponent
