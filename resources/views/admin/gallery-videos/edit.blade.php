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
                        <a href="{{ route('admin.gallery-videos.index') }}">Video Gallery</a>
                    </li>

                    <li class="breadcrumb-item active">
                        Edit Video
                    </li>

                </ol>
            </div>

        </div>


        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Edit Video</strong>
                </div>

                <div class="card-body">

                    <form id="videoForm" method="POST"
                        action="{{ route('admin.gallery-videos.update', $video->id) }}">

                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control"
                                value="{{ $video->title }}">
                        </div>

                        <div class="form-group mt-3">
                            <label>YouTube URL *</label>
                            <input type="text" name="video" class="form-control"
                                value="{{ $video->video }}" required>
                        </div>

                        <div class="mt-4">
                            <button type="submit" id="saveBtn" class="btn btn-success">
                                <i class="fa-solid fa-save"></i> Update Video
                            </button>

                            <a href="{{ route('admin.gallery-videos.index') }}" class="btn btn-secondary">
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
document.getElementById('videoForm').addEventListener('submit', function () {
    let btn = document.getElementById('saveBtn');
    btn.disabled = true;
    btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Updating...';
});
</script>