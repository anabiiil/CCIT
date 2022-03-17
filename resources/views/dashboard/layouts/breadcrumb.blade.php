<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">@yield('title')</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ url('admin/index') }}"><i class="bx bx-home-alt"></i></a>
                </li>
                @yield('parents')
                <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            @yield('action')
        </div>
    </div>
</div>
<!--end breadcrumb-->
{{-- <h6 class="mb-0 text-uppercase">@yield('title')</h6> --}}
<hr />
