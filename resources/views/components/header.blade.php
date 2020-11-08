<div class="container">
    <div class="row p-3">
        <div class="col-md-6 col-sm-12">
            <a href="/"><img class="img-fluid" src="/img/logo.svg" style="height: 64px; width: auto;" /></a>
        </div>
        <div class="col-md-6 col-sm-12 my-auto">
            <div align="right">
                <ul class="navbar-nav mr-auto nav-fill w-100">
                    <div class="container">
                        <div class="row">
                            @if(!Auth::check())
                                <li class="nav-item">
                                    <a class="nav-link" href="/">home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/about">about</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/register">sign up</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/login">login</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="/connect">connect</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/servers">servers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/u">profile</a>
                                </li>
                            @endif
                        </div>
                    </div>

                </ul>
            </div>
        </div>
    </div>
</div>
