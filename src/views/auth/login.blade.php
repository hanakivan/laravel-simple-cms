@extends("hanakivan::layout")

@section("content")
    <h1>Prihlásenie</h1>

    <form method="post" action="{{route("hanakivan.cms.auth.login")}}">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="lulu.grimes@example.org">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="password" value="hasifsdig" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        @csrf
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
