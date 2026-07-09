<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link"
                   data-lte-toggle="sidebar"
                   href="#"
                   role="button"
                   aria-label="Toggle sidebar">
                    <i class="bi bi-list"></i>
                </a>
            </li>

            <li class="nav-item d-none d-md-block">
                <a href="./index.html" class="nav-link">
                    <i class="bi bi-grid-1x2 me-1"></i>
                    Home
                </a>
            </li>

            <li class="nav-item d-none d-md-block">
                <a href="./docs/introduction.html" class="nav-link">
                    <i class="bi bi-book me-1"></i>
                    Documentation
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ms-auto">

            <li class="nav-item dropdown">
                <a class="nav-link"
                   data-bs-toggle="dropdown"
                   href="#"
                   aria-label="Messages">
                    <i class="bi bi-chat-text"></i>
                    <span class="navbar-badge badge text-bg-danger">3</span>
                </a>

                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">

                    <a href="#" class="dropdown-item">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <img src="./assets/img/user1-128x128.jpg"
                                     class="img-size-50 rounded-circle me-3"
                                     alt="">
                            </div>

                            <div class="flex-grow-1">
                                <p class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-end text-danger">
                                        <i class="bi bi-star-fill"></i>
                                    </span>
                                </p>

                                <p class="fs-7">Call me whenever you can...</p>

                                <p class="fs-7 text-secondary">
                                    <i class="bi bi-clock-fill me-1"></i>
                                    4 Hours Ago
                                </p>
                            </div>
                        </div>
                    </a>

                    <div class="dropdown-divider"></div>

                    <a href="#" class="dropdown-footer">
                        See All Messages
                    </a>

                </div>
            </li>

            <li class="nav-item dropdown">

                <a class="nav-link"
                   data-bs-toggle="dropdown"
                   href="#"
                   aria-label="Notifications">

                    <i class="bi bi-bell-fill"></i>

                    <span class="navbar-badge badge text-bg-warning">
                        15
                    </span>

                </a>

                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">

                    <span class="dropdown-item dropdown-header">
                        15 Notifications
                    </span>

                    <div class="dropdown-divider"></div>

                    <a href="#" class="dropdown-item">
                        <i class="bi bi-envelope me-2"></i>
                        4 New Messages
                    </a>

                    <div class="dropdown-divider"></div>

                    <a href="#" class="dropdown-footer">
                        See All Notifications
                    </a>

                </div>

            </li>

            <li class="nav-item">
                <a class="nav-link"
                   href="#"
                   data-lte-toggle="fullscreen">

                    <i data-lte-icon="maximize"
                       class="bi bi-arrows-fullscreen"></i>

                    <i data-lte-icon="minimize"
                       class="bi bi-fullscreen-exit d-none"></i>

                </a>
            </li>

            <li class="nav-item dropdown">

                <a class="nav-link"
                   href="#"
                   id="bd-theme"
                   data-bs-toggle="dropdown">

                    <i class="bi bi-sun-fill"
                       data-lte-theme-icon="light"></i>

                    <i class="bi bi-moon-fill d-none"
                       data-lte-theme-icon="dark"></i>

                    <i class="bi bi-circle-half d-none"
                       data-lte-theme-icon="auto"></i>

                </a>

                <ul class="dropdown-menu dropdown-menu-end">

                    <li>
                        <button class="dropdown-item"
                                data-bs-theme-value="light">
                            <i class="bi bi-sun-fill me-2"></i>
                            Light
                        </button>
                    </li>

                    <li>
                        <button class="dropdown-item"
                                data-bs-theme-value="dark">
                            <i class="bi bi-moon-fill me-2"></i>
                            Dark
                        </button>
                    </li>

                    <li>
                        <button class="dropdown-item active"
                                data-bs-theme-value="auto">
                            <i class="bi bi-circle-half me-2"></i>
                            Auto
                        </button>
                    </li>

                </ul>

            </li>

            <li class="nav-item dropdown user-menu">

                <a href="#"
                   class="nav-link dropdown-toggle"
                   data-bs-toggle="dropdown">

                    <img src="./assets/img/user2-160x160.jpg"
                         class="user-image rounded-circle shadow"
                         alt="User">

                    <span class="d-none d-md-inline">
                        Alexander Pierce
                    </span>

                </a>

                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">

                    <li class="user-header text-bg-primary">

                        <img src="./assets/img/user2-160x160.jpg"
                             class="rounded-circle shadow"
                             alt="User">

                        <p>
                            Alexander Pierce - Web Developer
                            <small>Member since Nov. 2023</small>
                        </p>

                    </li>

                    <li class="user-body">

                        <div class="row">

                            <div class="col-4 text-center">
                                <a href="#">Followers</a>
                            </div>

                            <div class="col-4 text-center">
                                <a href="#">Sales</a>
                            </div>

                            <div class="col-4 text-center">
                                <a href="#">Friends</a>
                            </div>

                        </div>

                    </li>

                    <li class="user-footer">

                        <a href="#" class="btn btn-outline-secondary">
                            Profile
                        </a>

                        <a href="#" class="btn btn-outline-danger float-end">
                            Sign Out
                        </a>

                    </li>

                </ul>

            </li>

        </ul>

    </div>
</nav>