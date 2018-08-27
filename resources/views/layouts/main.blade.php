<!doctype html>
<html>



<!-- <head> </head> -->
@include('includes.head')

<!-- Kop -->
@include('includes.header')




<body>

<main role="main" class="container">



    <div class="row">



        @if(Auth::check())

        <div class="col-md-8 blog-main">

@yield('content')

        </div><!-- /.blog-main -->

<aside class="col-md-4 blog-sidebar">
@include('includes.sidebar')

</aside>

            @else

            <div class="col-md-12 blog-main">

                @yield('content')

            </div><!-- /.blog-main -->

            @endif

    </div><!-- /.row -->




</main><!-- /.container -->

@include('includes.modals')


@include('includes.foot')

</body>

</html>
