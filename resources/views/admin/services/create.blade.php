@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        <div class="breadcrumbs-top bg-light mb-3">
            <ol class="breadcrumb bg-transparent mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.services.index') }}">Services</a>
                </li>
                <li class="breadcrumb-item active">Add Service</li>
            </ol>
        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">
                <div class="card-header">
                    <strong>Add Service</strong>
                </div>

                <div class="card-body">

                    <form id="serviceForm" method="POST" action="{{ route('admin.services.store') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <!-- Title -->
                        <div class="form-group">
                            <label>Title *</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <!-- Description -->
                        <div class="form-group mt-3">
                            <label>Description *</label>
                            <textarea name="description" rows="4" class="form-control" required></textarea>
                        </div>

                        <!-- Icon -->
                        <div class="form-group mt-3">
                            <label>Icon Class *</label>
                            <input type="text" name="icon" class="form-control" placeholder="fa-solid fa-birthday-cake"
                                required>

                            <small class="text-muted">
                                Example: fa-solid fa-birthday-cake
                            </small>
                        </div>

                        <!-- Image Upload -->
                        <div class="form-group mt-3">
                            <label>Service Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>

                        <!-- Features -->
                        <div class="form-group mt-3">
                            <label>Features</label>
                            <input type="text" name="features" class="form-control"
                                placeholder="e.g. Mickey Mouse, Doraemon, Jungle Theme">

                            <small class="text-muted">
                                Enter features separated by commas
                            </small>
                        </div>

                        <!-- Submit -->
                        <div class="mt-4">
                            <button type="submit" id="saveBtn" class="btn btn-success">
                                <i class="fa fa-save"></i> Save Service
                            </button>

                            <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
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
    document.getElementById('serviceForm').addEventListener('submit', function () {
        let btn = document.getElementById('saveBtn');
        btn.disabled = true;
        btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saving...';
    });
</script>