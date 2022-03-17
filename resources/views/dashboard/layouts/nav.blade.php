<div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="{{ asset('dashboard') }}/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text">{{ config('app.name') }}</h4>
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="timeline">
                        <div class="parent-icon"> <i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Index</div>
                    </a>
                </li>
                <li class="menu-label">Pages</li>


                <li>
                    <a href="{{ url('admin/users') }}">
                        <div class="parent-icon"> <i class='bx bx-user-circle'></i>
                        </div>
                        <div class="menu-title">Users</div>
                    </a>
                </li>

            </ul>
            <!--end navigation-->
        </div>
