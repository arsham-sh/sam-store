<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 text-white text-decoration-none">
            <span class="fs-5 d-none d-sm-inline">پنل مدیریت</span>
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="nav-item">
                <a href="{{ route('admin') }}" class="nav-link align-middle px-0">
                    <i class="fs-4 fa fa-home"></i> <span class="ms-1 d-none d-sm-inline">صفحه اصلی</span>
                </a>
            </li>
            <li>
                <a href="{{ route('users.index') }}" class="nav-link px-0 align-middle">
                    <i class="fs-4 fa fa-users"></i> <span class="ms-1 d-none d-sm-inline">مدیریت
                        کاربران</span></a>
            </li>
            <li>
                <a href="{{ route('products.index') }}" class="nav-link px-0 align-middle">
                    <i class="fs-4  fas fa-laptop-code"></i> <span class="ms-1 d-none d-sm-inline">مدیریت
                        محصولات</span> </a>
            </li>
            <li>
                <a href="{{ route('categories.index') }}" class="nav-link px-0 align-middle">
                    <i class="fs-4 fas fa-chalkboard-teacher"></i> <span class="ms-1 d-none d-sm-inline">مدیریت
                        دسته بندی ها</span> </a>
            </li>
            <li>
                <a href="{{ route('comments.index') }}" class="nav-link px-0 align-middle">
                    <i class="fs-4  fa fa-graduation-cap"></i> <span class="ms-1 d-none d-sm-inline">مدیریت
                        نظرات</span> </a>
            </li>
            <li>
                <a href="{{ route('sliders.index') }}" class="nav-link px-0 align-middle">
                    <i class="fs-4 fa fa-sliders"></i> <span class="ms-1 d-none d-sm-inline">مدیریت
                        اسلایدر</span> </a>
            </li>

            <li>
                <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                    <i class="fs-4 fa fa-calendar"></i> <span class="ms-1 d-none d-sm-inline">سفارشات</span> </a>
                <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="{{ route('orders.index', ['type' => 'paid']) }}" class="nav-link px-0"> <span
                                class="d-none d-sm-inline">پرداخت شده</span>
                            <span class="badge bg-success">{{ App\Models\Order::whereStatus('paid')->count() }}</span>
                        </a>
                        <a href="{{ route('orders.index', ['type' => 'unpaid']) }}" class="nav-link px-0"> <span
                                class="d-none d-sm-inline">پرداخت نشده</span>
                            <span class="badge bg-danger">{{ App\Models\Order::whereStatus('unpaid')->count() }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <hr>
        <div class="dropdown pb-4">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user fs-4"></i>
                <span class="d-none d-sm-inline mx-1">پنل مدیریت</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow text-center">
                <li><a class="dropdown-item" href="{{ route('index') }}">خانه</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                        {{ __('خروج') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </li>
            </ul>
        </div>
    </div>
</div>
