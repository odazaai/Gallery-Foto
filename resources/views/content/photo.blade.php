@extends('layout.app')

@section('content')
    @include('layout.navbar')

    <div class="container">
        <div class="row justify-content-center">
            <h3 class="section-title text-center mt-5" data-aos="fade-up">Welcome {{ Auth::user()->nama }}
                <br>
                To Collections
            </h3>
            <div class="col-md-6 text-center" data-aos="fade-up" data-aos-delay="300">

                <form method="GET" role="search">
                    <div class="mb-3 d-flex">
                        <input type="search" class="form-control me-2" name="search" id="search"
                            placeholder="Search..." aria-label ="search" autocomplete="off">
                        <button type="submit" class="btn btn-primary" style="border-radius: 10%">Search</button>
                    </div>
                </form>

            </div>
        </div>
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
                                        <a href="{{ route('foto.like', $foto->id) }}" class="btn-link fs-3 item-anchor">
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

    @include('layout.footer')

    @include('layout.tambah')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).on('click', '.like-btn', function() {
            var foto_id = $(this).data('foto_id');
            var button = $(this);

            $.ajax({
                url: '/foto/' + foto_id + '/like',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.liked) {
                        button.find('.like-text').text('Unlike');
                    } else {
                        button.find('.like-text').text('Like');
                    }
                    button.siblings('.like-count').text(response.like_count + ' likes');
                }
            });
        });
    </script>
@endsection
