<!DOCTYPE html>
<html lang="en">

<head>
    <title>Regist | Collections</title>
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
            <div class="col-md-8 py-3 my-3">
                <div class="subscribe-header text-center pb-3">
                    <h3 class="section-title text-uppercase">SIGN UP</h3>
                </div>
                <form method="post" action="/regist" class="d-flex flex-wrap gap-2">
                    @csrf
                    <label for="form-control" class="form-label">Name</label>
                    <input type="text" name="nama" placeholder="Name"
                        class="form-control form-control-lg @error('nama') is-invalid 
                        @enderror"
                        required value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="form-control" class="form-label">Email</label>
                    <input type="text" name="email" placeholder="Email"
                        class="form-control form-control-lg @error('email') is-invalid 
                        @enderror"
                        required value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="form-control" class="form-label">Username</label>
                    <input type="text" name="username" placeholder="Username"
                        class="form-control form-control-lg @error('username') is-invalid 
                        @enderror"
                        required value="{{ old('username') }}">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="form-control" class="form-label">Password</label>
                    <input type="password" name="password" placeholder="Password"
                        class="form-control form-control-lg @error('password') is-invalid 
                        @enderror"
                        required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="form-control" class="form-label">Address</label>
                    <input type="text" name="alamat" placeholder="Address"
                        class="form-control form-control-lg mb-3 @error('alamat') is-invalid 
                        @enderror"
                        required value="{{ old('alamat') }}">
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <button class="btn btn-dark btn-lg text-uppercase w-100">Sign Up</button>
                </form>
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
