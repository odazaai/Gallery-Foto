<div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="photoModalLabel">Add New Photo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="image" class="form-label">Choose Photo:</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                            required>
                    </div>
                    <!-- error message untuk image -->
                    @error('image')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="judul_foto" class="form-label">Photo Title:</label>
                        <input type="text" class="form-control @error('judul_foto') is-invalid @enderror"
                            name="judul_foto" placeholder="Add Title" required>
                    </div>
                    <!-- error message untuk judul -->
                    @error('judul_foto')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="deskripsi_foto" class="form-label">Description Photo:</label>
                        <textarea class="form-control @error('deskripsi_foto') is-invalid @enderror" name="deskripsi_foto" rows="3"
                            placeholder="Add Description" required></textarea>
                    </div>
                    <!-- error message untuk deskripsi -->
                    @error('deskripsi_foto')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror

            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
