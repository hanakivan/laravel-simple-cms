@extends("hanakivan::auth.layout")

@section("content")
    <h1 class="mb-3">{{$title}}</h1>

    <form method="post" action="{{route("hanakivan.cms.auth.articles.submit")}}">
        <div style="display: flex; width: 100%; padding-right: 270px;">
            <div style="flex: 1;">
                @if($isSaved)
                    <div class="alert alert-success">Článok bol uložený/vytvorený.</div>
                @endif

                <fieldset>
                    <div class="mb-5">
                        <input required placeholder="Enter title..." type="text" class="form-control form-control-lg" name="title" value="{{$article->title}}" />
                    </div>

                    <div>
                        <textarea required name="contents" placeholder="Enter contents..." rows="30" class="form-control">{{$article->contents}}</textarea>
                    </div>
                </fieldset>
            </div>
            <div style="width: 250px; position: fixed; top: 100px; right:40px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Nastavenia</h5>
                        <button type="submit" class="btn btn-primary">Uložiť</button>
                    </div>
                </div>
            </div>
        </div>
        @csrf

        @if($article->exists)
            <input type="hidden" name="id" value="{{$article->getKey()}}" />
        @endif
    </form>
@endsection
