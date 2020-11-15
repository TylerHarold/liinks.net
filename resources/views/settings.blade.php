@extends("layouts.master")

@section("body")
    <br>
    <div class="container">
        <div class="row p-3 boxed-content">
            <div class="col-12">
                <h1>Settings</h1>
                <hr>
                @include("components.notification")
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        @if($user->avatar_path != null)
                            <img src="{{ $user->avatar_path }}" width="100%" />
                        @else
                            <img src="/img/default.png" width="100%" />
                        @endif
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <form method="POST" action="/settings/upload-avatar" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <label for="avatar">Upload Avatar</label>
                            <br>
                            <input type="file" name="avatar" id="avatar" accept=".png,.jpg">
                            <br>
                            <input type="submit" class="btn btn-primary" value="Upload Avatar" />
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <form method="POST" action="/settings/change-bio" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <label for="avatar">Change Bio</label>
                    <br>
                    <textarea class="form-control" id="bio" name="bio" rows="2" style="width: 100%;"  maxlength="400"></textarea>
                    <input type="submit" class="btn btn-primary" value="Change Bio" />
                </form>
            </div>
            <div class="col-12">
                <h2>Links</h2>
                <hr>
            </div>
            <form method="POST" action="/settings/edit-links" enctype="multipart/form-data" style="width: 100%">
                {{ csrf_field() }}
                <div class="row p-3">
                    <div class="col-md-6 col-sm-12">
                        <h5><img src="/img/icons/discord.svg" style="width: 24px;" /> Discord</h5>
                        <input class="form-control" id="discord" name="discord" type="discord" placeholder="Discord" />
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <h5><img src="/img/icons/twitter.svg" style="width: 24px;" /> Twitter</h5>
                        <input class="form-control" id="twitter" name="twitter" type="twitter" placeholder="Twitter" />
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <h5><img src="/img/icons/youtube.svg" style="width: 24px;" /> YouTube</h5>
                        <input class="form-control" id="youtube" name="youtube" type="youtube" placeholder="Youtube" />
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <h5><img src="/img/icons/steam.svg" style="width: 24px;" /> Steam</h5>
                        <input class="form-control" id="steam" name="steam" type="steam" placeholder="Steam" />
                    </div>
                    <div class="col-12">
                        <input type="submit" class="btn btn-primary btn-block" value="Update Links" />
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
