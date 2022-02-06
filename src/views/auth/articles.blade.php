@extends("hanakivan::auth.layout")

@section("content")
    <h1 class="mb-4">Články</h1>

    @if($isDeleted)
        <div class="alert alert-success mb-3">Článok bol vymazaný</div>
    @endif

    <a class="mb-3 btn btn-primary" href="{{route("hanakivan.cms.auth.articles.create")}}">+ Vytvoriť článok</a>

    <table class="table table-hover">
        <thead>
            <tr>
                <th width="100">ID</th>
                <th>Názov</th>
                <th width="140">Publikované</th>
                <th class="text-end" width="150">Akcie</th>
            </tr>
        </thead>
        <tbody>
            @if($articles->isNotEmpty())
                @foreach($articles as $article)
                    <tr>
                        <td>{{$article->getKey()}}</td>
                        <td>
                            <a href="{{route("hanakivan.cms.auth.articles.edit", ["id" => $article->getKey()])}}">
                                {{$article->title}}
                            </a>
                        </td>
                        <td>{{$article->published_at->toFormattedDateString()}}</td>
                        <td class="text-end d-flex">
                            <a class="btn btn-outline-primary btn-sm" href="{{route("hanakivan.cms.auth.articles.edit", ["id" => $article->getKey()])}}">Upraviť</a>
                            &nbsp;
                            <form method="post" action="{{route("hanakivan.cms.auth.articles.delete", ["id" => $article->getKey()])}}">
                                <button onclick="if(!confirm('Skutočne zmazať článok?')) return false;" class="btn btn-outline-danger btn-sm">Zmazať</button>
                                @csrf
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">
                        <div>
                            Žiadne články.
                        </div>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
