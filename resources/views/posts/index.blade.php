@extends('layouts.app')
@section('title', 'Blog Post')

@section('content')
    <main class="container">
        {{--
        <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
            <div class="col-lg-6 px-0">
                <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
                <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and
                    efficiently about what’s most interesting in this post’s contents.</p>
                <p class="lead mb-0"><a href="javascript:void(0)" class="text-body-emphasis fw-bold">Continue
                        reading...</a>
                </p>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary-emphasis">World</strong>
                        <h3 class="mb-0">Featured post</h3>
                        <div class="mb-1 text-body-secondary">Nov 12</div>
                        <p class="card-text mb-auto">This is a wider card with supporting text below as a natural
                            lead-in to additional content.</p>
                        <a href="javascript:void(0)" class="icon-link gap-1 icon-link-hover stretched-link">
                            Continue reading
                            <svg class="bi">
                                <use xlink:href="#chevron-right" />
                            </svg>
                        </a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg"
                            role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                            focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef"
                                dy=".3em">Thumbnail</text>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-success-emphasis">Design</strong>
                        <h3 class="mb-0">Post title</h3>
                        <div class="mb-1 text-body-secondary">Nov 11</div>
                        <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to
                            additional content.</p>
                        <a href="javascript:void(0)" class="icon-link gap-1 icon-link-hover stretched-link">
                            Continue reading
                            <svg class="bi">
                                <use xlink:href="#chevron-right" />
                            </svg>
                        </a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg"
                            role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                            focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef"
                                dy=".3em">Thumbnail</text>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
         --}}

        <div class="row g-5">
            <div class="col-md-8">
                {{--
                    <h3 class="pb-4 mb-4 fst-italic border-bottom">
                    From the Firehose
                </h3>
                --}}

                @forelse ($posts as $key => $post)
                    @includeIf('posts.partials.post', ['post' => $post])
                @empty
                    <p>No Blog Post.</p>
                @endforelse

                {{--
            <article class="blog-post">
                <h2 class="display-5 link-body-emphasis mb-1">Sample blog post</h2>
                <p class="blog-post-meta">January 1, 2021 by <a href="javascript:void(0)">Mark</a></p>

                <p>This blog post shows a few different types of content that’s supported and styled with
                    Bootstrap. Basic typography, lists, tables, images, code, and more are all supported as
                    expected.</p>
                <hr>
                <p>This is some additional paragraph placeholder content. It has been written to fill the
                    available space and show how a longer snippet of text affects the surrounding content. We'll
                    repeat it often to keep the demonstration flowing, so be on the lookout for this exact same
                    string of text.</p>
                <h2>Blockquotes</h2>
                <p>This is an example blockquote in action:</p>
                <blockquote class="blockquote">
                    <p>Quoted text goes here.</p>
                </blockquote>
                <p>This is some additional paragraph placeholder content. It has been written to fill the
                    available space and show how a longer snippet of text affects the surrounding content. We'll
                    repeat it often to keep the demonstration flowing, so be on the lookout for this exact same
                    string of text.</p>
                <h3>Example lists</h3>
                <p>This is some additional paragraph placeholder content. It's a slightly shorter version of the
                    other highly repetitive body text used throughout. This is an example unordered list:</p>
                <ul>
                    <li>First list item</li>
                    <li>Second list item with a longer description</li>
                    <li>Third list item to close it out</li>
                </ul>
                <p>And this is an ordered list:</p>
                <ol>
                    <li>First list item</li>
                    <li>Second list item with a longer description</li>
                    <li>Third list item to close it out</li>
                </ol>
                <p>And this is a definition list:</p>
                <dl>
                    <dt>HyperText Markup Language (HTML)</dt>
                    <dd>The language used to describe and define the content of a Web page</dd>
                    <dt>Cascading Style Sheets (CSS)</dt>
                    <dd>Used to describe the appearance of Web content</dd>
                    <dt>JavaScript (JS)</dt>
                    <dd>The programming language used to build advanced Web sites and applications</dd>
                </dl>
                <h2>Inline HTML elements</h2>
                <p>HTML defines a long list of available inline tags, a complete list of which can be found on
                    the <a href="https://developer.mozilla.org/en-US/docs/Web/HTML/Element">Mozilla Developer
                        Network</a>.</p>
                <ul>
                    <li><strong>To bold text</strong>, use <code
                            class="language-plaintext highlighter-rouge">&lt;strong&gt;</code>.</li>
                    <li><em>To italicize text</em>, use <code
                            class="language-plaintext highlighter-rouge">&lt;em&gt;</code>.</li>
                    <li>Abbreviations, like <abbr title="HyperText Markup Language">HTML</abbr> should use
                        <code class="language-plaintext highlighter-rouge">&lt;abbr&gt;</code>, with an
                        optional <code class="language-plaintext highlighter-rouge">title</code> attribute for
                        the full phrase.
                    </li>
                    <li>Citations, like <cite>— Mark Otto</cite>, should use <code
                            class="language-plaintext highlighter-rouge">&lt;cite&gt;</code>.</li>
                    <li><del>Deleted</del> text should use <code
                            class="language-plaintext highlighter-rouge">&lt;del&gt;</code> and
                        <ins>inserted</ins> text should use <code
                            class="language-plaintext highlighter-rouge">&lt;ins&gt;</code>.
                    </li>
                    <li>Superscript <sup>text</sup> uses <code
                            class="language-plaintext highlighter-rouge">&lt;sup&gt;</code> and subscript
                        <sub>text</sub> uses <code
                            class="language-plaintext highlighter-rouge">&lt;sub&gt;</code>.
                    </li>
                </ul>
                <p>Most of these elements are styled by browsers with few modifications on our part.</p>
                <h2>Heading</h2>
                <p>This is some additional paragraph placeholder content. It has been written to fill the
                    available space and show how a longer snippet of text affects the surrounding content. We'll
                    repeat it often to keep the demonstration flowing, so be on the lookout for this exact same
                    string of text.</p>
                <h3>Sub-heading</h3>
                <p>This is some additional paragraph placeholder content. It has been written to fill the
                    available space and show how a longer snippet of text affects the surrounding content. We'll
                    repeat it often to keep the demonstration flowing, so be on the lookout for this exact same
                    string of text.</p>
                <pre><code>Example code block</code></pre>
                <p>This is some additional paragraph placeholder content. It's a slightly shorter version of the
                    other highly repetitive body text used throughout.</p>
            </article>

            <article class="blog-post">
                <h2 class="display-5 link-body-emphasis mb-1">Another blog post</h2>
                <p class="blog-post-meta">December 23, 2020 by <a href="javascript:void(0)">Jacob</a></p>

                <p>This is some additional paragraph placeholder content. It has been written to fill the
                    available space and show how a longer snippet of text affects the surrounding content. We'll
                    repeat it often to keep the demonstration flowing, so be on the lookout for this exact same
                    string of text.</p>
                <blockquote>
                    <p>Longer quote goes here, maybe with some <strong>emphasized text</strong> in the middle of
                        it.</p>
                </blockquote>
                <p>This is some additional paragraph placeholder content. It has been written to fill the
                    available space and show how a longer snippet of text affects the surrounding content. We'll
                    repeat it often to keep the demonstration flowing, so be on the lookout for this exact same
                    string of text.</p>
                <h3>Example table</h3>
                <p>And don't forget about tables in these posts:</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Upvotes</th>
                            <th>Downvotes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Alice</td>
                            <td>10</td>
                            <td>11</td>
                        </tr>
                        <tr>
                            <td>Bob</td>
                            <td>4</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>Charlie</td>
                            <td>7</td>
                            <td>9</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>Totals</td>
                            <td>21</td>
                            <td>23</td>
                        </tr>
                    </tfoot>
                </table>

                <p>This is some additional paragraph placeholder content. It's a slightly shorter version of the
                    other highly repetitive body text used throughout.</p>
            </article>

            <article class="blog-post">
                <h2 class="display-5 link-body-emphasis mb-1">New feature</h2>
                <p class="blog-post-meta">December 14, 2020 by <a href="javascript:void(0)">Chris</a></p>

                <p>This is some additional paragraph placeholder content. It has been written to fill the
                    available space and show how a longer snippet of text affects the surrounding content. We'll
                    repeat it often to keep the demonstration flowing, so be on the lookout for this exact same
                    string of text.</p>
                <ul>
                    <li>First list item</li>
                    <li>Second list item with a longer description</li>
                    <li>Third list item to close it out</li>
                </ul>
                <p>This is some additional paragraph placeholder content. It's a slightly shorter version of the
                    other highly repetitive body text used throughout.</p>
            </article>
             --}}

                <nav class="blog-pagination" aria-label="Pagination">
                    <a class="btn btn-outline-primary rounded-pill" href="javascript:void(0)">Older</a>
                    <a class="btn btn-outline-secondary rounded-pill disabled" aria-disabled="true">Newer</a>
                </nav>

            </div>

            {{-- Right Side Bar --}}
            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">

                    <div class="mb-3 h-100 p-4 bg-body-tertiary border rounded-2">
                        <h4 class="mb-0"><strong>Most Active Last Month</strong></h4><small>Users with most posts written
                            last month.</small>
                        <ol class="list-unstyled mb-0 mt-2">
                            @foreach ($mostActiveLastMonth as $user)
                                <li>
                                    <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-2 link-body-emphasis text-decoration-none border-top text-muted"
                                        href="javascript:void(0);">
                                        <div class="col-lg-8">
                                            <h6 class="mb-0">{{ $user->name }}</h6>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ol>
                    </div>

                    <div class="mb-3 h-100 p-4 bg-body-tertiary border rounded-2">
                        <h4 class="mb-0"><strong>Most Active</strong></h4><small>Users with most posts
                            written.</small>
                        <ol class="list-unstyled mb-0 mt-2">
                            @foreach ($mostActive as $user)
                                <li>
                                    <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-2 link-body-emphasis text-decoration-none border-top text-muted"
                                        href="javascript:void(0);">
                                        <div class="col-lg-8">
                                            <h6 class="mb-0">{{ $user->name }}</h6>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ol>
                    </div>

                    <div class="h-100 p-4 bg-body-tertiary border rounded-2">
                        <h4 class="mb-0"><strong>Most Commented</strong></h4><small>What people are currently taking
                            about.</small>
                        <ul class="list-unstyled mt-2">
                            @foreach ($mostCommented as $post)
                                <li>
                                    <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                                        href="{{ route('posts.show', ['post' => $post->id]) }}">
                                        <div class="col-lg-8">
                                            <h6 class="mb-0">{{ $post->title }}</h6>
                                            <small
                                                class="text-body-secondary">{{ $post->created_at->diffForHumans() }}</small>
                                        </div>
                                    </a>
                                </li>
                            @endforeach

                            {{--
                            <li>
                                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                                    href="javascript:void(0)">
                                    <svg class="bd-placeholder-img" width="100%" height="96"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                        preserveAspectRatio="xMidYMid slice" focusable="false">
                                        <rect width="100%" height="100%" fill="#777" />
                                    </svg>
                                    <div class="col-lg-8">
                                        <h6 class="mb-0">Longer blog post title: This one has multiple lines!
                                        </h6>
                                        <small class="text-body-secondary">January 13, 2023</small>
                                    </div>
                                </a>
                            </li>
                            --}}
                        </ul>
                    </div>

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
            </div>
        </div>

    </main>

    {{-- @foreach ($posts as $key => $post)
        <p>{{ $key }} - {{ $post['title'] }}</p>
        @endforeach --}}

    {{-- @each('posts.partials.post', $posts, 'post', 'view.empty') --}}
    {{-- @each('posts.partials.post', $posts, 'post') --}}



@endsection
