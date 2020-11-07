@extends("layouts.master")

@section("body")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 text-center">
                @include("components.notification")
                <br>
                <h1><b>Register</b></h1>
                <hr>
                <form method="POST" action="/register">
                    {{ csrf_field() }}
                    <label for="username">Username</label>
                    <input class="form-control" id="username" name="username" type="username" placeholder="Username.." required />
                    <label for="email">Email Address</label>
                    <input class="form-control" id="email" name="email" type="email" placeholder="your@email.com" required />
                    <label for="password">Password</label>
                    <input class="form-control" id="password" name="password" type="password" placeholder="Password..." required />
                    <label for="cpassword">Confirm Password</label>
                    <input class="form-control" id="cpassword" name="cpassword" type="password" placeholder="Confirm Password..." required />
                    <br>
                    <input type="submit" class="btn btn-primary btn-block" value="Register" />
                </form>
                <br>
            </div>
        </div>
    </div>
@endsection
