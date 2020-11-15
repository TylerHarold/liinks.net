<!-- Footer -->
<br><br>
<section>
    <div class="container">
        <div class="row p-3">
            <div class="col-md-9 col-sm-12">
                <h2 style="font-weight: bold;">about pfile</h2>
                <p class="text-white">
                    PFILE allows users of different interests the ability to create a customizable profile
                    to display their social medias, latest music, and provide updates to their community.
                </p>
            </div>
            <div class="col-md-3 col-sm-12">
                <div align="right">
                    <h2 style="font-weight: bold;">sitemap</h2>
                    @if(!Auth::check())
                        <a href="/register">sign up</a><br>
                        <a href="/login">login</a><br>
                        <a href="/about">about</a><br>
                    @else
                        <a href="/about">about</a><br>
                        <a href="/settings">settings</a><br>
                        <a href="/updates">updates</a><br>
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>
