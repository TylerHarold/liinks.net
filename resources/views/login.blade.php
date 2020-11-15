@extends("layouts.master")

@section("body")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 text-center">
                @include("components.notification")
                <br>
                <h1><b>Login</b></h1>
                <hr>
                <form method="POST" action="/login">
                    {{ csrf_field() }}
                    <label for="email">Email Address</label>
                    <input class="form-control" id="email" name="email" type="email" placeholder="your@email.com" required />
                    <label for="password">Password</label>
                    <input class="form-control" id="password" name="password" type="password" placeholder="Password..." required />
                    <br>
                    <input type="submit" class="btn btn-login btn-primary btn-block" value="Login" />
                </form>
                <br>
            </div>
        </div>
    </div>
@endsection
