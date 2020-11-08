<div id="content-page" class="content group">
    <div class="hentry group">
        @if($books)
            <div id="portfolio" class="portfolio-big-image">
                @foreach($books->sortByDesc('id') as $book)
                    <div class="hentry work group">
                        <div class="work-thumbnail">
                            <div class="nozoom">
{{--                                <img src="{{ asset(env('THEME')) }}/images/projects/{{ $portfolio->img->max }}" alt="0061" title="0061" />--}}
                                <div class="overlay">
{{--                                    <a class="overlay_img" href="{{ asset(env('THEME')) }}/images/projects/{{$portfolio->img->path}}" rel="lightbox" title="Love"></a>--}}
{{--                                    <a class="overlay_project" href="{{ route('portfolios.show', ['alias' => $portfolio->alias]) }}"></a>--}}
                                    <span class="overlay_title">{{ $book->title }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="work-description">
                            <h3>{{ $book->title }}</h3>
                            <div class="clear"></div>
                            <div class="work-skillsdate">
                                <p class="skills"><span class="label">Tenant:</span>{{ $book->tenant }}</p>
                                <p class="workdate"><span class="label">Count:</span>{{ $book->count }} шт.</p>
                                <p class="workdate"><span class="label">Sum:</span>{{ $book->sum }} руб.</p>
                                <p class="workdate"><span class="label">Lease:</span>{{ $book->lease }} дней.</p>

                                @if($book->created_at)
                                    <p class="workdate"><span class="label">Date:</span>{{ $book->created_at->format('Y-m-d') }}</p>
                                    <p class="workdate"><span class="label">Time:</span>{{ $book->created_at->format('H:m') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                @endforeach

                    <div class="general-pagination group">
                        @if($books->lastPage() > 1)
                            @if($books->currentPage() !== 1)
                                <a href="{{ $books->url($books->currentPage() - 1) }}">&laquo;</a>
                            @endif
                            @for($i = 1; $i <= $books->lastPage(); $i++)
                                @if($books->currentPage() == $i)
                                    <a class="selected disabled">{{ $i }}</a>
                                @else
                                    <a href="{{ $books->url($i) }}">{{$i}}</a>
                                @endif
                            @endfor
                            @if($books->currentPage() !== $books->lastPage())
                                <a href="{{ $books->url($books->currentPage() + 1) }}">&raquo;</a>
                            @endif
                        @endif
                    </div>
            </div>
        @endif
        <div class="clear"></div>
    </div>
</div>

