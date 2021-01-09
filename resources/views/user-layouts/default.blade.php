@extends("layouts.profile")

@section("body")
    <style>
        body {
            background: var(--primary);
        }

        h1, h2, h3, h4, h5, h6 {
            color: var(--neutral);
        }
    </style>
    <div align="right">
        <a href="/settings"><i class="fa fa-cog m-3" style="color: white; font-size: 32px;"></i></a>
    </div>
    <br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12">
                <div align="center">
                    @if($user->avatar_path != null)
                        <img class="rounded" src="{{ $user->avatar_path }}" width="25%" />
                    @else
                        <img class="rounded" src="/img/default.png" width="25%" />
                    @endif
                        <br><br>
                        <h1>{{ $user->username }}</h1>
                        @if($user->bio != null)
                            <br>
                            <h3>{{ $user->bio }}</h3>
                        @endif
                </div>
            </div>
            <div class="col-md-8 col-sm-12">
                <div align="center">
                    @if($links != null)
                        @foreach($links as $key => $value)
                            <a class="boxed-link" href="{{ $value }}">{{ $key }}</a>
                        @endforeach
                    @else
                        <br><br>
                        <h4>{{ $user->username }} doesn't have anything to share at this time :(</h4>
                        <br><br>
                    @endif
                </div>
            </div>
            <br><br>
            <div class="col-md-8 col-sm-12 m-5">
                <div align="center">
                    <h6>Powered by</h6>
                    <br>
                    <a class="boxed-link" href="/"><img src="/img/logo.svg" width="128" /></a>
                </div>
            </div>
        </div>
    </div>
@endsection
