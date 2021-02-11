<html>
    <head>
        <title>Bikes Home</title>
        <link rel="stylesheet" href="fontawesome/css/all.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
     <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}"/>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <style>
    #c{background-color:blue; 
      position:;
      }
    li a{color:white;}
    li a:hover{color:black;}
    #b{color:white;}
    #o{ color:white;
        font-size:20px;
        margin-left:500px;}
    #o:hover{color:black;}
    button span{color:white;}
    </style>
    </head>
    
    <body>
    <nav class="navbar container" id="c">
<div class="">
<!-- logo -->
<div class="navbar-header" >
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mn">
<span class="icon-bar">-</span>
<span class="icon-bar">-</span>
<span class="icon-bar">-</span>
</button>
<a href="./" class="navbar-brand" id="b">Bikes Home</a>
</div>
<!-- menu items -->
<div class="collapse navbar-collapse" id="mn">
<ul class="nav navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="./home">Home<span class="sr-only">(current)</span></a>
     </li>
     <!-- @if(Session::get('user'))
        <li class="nav-item">
        <a class="nav-link" href="list">List</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="add">Add</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="">Search</a>
        </li>
        @endif
        @if(!Session::get('user'))
        <li class="nav-item">
        <a class="nav-link" href="login" id="l">Login</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="register" id="r">Register</a>
        </li>
        @else
        <li class="nav-item">
        <a class="nav-link" href="#" id="r">wellcome <?php echo session()->get('user');?></a>
        </li>
        <li class="nav-item">
        <a  id="o" class="nav-link" href="out">Log out</a>
        </li>@endif -->
        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        

                                <li class="nav-item">
                                <a class="nav-link" href="list">List</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="add">Add</a>
                                </li> 

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

        </ul>
    </div>
</div>
</nav>

      <div class="container">
      @yield('content')
      </div>
     
        <!-- <footer>Copyrights by retaurant App </footer> -->
        </body>
</html>