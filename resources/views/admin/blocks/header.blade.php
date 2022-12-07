<header class="py-3 border shadow">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <a class="non-textdecoration" href="{{route('home')}}"><h1>PNP</h1></a>
            </div>
            <div class="col-8 d-flex justify-content-end align-items-center">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('sanpham')}}">Sản Phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('danhmuc')}}">Danh mục</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('thuonghieu')}}">Thương hiệu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('donnhaphang')}}">Đơn nhập hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('hoadon')}}">Hóa đơn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('thongke')}}">Thống kê</a>
                    </li> 
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
                        </div>
                    </li>
                  </ul>



            </div>
            <hr>
        </div>
    </div>
</header>
