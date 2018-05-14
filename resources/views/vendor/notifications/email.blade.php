@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# اوه!
@else
# با سلام!
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'blue';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
با احترام,<br>{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@component('mail::subcopy')
    اگر دکمه {{ $actionText }} عمل نمیکند میتوانید بر روی لینک زیر کلیک نمایید : [{{ $actionUrl }}]({{ $actionUrl }})
{{--If you’re having trouble clicking the "{{ $actionText }}" button, copy and paste the URL below--}}
{{--into your web browser: [{{ $actionUrl }}]({{ $actionUrl }})--}}
@endcomponent
@endisset
@endcomponent
