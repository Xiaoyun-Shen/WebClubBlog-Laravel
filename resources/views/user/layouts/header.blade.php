<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('blog')}}">Home</a>
                </li>

          <!--      <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>  -->

                <!-- Authentication Links -->
                @if(Auth::guest())
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">Register</a>
                </li>

                @else
                     <li class="nav-item">
                         <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                          </form>
                      </li>
                @endif


            </ul>
        </div>
    </div>
</nav>

<header class="masthead" style="background-image: url(@yield('bg-img'))">

    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>@yield('title')</h1>
                    <span class="subheading">@yield('subtitle')</span>
                </div>
            </div>
        </div>
    </div>

</header>