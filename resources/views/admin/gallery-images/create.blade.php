@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">

            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb bg-transparent mb-0">

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.gallery-images.index') }}">Image Gallery</a>
                    </li>

                    <li class="breadcrumb-item active">
                        Add Image
                    </li>

                </ol>
            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Add Images</strong>
                </div>

                <div class="card-body">

                    <form id="imageForm" method="POST"
                        action="{{ route('admin.gallery-images.store') }}"
                        enctype="multipart/form-data">

                        @csrf

                        <div id="image-wrapper">

                            {{-- FIRST ROW --}}
                            <div class="image-row border rounded p-3 mb-3">

                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="titles[]" class="form-control">
                                </div>

                                <div class="form-group mt-3">
                                    <label>Image *</label>
                                    <input type="file" name="images[]" class="form-control" required>
                                </div>

                                <div class="text-end mt-3">
                                    <button type="button"
                                        class="btn btn-danger remove-row d-none">
                                        <i class="fa fa-trash"></i> Remove
                                    </button>
                                </div>

                            </div>

                        </div>

                        <div class="mb-3">
                            <button type="button" id="addMoreBtn" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Add More
                            </button>
                        </div>

                        <div class="mt-4">
                            <button type="submit" id="saveBtn" class="btn btn-success">
                                <i class="fa-solid fa-save"></i> Save Images
                            </button>

                            <a href="{{ route('admin.gallery-images.index') }}"
                                class="btn btn-secondary">
                                Cancel
                            </a>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')

<script>
    // ADD MORE
    document.getElementById('addMoreBtn').addEventListener('click', function() {

        let wrapper = document.getElementById('image-wrapper');

        let newRow = document.createElement('div');
        newRow.classList.add('image-row', 'border', 'rounded', 'p-3', 'mb-3');

        newRow.innerHTML = `
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="titles[]" class="form-control">
            </div>

            <div class="form-group mt-3">
                <label>Image *</label>
                <input type="file" name="images[]" class="form-control" required>
            </div>

            <div class="text-end mt-3">
                <button type="button" class="btn btn-danger remove-row">
                    <i class="fa fa-trash"></i> Remove
                </button>
            </div>
        `;

        wrapper.appendChild(newRow);
    });

    // REMOVE ROW
    document.addEventListener('click', function(e) {

        if (e.target.closest('.remove-row')) {
            e.target.closest('.image-row').remove();
        }

    });

    // SUBMIT BUTTON LOADER
    document.getElementById('imageForm').addEventListener('submit', function() {

        let btn = document.getElementById('saveBtn');

        btn.disabled = true;
        btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saving...';

    });
</script>