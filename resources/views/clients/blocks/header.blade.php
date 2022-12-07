<header class="py-3 border shadow">
    <div class="container">
        <div class="row row justify-content-between" >
            <div class="col-1 glitch-wrapper">
                <div class="glitch" data-glitch="PNP">PNP</div>
             </div>
            <div class="col d-flex justify-content-start align-items-center">
                <ul class="nav mr-auto">
                    <li class="nav-item {{ request()->route()->getName() == 'shop.index' ? 'active': '' }}">
                        <a class="nav-link" href="{{route('home')}}">Shop</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="">Thương hiệu</a>
                        <div class="dropdown-content" id="dropthuonghieu">
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="">Danh Mục</a>
                        <div class="dropdown-content" id="dropdanhmuc">
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('cart')}}">
                            Cart 
                            {{-- @if (Cart::instance('default')->count() > 0)
                                <span class="badge badge-primary">
                                    {{ Cart::instance('default')->count() }}
                                </span>
                            @endif --}}
                        </a>
                    </li>
                </ul>
                <div>
                    <input id="search" name="search" style="width:400px; margin:0;" id="search" class="form-control custom-border" placeholder="Search" aria-label="Search">
                </div>
                
                <ul class="nav">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    @if (Auth::user()->level==0)
                                        <a class="dropdown-item" href="{{ route('sanpham') }}">
                                        {{ __('Admin') }}
                                        </a>
                                    @endif
                                </div>
                            </li>
                        @endguest
                </ul>
                  
            </div>
            <hr>
        </div>
    </div>
</header>


