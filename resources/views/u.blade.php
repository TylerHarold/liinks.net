@extends("layouts.master")

@section("body")
    <div class="container">
        <div class="row p-3">
            <div class="col-md-2 col-sm-12 my-auto">
                @if($user->avatar_path != null)
                    <img src="{{ $user->avatar_path }}" width="100%" />
                @else
                    <img src="/img/default.png" width="100%" />
                @endif
            </div>
            <div class="col-md-6 col-sm-12 my-auto">
                <h1>
                    {{ $user->username }}
                </h1>
                <h4>Subtitle / Badges</h4>
            </div>
            <div class="col-md-4 col-sm-12 my-auto">
                <h4>links</h4>
                <hr>
                <div class="row">
                    @if(Auth::check())
                        @if($user->discord != null)
                            <div class="col-6">
                                <h6><img src="/img/icons/discord.svg" style="width: 16px; height: 16px;" /> {{ $user->discord }}</h6>
                            </div>
                        @endif
                        @if($user->twitter != null)
                            <div class="col-6">
                                <h6><img src="/img/icons/twitter.svg" style="width: 16px; height: 12px;" /> {{ $user->twitter }}</h6>
                            </div>
                        @endif
                        @if($user->youtube != null)
                            <div class="col-6">
                                <h6><img src="/img/icons/youtube.svg" style="width: 16px; height: 16px;" /> {{ $user->youtube }}</h6>
                            </div>
                        @endif
                        @if($user->steam != null)
                            <div class="col-6">
                                <h6><img src="/img/icons/twitter.svg" style="width: 16px; height: 16px;" /> {{ $user->steam }}</h6>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
        <br>
        <div class="row p-3">
            <div class="col-12 boxed-content">
                <h2>bio</h2>
                <hr>
                @if($user->bio != null)
                    <h5>{{ $user->bio }}</h5>
                @else
                    <h5>This user has not set a bio.</h5>
                @endif
            </div>
        </div>
        <br>
        <div class="row p-3">
            <div class="col-12 my-auto">
                <h2>recent updates</h2>
                @if(Request::segment(2) == null)
                    <button class="btn btn-primary" data-toggle="modal" data-target="#createPost"><i class="fa fa-plus"></i> New Update</button>
                @endif
            </div>
            @foreach($user->posts as $post)
                <div class="col-12 boxed-content">
                    <div class="row">
                        <div class="col-md-1">
                            @if($user->avatar_path != null)
                                <img src="{{ $user->avatar_path }}" width="100%" />
                            @else
                                <img src="/img/default.png" width="100%" />
                            @endif
                        </div>
                        <div class="col-md-11 my-auto">
                            <h3>{{ $user->username }} <h6>{{ $post->created_at->diffForHumans() }}</h6></h3>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <h6>{{ $post->post_body }}</h6>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection

<script>
    $('#createPost').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
</script>
