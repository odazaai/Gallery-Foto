@extends('layout.app')

@section('content')
    @include('layout.navbar')

    <div class="container mt-5">
        <div class="row">
            <h3>
                <center>{{ Auth::user()->nama }}'s Collections</center>
            </h3>
            <h5 class="mb-2">
                <center>@ {{ Auth::user()->username }}</center>
            </h5>
        </div>
        <ul class="nav nav-underline justify-content-center" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="photos-tab" data-bs-toggle="tab" href="#photos" role="tab"
                    aria-controls="photos" aria-selected="true">Photos</a>
            </li>
        </ul>
        <hr>
    </div>

    <!-- Tab Content -->
    <div class="container">
        <div class="tab-content" id="myTabContent">
            <!-- Photos Tab Pane -->
            <div class="tab-pane fade show active" id="photos" role="tabpanel" aria-labelledby="photos-tab">
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
                                                <a href="{{ route('foto.like', $foto->id) }}"
                                                    class="btn-link fs-3 item-anchor">
                                                    <i
                                                        class="{{ $foto->userLiked() ? 'bi bi-suit-heart-fill text-danger' : 'bi bi-suit-heart' }}"></i>
                                                    <small style="font-size: 0.75em;">{{ $foto->likes->count() }}</small>
                                                </a>
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
            </div>

            {{-- <!-- Albums Tab Pane -->
        <div class="tab-pane fade" id="albums" role="tabpanel" aria-labelledby="albums-tab">
            <div class="row justify-content-start">
                @forelse ($albums as $album)
                    <div class="col-md-4 mb-4">
                        <div class="my-3" data-aos="fade-up" data-aos-delay="600">
                            <div class="d-flex border-animation-left">
                                <div class="image-zoom-effect link-effect">
                                    <div class="image-holder">
                                        <a href="/album">
                                            <img src="{{ 'storage/' . $album->image }}" alt="foto" width="300" class="img-fluid">
                                        </a>
                                        <div class="product-content">
                                            <h5 class="text-uppercase fs-5 mt-3">
                                                {{ $album->nama_album }}
                                            </h5>
                                            <a href="/album" class="text-decoration-none">View Album</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-success">
                        Anda Belum Punya Album
                    </div>
                @endforelse
            </div>
        </div> --}}
        </div>
    </div>

    @include('layout.tambah')
    @include('layout.footer')
@endsection
