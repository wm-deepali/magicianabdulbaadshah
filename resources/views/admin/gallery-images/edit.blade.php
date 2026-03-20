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
                        Edit Image
                    </li>

                </ol>
            </div>

        </div>


        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Edit Image</strong>
                </div>

                <div class="card-body">

                    <form id="imageForm" method="POST"
                        action="{{ route('admin.gallery-images.update', $image->id) }}"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control"
                                value="{{ $image->title }}">
                        </div>

                        <div class="form-group mt-3">
                            <label>Current Image</label><br>
                            <img src="{{ asset('storage/' . $image->image) }}"
                                width="120" style="border-radius:6px;">
                        </div>

                        <div class="form-group mt-3">
                            <label>Change Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="mt-4">
                            <button type="submit" id="saveBtn" class="btn btn-success">
                                <i class="fa-solid fa-save"></i> Update Image
                            </button>

                            <a href="{{ route('admin.gallery-images.index') }}" class="btn btn-secondary">
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
document.getElementById('imageForm').addEventListener('submit', function () {
    let btn = document.getElementById('saveBtn');
    btn.disabled = true;
    btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Updating...';
});
</script>