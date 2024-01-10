<div class="mb-3 h-100 p-4 bg-body-tertiary border rounded-2">
    <h4 class="mb-0"><strong>{{ $title }}</strong></h4>
    <small>{{ $subtitle }}</small>
    <ol class="list-unstyled mb-0 mt-2">
        @if (is_a($items, 'Illuminate\Support\Collection'))
            @foreach ($items as $item)
                <li>
                    <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-2 link-body-emphasis text-decoration-none border-top text-muted"
                        href="javascript:void(0);">
                        <div class="col-lg-8">
                            <h6 class="mb-0">{{ $item }}</h6>
                        </div>
                    </a>
                </li>
            @endforeach
        @else
            {{ $slot }}
        @endif
    </ol>
</div>
