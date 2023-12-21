@if ($loop->even)
    <p>{{ $key }} - {{ $post['title'] }}</p>
@else
    <p style="background-color: gray; color:white;">{{ $key }} - {{ $post['title'] }}</p>
@endif
