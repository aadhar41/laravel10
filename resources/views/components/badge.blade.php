@if (!isset($show) || $show)
    <span class="badge rounded-pill text-bg-{{ $type ?? 'success' }}">{{ $slot }}</span>
@endif
