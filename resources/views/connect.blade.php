@extends("layouts.master")

@section("body")
    <div class="container">
        <div class="row p-3">
            <div class="col-12">
                <h1>Connect</h1>
                <h4>Find other users with similar interests!</h4>
                <hr>
            </div>
            <br>
            @foreach($users as $user)
                <div class="col-4 boxed-content">
                    <div class="row">
                        <div class="col-md-3 col-sm-12 my-auto">
                            @if($user->avatar_path != null)
                                <img src="{{ $user->avatar_path }}" width="100%" />
                            @else
                                <img src="/img/default.png" width="100%" />
                            @endif
                        </div>
                        <div class="col-md-9 col-sm-12 my-auto">
                            <h3 class="my-auto"><a href="/u/{{ $user->username }}">{{ $user->username }}</a></h3>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            @if($user->discord != null)
                                <img src="/img/icons/discord.svg" style="width: 24px; height: 24px;" />
                            @endif
                            @if($user->twitter != null)
                                <img src="/img/icons/twitter.svg" style="width: 24px; height: 20px;" />
                            @endif
                            @if($user->youtube != null)
                                <img src="/img/icons/youtube.svg" style="width: 24px; height: 24px;" />
                            @endif
                            @if($user->steam != null)
                                <img src="/img/icons/twitter.svg" style="width: 24px; height: 24px;" />
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
