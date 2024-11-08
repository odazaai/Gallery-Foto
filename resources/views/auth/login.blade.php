<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login | Collections</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="TemplatesJungle">
    <meta name="keywords" content="ecommerce,fashion,store">
    <meta name="description" content="Bootstrap 5 Fashion Store HTML CSS Template">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href={{ asset('style/css/vendor.css') }}>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href={{ asset('style/style.css') }}>
    <link rel="stylesheet" type="text/css" href="gaya/style.css"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&family=Marcellus&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 py-5 my-5">

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session()->has('logineror'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('logineror') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="subscribe-header text-center pb-3">
                    <h3 class="section-title text-uppercase">Welcome To collections</h3>
                </div>
                <form action="{{ route('login.authenticate') }}" method="post" class="d-flex flex-wrap gap-2">
                    @csrf
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" placeholder="Username"
                        class="form-control form-control-lg @error('username')is=invalid @enderror" required
                        value="{{ old('username') }}">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password"
                        class="form-control form-control-lg mb-3" required>

                    <button class="btn btn-dark btn-lg text-uppercase w-100">Log In</button>
                </form>
                <h5 class="text-center mt-3 btn-link">Don't have an account? Please <a href="/regist"
                        class="btn-link">Sign Up</a></h5>
            </div>
        </div>
    </div>

    <script src={{ asset('style/js/jquery.min.js') }}></script>
    <script src={{ asset('style/js/plugins.js') }}></script>
    <script src={{ asset('style/js/SmoothScroll.js') }}></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src={{ asset('style/js/script.min.js') }}></script>
</body>

</html>
