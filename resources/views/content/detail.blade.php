@extends('layout.app')

@section('content')
    @include('layout.navbar')

    <div class="container">
        <div class="row justify-content-center">
            <h3 class="section-title text-center mt-5" data-aos="fade-up">PHOTO</h3>
        </div>
        <div class="row mb-5">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ asset('storage/' . $foto->image) }}" class="rounded" style="width: 100%">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h3 class="text-uppercase">{{ $foto->judul_foto }}</h3>
                            <!-- Dropdown -->
                            @if (Auth::check() && Auth::user()->id === $foto->user_id)
                                <div class="dropdown">
                                    <button class="btn btn-link text-dark p-0" type="button" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="{{ url('foto/' . $foto->id . '/edit') }}"
                                                data-bs-toggle="modal" data-bs-target="#editModal">Edit</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{ url('foto/' . $foto->id . '/delete') }}">Delete</a></li>
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <h6>{{ $foto->deskripsi_foto }}</h6>
                        <small class="text-muted">
                            Posted by {{ $foto->user ? $foto->user->nama : 'Unknown' }}
                        </small>
                        <br>
                        <small class="text-muted">
                            Uploaded on: {{ date('F j, Y', strtotime($foto->created_at)) }}
                        </small>
                        <hr />
                        @foreach ($foto->komen as $komen)
                            <div class="comment d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <strong>{{ $komen->user->nama }}</strong> {{ $komen->isi_komen }}
                                    <br>
                                    <p>{{ $komen->created_at->diffForHumans() }}</p>
                                </div>
                                @if (Auth::check() && (Auth::user()->id === $komen->user_id || Auth::user()->id === $foto->user_id))
                                    <form action="{{ route('komentar.destroy', $komen->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link btn-sm p-0" title="Delete Comment">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        @endforeach
                        <form action="{{ route('foto.komen', $foto->id) }}" method="POST">
                            @csrf
                            <div class="mb-3 d-flex">
                                <input type="text" class="form-control me-2 @error('isi_komen') is-invalid @enderror"
                                    name="isi_komen" placeholder="Add a comment...">
                                <button type="submit" class="btn btn-primary" style="border-radius: 10%">Post</button>
                            </div>
                        </form>
                        @include('content.modal-edit')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
