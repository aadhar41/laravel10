{{ empty(trim($slot)) ? 'Added ' : $slot }} {{ $date->diffForHumans() }}
@isset($name)
    @isset($userId)
        by <a href="{{ route('users.show', ['user' => $userId]) }}">{{ $name }}</a>
    @else
        by <strong>{{ $name }}</strong>
    @endisset
@endisset
