<header>

    <div class="bg-light col-12 container-fluid nav-top d-none d-lg-block">

        <div class="row">
            <div class="col-1 pt-1 text-center">
                <img src="./images/jordan.svg" alt="">
            </div>
            <div class="col-11 d-flex justify-content-end nav-left">
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item border-start border-dark">
                                    <a class="nav-link" href="#">تماس با ما</a>
                                </li>
                                <li class="nav-item border-start border-dark">
                                    <a class="nav-link" href="#">درباره ما</a>
                                </li>
                                @guest
                                    @if (Route::has('register'))
                                        <li class="nav-item border-start border-dark">
                                            <a class="nav-link" href="{{ route('register') }}">ثبت نام</a>
                                        </li>
                                    @endif

                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">ورود</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                            role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end text-center mt-2"
                                            aria-labelledby="navbarDropdown">

                                            @if (Auth::user()->superuser == 1)
                                                <a href="{{ route('admin') }}" class="dropdown-item">پنل مدیریت</a>
                                            @endif

                                            <a href="{{ route('profile') }}" class="dropdown-item">پروفایل</a>
                                            <br>

                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                {{ __('خروج') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

    </div>

    <div class="container-fluid d-none d-lg-block">
        <div class="row">
            <div class="col-lg-3">
                <a href="" class="nike-svg">
                    <svg aria-hidden="true" class="swoosh-svg" focusable="false" viewBox="0 0 24 24" role="img"
                        width="24px" height="24px" fill="none">
                        <path fill="currentColor" fill-rule="evenodd"
                            d="M21 8.719L7.836 14.303C6.74 14.768 5.818 15 5.075 15c-.836 0-1.445-.295-1.819-.884-.485-.76-.273-1.982.559-3.272.494-.754 1.122-1.446 1.734-2.108-.144.234-1.415 2.349-.025 3.345.275.2.666.298 1.147.298.386 0 .829-.063 1.316-.19L21 8.719z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
            <div class="col-lg-6 d-flex justify-content-center">
                <nav class="navbar navbar-expand-lg bg-white">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="main_nav">
                            <ul class="navbar-nav">
                                <li class="nav-item active"> <a class="nav-link" href="{{ route('index') }}">صفحه
                                        اصلی</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('products') }}"> فروشگاه</a>
                                </li>

                                @foreach ($categories as $category)
                                    @if ($category->children->isNotEmpty())
                                        <li class="nav-item dropdown has-megamenu">
                                            <a class="nav-link dropdown-toggle" disabled
                                                href="/category/{{ $category->slug }}" data-bs-toggle="dropdown">
                                                {{ $category->name }}
                                            </a>
                                            <div class="dropdown-menu megamenu" role="menu">
                                                <div class="row g-3">
                                                    @foreach ($category->children as $childCategory)
                                                        <div class="col-lg-3 col-6">
                                                            <div class="col-megamenu">

                                                                <h6 class="title">
                                                                    <a href="/category/{{ $childCategory->slug }}"
                                                                        class="text-dark">
                                                                        {{ $childCategory->name }}
                                                                    </a>
                                                                </h6>
                                                                <ul class="list-unstyled">

                                                                    @foreach ($childCategory->children as $subCategory)
                                                                        <li><a
                                                                                href="/category/{{ $subCategory->slug }}">{{ $subCategory->name }}</a>
                                                                        </li>
                                                                    @endforeach

                                                                </ul>

                                                            </div> <!-- col-megamenu.// -->
                                                        </div><!-- end col-3 -->
                                                    @endforeach

                                                </div><!-- end row -->
                                            </div> <!-- dropdown-mega-menu.// -->
                                        </li>
                                    @else
                                        <li class="nav-item"><a class="nav-link"
                                                href="/category/{{ $category->slug }}">{{ $category->name }}</a></li>
                                    @endif
                                @endforeach

                            </ul>

                        </div> <!-- navbar-collapse.// -->
                    </div> <!-- container-fluid.// -->
                </nav>
            </div>
            <div class="col-lg-3 text-center">

                <!-- Button trigger modal -->
                <button type="button" data-bs-toggle="modal" data-bs-target="#myModal"
                    class="btn btn-default navbar-btn border-0 btn-search">
                    <i class="fa fa-search fs-5"></i>
                    <span class="float-end">جستجو</span>
                </button>

                <span class="me-3 bag">
                    <a href="{{ route('cart') }}">
                        <i class="fa fa-shopping-bag fs-5 text-dark"></i>
                    </a>
                </span>

                <!-- Modal -->
                <div class="modal fade modal-search" id="myModal" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="modal-header d-block text-center mt-2">
                                        <button type="button" class="close" data-bs-dismiss="modal"
                                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="modal-body">
                                        <form class="navbar-form" role="search" method="GET"
                                            action="{{ route('search') }}">
                                            <div class="form-group d-flex me-5 mt-2">
                                                <input type="text" class="form-control" placeholder="جستجو"
                                                    name="search" value="{{ request()->search ?? '' }}">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-2 mt-2 text-center">
                                    <a href="" class="nike-svg">
                                        <svg aria-hidden="true" class="swoosh-svg" focusable="false"
                                            viewBox="0 0 24 24" role="img" width="24px" height="24px"
                                            fill="none">
                                            <path fill="currentColor" fill-rule="evenodd"
                                                d="M21 8.719L7.836 14.303C6.74 14.768 5.818 15 5.075 15c-.836 0-1.445-.295-1.819-.884-.485-.76-.273-1.982.559-3.272.494-.754 1.122-1.446 1.734-2.108-.144.234-1.415 2.349-.025 3.345.275.2.666.298 1.147.298.386 0 .829-.063 1.316-.19L21 8.719z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Button trigger modal -->
                <button type="button" class="btn border-0 bag" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <i class="fa fa-filter fs-5"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog filter-content">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-end">

                                <form action="{{ route('products.search') }}" method="GET">
                                    <label for="" class="form-label">دسته بندی</label>
                                    <select name="category" id="category" class="form-select my-2">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <input type="number" name="min_price" class="form-control my-2" placeholder="کمتری قیمت" value="{{ request('min_price') }}">

                                    <input type="number" name="max_price" class="form-control my-2" placeholder="بیشترین قیمت" value="{{ request('max_price') }}">
                                    

                                    <button class="btn btn-primary mt-3">جستجو</button>
                                </form>

                            </div>
                        
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="d-block d-lg-none">
        <nav class="navbar bg-body-tertiary navbar-mobile">
            <div class="container-fluid nav-mobile">

                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="">
                    <span class="bag me-3">

                        <a href="{{ route('cart') }}">
                            <i class="fa fa-shopping-bag fs-5 text-dark"></i>
                        </a>
                        <i class="fa fa-user fs-5 me-2"></i>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#myModalMob"
                            class="btn btn-default navbar-btn border-0">
                            <i class="fa fa-search fs-5"></i>
                        </button>
                    </span>

                    <!-- Modal -->
                    <div class="modal fade modal-search" id="myModalMob" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="row">
                                    <div class="col-2">
                                        <div class="modal-header d-block text-center mt-2">
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <div class="modal-body">
                                            <form class="navbar-form" role="search">
                                                <div class="form-group d-flex me-5 mt-2">
                                                    <input type="text" class="form-control" placeholder="جستجو">
                                                    <button type="submit" class="btn btn-default">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <a href="" class="nike-svg-mobile navbar-brand me-auto">
                    <svg aria-hidden="true" class="swoosh-svg" focusable="false" viewBox="0 0 24 24" role="img"
                        width="24px" height="24px" fill="none">
                        <path fill="currentColor" fill-rule="evenodd"
                            d="M21 8.719L7.836 14.303C6.74 14.768 5.818 15 5.075 15c-.836 0-1.445-.295-1.819-.884-.485-.76-.273-1.982.559-3.272.494-.754 1.122-1.446 1.734-2.108-.144.234-1.415 2.349-.025 3.345.275.2.666.298 1.147.298.386 0 .829-.063 1.316-.19L21 8.719z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('index') }}">صفحه
                                    اصلی</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('products') }}">فروشگاه</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    پوشاک
                                </a>
                                <ul class="dropdown-menu text-center">
                                    <li><a class="dropdown-item" href="#">مردانه</a></li>
                                    <li><a class="dropdown-item" href="#">زنانه</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>



</header>
