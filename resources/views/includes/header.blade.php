<!-- De kop van de site-->


<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">

            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark" href="/">Evenementen</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                {{ Auth::check() ? "Logged In" : "Logged Out" }} &nbsp;

                @if (Auth::guest())
                    <a href="{{ route('login') }}">Login</a>
                @else

                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                @endif
            </div>
        </div>



    </header>



</div>

<br>
