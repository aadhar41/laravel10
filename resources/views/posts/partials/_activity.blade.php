<div class="position-sticky" style="top: 2rem;">
    {{-- Most Active Last Month --}}
    <x-card title='Most Active Last Month' subtitle='Users with most posts written last month.' :items="collect($mostActiveLastMonth)->pluck('name')">
        New !
    </x-card>

    {{-- Most Commented --}}
    <x-card title='Most Commented' subtitle='What people are currently taking about...' :items="[]">
        @foreach ($mostCommented as $post)
            <li>
                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                    href="{{ route('posts.show', ['post' => $post->id]) }}">
                    <div class="col-lg-8">
                        <h6 class="mb-0">{{ $post->title }}</h6>
                        <small class="text-body-secondary">{{ $post->created_at->diffForHumans() }}</small>
                    </div>
                </a>
            </li>
        @endforeach
    </x-card>

    {{-- Most Active --}}
    <x-card title='Most Active' subtitle='Users with most posts written.' :items="collect($mostActive)->pluck('name')">
        New !
    </x-card>

    <div class="p-4">
        <h4 class="fst-italic">Archives</h4>
        <ol class="list-unstyled mb-0">
            <li><a href="javascript:void(0)">March 2021</a></li>
            <li><a href="javascript:void(0)">February 2021</a></li>
            <li><a href="javascript:void(0)">January 2021</a></li>
            <li><a href="javascript:void(0)">December 2020</a></li>
            <li><a href="javascript:void(0)">November 2020</a></li>
            <li><a href="javascript:void(0)">October 2020</a></li>
            <li><a href="javascript:void(0)">September 2020</a></li>
            <li><a href="javascript:void(0)">August 2020</a></li>
            <li><a href="javascript:void(0)">July 2020</a></li>
            <li><a href="javascript:void(0)">June 2020</a></li>
            <li><a href="javascript:void(0)">May 2020</a></li>
            <li><a href="javascript:void(0)">April 2020</a></li>
        </ol>
    </div>

    <div class="p-4">
        <h4 class="fst-italic">Elsewhere</h4>
        <ol class="list-unstyled">
            <li><a href="javascript:void(0)">GitHub</a></li>
            <li><a href="javascript:void(0)">Twitter</a></li>
            <li><a href="javascript:void(0)">Facebook</a></li>
        </ol>
    </div>
</div>
