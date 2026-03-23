@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        <!-- Breadcrumb -->
        <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb bg-transparent mb-0">

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.hero.index') }}">Hero Slider</a>
                    </li>

                    <li class="breadcrumb-item active">
                        Add Slide
                    </li>

                </ol>
            </div>
        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Add Hero Slide</strong>
                </div>

                <div class="card-body">

                    <form id="heroForm" method="POST"
                        action="{{ route('admin.hero.store') }}"
                        enctype="multipart/form-data">

                        @csrf

                        <!-- Title -->
                        <div class="form-group">
                            <label>Title (HTML Allowed) *</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <!-- Subtitle -->
                        <div class="form-group mt-3">
                            <label>Subtitle</label>
                            <textarea name="subtitle" class="form-control" rows="3"></textarea>
                        </div>

                        <!-- Image -->
                        <div class="form-group mt-3">
                            <label>Image *</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>

                        <!-- Button -->
                        <div class="form-group mt-3">
                            <label>Button Text</label>
                            <input type="text" name="button_text" class="form-control">
                        </div>

                        <div class="form-group mt-3">
                            <label>Button Link</label>
                            <input type="text" name="button_link" class="form-control"
                                placeholder="#contact / #services">
                        </div>

                        <!-- Submit -->
                        <div class="mt-4">
                            <button type="submit" id="saveBtn" class="btn btn-success">
                                <i class="fa-solid fa-save"></i> Save Slide
                            </button>

                            <a href="{{ route('admin.hero.index') }}" class="btn btn-secondary">
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
document.getElementById('heroForm').addEventListener('submit', function () {
    let btn = document.getElementById('saveBtn');
    btn.disabled = true;
    btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saving...';
});
</script>