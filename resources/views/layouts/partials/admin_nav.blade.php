<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">
        <ul class="navbar-item flex-row">
            <li class="nav-item theme-logo">
                <a>
                    <img src="{{ asset('assets/images/avatar.jpg') }}" class="navbar-logo" alt="logo">
                </a>
            </li>
        </ul>

        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-list">
                <line x1="8" y1="6" x2="21" y2="6"></line>
                <line x1="8" y1="12" x2="21" y2="12"></line>
                <line x1="8" y1="18" x2="21" y2="18"></line>
                <line x1="3" y1="6" x2="3" y2="6"></line>
                <line x1="3" y1="12" x2="3" y2="12"></line>
                <line x1="3" y1="18" x2="3" y2="18"></line>
            </svg></a>

        <ul class="navbar-item flex-row search-ul">

        </ul>
        <ul class="navbar-item flex-row navbar-dropdown">

            <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('assets/images/avatar.jpg') }}" alt="admin-profile" class="img-fluid">
                </a>
                <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="userProfileDropdown">
                    <div class="user-profile-section">
                        <div class="media mx-auto">
                            <img src="{{ asset('assets/images/avatar.jpg') }}" class="img-fluid mr-2" alt="avatar">
                            <div class="media-body">
                                <h5>
                                    {{ auth()->user()->name }}
                                </h5>
                                <p>{{ auth()->user()->roles->first()->name }}</p>
                            </div>
                        </div>
                    </div>
                    @role('agent')
                        <div class="dropdwon-item">
                            <a href="{{ route('agent.account') }}">

                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                    class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                </svg>
                                settings

                            </a>
                        </div>
                    @endrole
                    @role('admin')
                        <div class="dropdwon-item">
                            <a href="{{ route('admin.account') }}">

                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                    class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                </svg>
                                settings

                            </a>
                        </div>
                    @endrole
                    <div class="dropdown-item">

                        <form action="{{ route('logout') }}" method="post" name="logout">
                            @csrf


                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-log-out">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                            <span onclick="document.forms['logout'].submit();" style="cursor: pointer;">
                                Logout
                            </span>


                        </form>


                    </div>

            </li>
        </ul>
    </header>
</div>
