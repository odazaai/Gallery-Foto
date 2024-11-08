<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="photoModalLabel">Edit Photo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- <img src="{{ asset('storage/'. $foto->image) }}" class="img-fluid" alt=""> --}}
                <form action="{{ url('foto/' . $foto->id . '/update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Photo</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                            value="{{ old($foto->image) }}" onchange="previewImage()" readonly>
                        <!-- error message untuk image -->
                        @error('image')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Photo Title</label>
                        <input type="text" class="form-control @error('judul_foto') is-invalid @enderror"
                            name="judul_foto" value="{{ $foto->judul_foto }}" placeholder="Edit Title..">
                        <!-- error message untuk title -->
                        @error('judul_foto')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Description</label>
                        <textarea class="form-control @error('deskripsi_foto') is-invalid @enderror" name="deskripsi_foto" rows="5"
                            placeholder="Edit Description..">{{ $foto->deskripsi_foto }}</textarea>
                        <!-- error message untuk description -->
                        @error('deskripsi_foto')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="reset" class="btn btn-md btn-warning">Cancel</button>
                    <button type="submit" class="btn btn-md btn-primary me-3">Update</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(OFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
