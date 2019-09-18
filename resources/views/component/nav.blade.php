<nav>
    <div class="nav-wrapper">
        <a href="/" class="brand-logo  animated bounceInLeft" style="padding-left:5px">Laravel</a>
        <ul class="right hide-on-med-and-down">
            @guest
                <li>
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li>
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
            @else
            <li class="{{Request::is('home')? 'active':''}} "><a href="{{action(['App\Http\Controllers\HomeController' , 'index'])}}" class=" {{($page == 'home')? 'animated rollIn':''}}">Dashboard</a></li>
            <li class="{{Request::is('home')? 'active':''}} "><a href="{{action('HomeController@index')}}" class=" {{($page == 'home')? 'animated rollIn':''}}">Dashboard</a></li>
            <li class="{{Request::is('home')? 'active':''}} "><a href="/home" class=" {{($page == 'home')? 'animated rollIn':''}}">Home</a></li>
            <li class="{{Request::is('about')? 'active':''}} "><a href="/about" class="{{($page == 'about')? 'animated rollIn':''}}">About</a></li>
            <li class="{{Request::is('contact')? 'active':''}} "><a href="{{route('contact')}}" class="{{($page == 'contact')? 'animated rollIn':''}}">Contact</a></li>
            <li class="{{Request::is('product')? 'active':''}} "><a href="{{route('product')}}" class="{{($page == 'product')? 'animated rollIn':''}}">Product</a></li>
            <li class="{{Request::is('customer')? 'active':''}} "><a href="{{route('customer')}}" class="{{($page == 'customer')? 'animated rollIn':''}}">Customer</a></li>
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"> {{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
            @endguest
        </ul>
        
    </div>
</nav>
<ul id="dropdown1" class="dropdown-content">
    <li>
        <a class="" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>