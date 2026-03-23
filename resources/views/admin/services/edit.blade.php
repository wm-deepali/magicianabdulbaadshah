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
                <li class="breadcrumb-item active">Edit Service</li>
            </ol>
        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">
                <div class="card-header">
                    <strong>Edit Service</strong>
                </div>

                <div class="card-body">

                    <form id="serviceForm" method="POST" action="{{ route('admin.services.update', $service->id) }}"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="form-group">
                            <label>Title *</label>
                            <input type="text" name="title" class="form-control" value="{{ $service->title }}" required>
                        </div>

                        <!-- Description -->
                        <div class="form-group mt-3">
                            <label>Description *</label>
                            <textarea name="description" rows="4" class="form-control"
                                required>{{ $service->description }}</textarea>
                        </div>

                        <!-- Icon -->
                        <div class="form-group mt-3">
                            <label>Icon Class *</label>
                            <input type="text" name="icon" class="form-control" value="{{ $service->icon }}" required>

                            <small class="text-muted">
                                Example: fa-solid fa-birthday-cake
                            </small>
                        </div>

                        <!-- Current Image -->
                        @if(!empty($service->image))
                            <div class="form-group mt-3">
                                <label>Current Image</label><br>
                                <img src="{{ asset('storage/' . $service->image) }}" width="120" style="border-radius:8px;">
                            </div>
                        @endif

                        <!-- Upload New Image -->
                        <div class="form-group mt-3">
                            <label>Change Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>

                        <!-- Preview -->
                        <img id="preview" style="width:120px; margin-top:10px; display:none; border-radius:8px;">

                        <!-- Features -->
                        <div class="form-group mt-3">
                            <label>Features</label>
                            <input type="text" name="features" class="form-control"
                                value="{{ implode(',', $service->features ?? []) }}"
                                placeholder="e.g. Mickey Mouse, Doraemon, Jungle Theme">

                            <small class="text-muted">
                                Enter features separated by commas
                            </small>
                        </div>

                        <!-- Submit -->
                        <div class="mt-4">
                            <button type="submit" id="saveBtn" class="btn btn-success">
                                <i class="fa fa-save"></i> Update Service
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
        btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Updating...';
    });
</script>