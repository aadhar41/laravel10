{{ empty(trim($slot)) ? 'Added ' : $slot }} {{ $date->diffForHumans() }}
@isset($name)
    by <strong>{{ $name }}</strong>
@endisset
