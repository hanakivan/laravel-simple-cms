@extends("hanakivan::web.layout")

@section("content")
    <section>
        <h1>Articles</h1>
        @foreach($articles as $article)
            <article>
                <h2>
                    <a href="{{route("hanakivan.cms.detail", ["slug" => $article->slug])}}">
                        {{$article->title}}
                    </a>
                </h2>
                <div>
                    {{$article->contents}}
                </div>
            </article>
        @endforeach

        <ol class="pagination">
            @for($i = 1; $i <= $pagination["totalPages"]; $i++)
                <li class="page-item @if($pagination["page"] === $i) active @endif">
                    <a class="page-link" href="{{route("hanakivan.cms.index", ["page" => $i])}}">
                        {{$i}}
                    </a>
                </li>
            @endfor
        </ol>
    </section>
@endsection
