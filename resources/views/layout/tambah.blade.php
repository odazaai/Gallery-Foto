<!-- Default dropup button -->
<div class="dropup-center dropup floating-button ">
    <a type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-plus-lg"></i>
    </a>
    <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#photoModal">
                Photo
            </a>
        </li>
    </ul>
</div>

<!-- Modal for Photo in anothe file-->
@include('content.modal-foto')
