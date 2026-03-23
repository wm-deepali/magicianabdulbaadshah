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

                    <li class="breadcrumb-item active">
                        Manage About
                    </li>

                </ol>
            </div>

        </div>


        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Manage About Section</strong>
                </div>

                <div class="card-body">

                    <form id="aboutForm" method="POST"
                        action="{{ route('admin.about.update') }}"
                        enctype="multipart/form-data">

                        @csrf

                        <!-- Title -->
                        <div class="form-group">
                            <label>Title *</label>
                            <input type="text" name="title" class="form-control"
                                value="{{ $about->title ?? '' }}" required>
                        </div>

                        <!-- Description -->
                        <div class="form-group mt-3">
                            <label>Description *</label>
                            <textarea name="description" rows="5"
                                class="form-control" required>{{ $about->description ?? '' }}</textarea>
                        </div>

                        <!-- Image -->
                        <div class="form-group mt-3">
                            <label>Image</label>

                            @if(!empty($about->image))
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $about->image) }}"
                                        width="150" style="border-radius:8px;">
                                </div>
                            @endif

                            <input type="file" name="image" class="form-control">
                        </div>

                        <!-- Counters -->
                        <div class="form-group mt-3">
                            <label>Years Experience</label>
                            <input type="text" name="experience_years" class="form-control"
                                value="{{ $about->experience_years ?? '' }}" placeholder="e.g. 15+">
                        </div>

                        <div class="form-group mt-3">
                            <label>Happy Clients</label>
                            <input type="text" name="clients" class="form-control"
                                value="{{ $about->clients ?? '' }}" placeholder="e.g. 850+">
                        </div>

                        <div class="form-group mt-3">
                            <label>Events Completed</label>
                            <input type="text" name="events" class="form-control"
                                value="{{ $about->events ?? '' }}" placeholder="e.g. 1200+">
                        </div>

                        <!-- Button -->
                        <div class="form-group mt-3">
                            <label>Button Text</label>
                            <input type="text" name="button_text" class="form-control"
                                value="{{ $about->button_text ?? '' }}"
                                placeholder="e.g. Let's Plan Your Party">
                        </div>

                        <!-- Submit -->
                        <div class="mt-4">

                            <button type="submit" id="saveBtn" class="btn btn-success">
                                <i class="fa-solid fa-save"></i> Save Changes
                            </button>

                            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
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
document.getElementById('aboutForm').addEventListener('submit', function () {
    let btn = document.getElementById('saveBtn');
    btn.disabled = true;
    btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saving...';
});
</script>