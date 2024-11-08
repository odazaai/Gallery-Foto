<nav class="navbar navbar-expand-lg navbar-custom text-uppercase fs-6 p-3 border-bottom align-items-center">
    <div class="container-fluid">
        <div class="row justify-content-between align-items-center w-100">

            <div class="col-auto">
                <a class="navbar-brand" href="/content/home">
                    COLLECTIONS
                </a>
            </div>

            <div class="col-auto">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                    aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>

                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 gap-1 gap-md-5 pe-3">
                            <a class="nav-link" href="/admin" aria-haspopup="true" aria-expanded="false">
                                <i class="fa-solid fa-house me-2"></i> HOME
                            </a>
                            <a class="nav-link" href="/admin/users" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user me-2"></i> USER
                            </a>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-3 col-lg-auto">
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="nav-link text-black" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i> LOG OUT
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
