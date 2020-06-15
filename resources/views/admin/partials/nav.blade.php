<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route('admin.dashboard') }}">Admin</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="#">Sign out</a>
        </li>
    </ul>
</nav>
<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{(request()->url() == route('admin.dashboard') ? 'active' : '')}}" href="{{ route('admin.dashboard') }}">
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file"></span>
                    Orders
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link {{(request()->url() == route('admin.product.index') ? 'active' : '')}} dropdown-btn" href="javascript:void(0)" id="productDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span data-feather="shopping-cart"></span>
                    Products
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-down"><polyline points="7 13 12 18 17 13"/><polyline points="7 6 12 11 17 6"/></svg>
                </a>
                <div class="dropdown-menu" aria-labelledby="productDropdown">
                    <a class="dropdown-item" href="{{route('admin.product.create')}}">Add Category</a>
                    <a class="dropdown-item" href="{{route('admin.product.index')}}">All Categories</a>
                    <a class="dropdown-item" href="{{route('admin.product.trash')}}">Trashed Categories</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link {{(request()->url() == route('admin.category.index') ? 'active' : '')}} dropdown-btn" href="javascript:void(0)" id="categoryDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span data-feather="bar-chart-2"></span>
                    Categories
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-down"><polyline points="7 13 12 18 17 13"/><polyline points="7 6 12 11 17 6"/></svg>
                </a>
                <div class="dropdown-menu" aria-labelledby="categoryDropdown">
                    <a class="dropdown-item" href="{{route('admin.category.create')}}">Add Category</a>
                    <a class="dropdown-item" href="{{route('admin.category.index')}}">All Categories</a>
                    <a class="dropdown-item" href="{{route('admin.category.trash')}}">Trashed Categories</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="users"></span>
                    Customers
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="layers"></span>
                    Integrations
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Current month
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Last quarter
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Social engagement
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Year-end sale
                </a>
            </li>
        </ul>
    </div>
</nav>

