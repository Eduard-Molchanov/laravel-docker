<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Личные кабинеты
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route("guest")}}" class="nav-link
                    {{ request()->is('guest') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Гость</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route("user")}}" class="nav-link
                    {{ request()->is('user') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Пользователь</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route("agent")}}" class="nav-link
                    {{ request()->is('agent') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Агент</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route("admin")}}" class="nav-link
                    {{ request()->is('admin') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Администратор</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route("system")}}" class="nav-link
                    {{ request()->is('system') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Система</p>
                    </a>
                </li>
                {{--                <li class="nav-item">--}}
                {{--                    <a href="#" class="nav-link">--}}
                {{--                        <i class="far fa-circle nav-icon"></i>--}}
                {{--                        <p>Inactive Page</p>--}}
                {{--                    </a>--}}
                {{--                </li>--}}
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{route("products.index")}}" class="nav-link
        {{ request()->is('products') ? 'active' : '' }}">

                <i class="nav-icon fas fa-th"></i>
                <p>
                    Страховые продукты
                    <span class="right badge badge-danger"> New</span>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route("products.create")}}" class="nav-link
        {{ request()->is('products') ? 'active' : '' }}">

                <i class="nav-icon fas fa-th"></i>
                <p>
                    Добавление продукта
                    <span class="right badge badge-danger"> !</span>
                </p>
            </a>
        </li>
    </ul>
</nav>
