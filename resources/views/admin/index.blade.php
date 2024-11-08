@extends('layout.app')

@section('content')
    @include('admin.navadmin')
    

    <div class="container">
        <center>
            <h3 class="mt-5 mb-5">Welcome, Admin! This is your dashboard.</h3>
        </center>

        <div class="row justify-content-start">
            @forelse ($fotos as $foto)
                <div class="col-md-4 mb-4">
                    <div class="my-3" data-aos="fade-up" data-aos-delay="600">
                        <div class="d-flex border-animation-left">
                            <div class="banner-item image-zoom-effect">
                                <div class="image-holder">
                                    <img src="{{ 'storage/' . $foto->image }}" alt="foto" width="300"
                                        class="img-fluid">
                                </div>
                                <div class="banner-content py-4">
                                    <h5 class="element-title text-uppercase">{{ $foto->judul_foto }}</h5>
                                    <p>{{ Str::limit($foto->deskripsi_foto, 30) }}</p>
                                    <small class="text-muted">
                                        Posted by {{ $foto->user ? $foto->user->nama : 'Unknown' }}
                                    </small>
                                    <br>
                                    <div class="btn-left">
                                        <a href="" class="btn-link fs-3 item-anchor">
                                            <i
                                                class="{{ $foto->userLiked() ? 'bi bi-suit-heart-fill text-danger' : 'bi bi-suit-heart' }}"></i>
                                            <small style="font-size: 0.75em;">{{ $foto->likes->count() }}</small>
                                        </a>
                                        <a href="" class="btn-link fs-3 ">
                                            <i class="bi bi-chat-dots"></i>
                                            <small style="font-size:0.75em;">{{ $foto->komen()->count() }}</small>
                                        </a>
                                        <a href="{{ url('admin/' . $foto->id . '/delete') }}" type="submit"
                                            class="btn btn-link btn-sm p-0" title="Delete Comment">
                                            <i class="bi bi-trash3 fs-3"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-success">
                    Semua User Tidak Punya Foto Apapun
                </div>
            @endforelse
        </div>
    </div>

    {{-- @if (Auth::check())
    <p>Logged in as: {{ Auth::user()->name }} (Role: {{ Auth::user()->role }})</p>
@else
    <p>You are not logged in</p>
@endif --}}

    {{-- <div class="container mt-3">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        @endif

       
        <center>
            <h3>Welcome Admin</h3>
        </center>
        

        <div class="col-md-6 text-center" data-aos="fade-up" data-aos-delay="300">

            <form method="GET" role="search">
                <div class="mb-3 d-flex">
                    <input type="search" class="form-control me-2" name="search" id="search"
                        placeholder="Search..." aria-label ="search" autocomplete="off">
                    <button type="submit" class="btn btn-primary" style="border-radius: 10%">Search</button>
                </div>
             </form>
        </div>
        <div class="row justify-content-start">
            @forelse ($fotos as $foto)
                <div class="col-md-4 mb-4"> <!-- Menggunakan col-md-4 untuk 3 foto per baris -->
                    <div class="my-3" data-aos="fade-up" data-aos-delay="600">
                        <div class="d-flex border-animation-left">
                            <div class="banner-item image-zoom-effect">
                                <div class="image-holder">
                                    <img src="{{ 'storage/' . $foto->image }}" alt="foto" width="300" class="img-fluid">
                                </div>
                                <div class="banner-content py-4">
                                    <h5 class="element-title text-uppercase">{{ $foto->judul_foto }}</h5>
                                    <p>{{ Str::limit($foto->deskripsi_foto, 30) }}</p>
                                    <small class="text-muted">
                                        Posted by: {{ $foto->user ? $foto->user->nama : 'Unknown' }}
                                    </small>
                                    <br>
                                    <div class="btn-left">
                                        <a href="{{ route('foto.like', $foto->id) }}" class="btn-link fs-3 item-anchor">
                                            <i class="{{ $foto->userLiked() ? 'bi bi-suit-heart-fill text-danger' : 'bi bi-suit-heart' }}"></i>
                                        </a>
                                        <small style="font-size: 0.75em;">{{ $foto->likes->count() }}</small>
                                        <a href="{{ url('foto/' . $foto->id . '/detail') }}" class="btn-link fs-3 ">
                                            <i class="bi bi-chat-dots"></i>
                                            <small style="font-size:0.75em;">{{ $foto->komen()->count() }}</small>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-success">
                    Anda Belum Punya Foto Apapun
                </div>
            @endforelse
        </div>                                                        
    </div> --}}
@endsection
