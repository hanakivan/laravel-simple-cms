@extends("hanakivan::layout")

@section("content")
    <article>
        <header>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route("hanakivan.cms.index")}}">Home</a></li>
                    <li class="breadcrumb-item active">{{$article->title}}</li>
                </ol>
            </nav>
            <h1>{{$article->title}}</h1>
        </header>

        <div>
            {{$article->contents}}
        </div>
    </article>
@endsection
