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
                        <a href="{{ route('admin.packages.index') }}">Packages</a>
                    </li>

                    <li class="breadcrumb-item active">
                        Edit Package
                    </li>

                </ol>
            </div>

        </div>


        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Edit Package</strong>
                </div>

                <div class="card-body">

                    <form id="packageForm" method="POST"
                        action="{{ route('admin.packages.update', $package->id) }}">

                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Package Title *</label>
                            <input type="text" name="title" class="form-control"
                                value="{{ $package->title }}" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>Price *</label>
                            <input type="text" name="price" class="form-control"
                                value="{{ $package->price }}" required>
                        </div>

                        <!-- Features -->
                        <div class="form-group mt-3">
                            <label>Features *</label>

                            <div id="featuresWrapper">

                                @foreach($package->features as $feature)
                                    <div class="d-flex mb-2">
                                        <input type="text" name="features[]" value="{{ $feature }}"
                                            class="form-control" required>
                                        <button type="button" class="btn btn-danger ms-2 removeFeature">X</button>
                                    </div>
                                @endforeach

                            </div>

                            <button type="button" class="btn btn-sm btn-info mt-2" onclick="addFeature()">
                                + Add Feature
                            </button>
                        </div>

                        <!-- Popular -->
                        <div class="form-group mt-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="is_popular" id="is_popular"
                                    class="custom-control-input"
                                    {{ $package->is_popular ? 'checked' : '' }}>

                                <label class="custom-control-label" for="is_popular">
                                    Mark as Popular Package
                                </label>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label>Button Text</label>
                            <input type="text" name="button_text" class="form-control"
                                value="{{ $package->button_text }}">
                        </div>

                        <div class="mt-4">
                            <button type="submit" id="saveBtn" class="btn btn-success">
                                <i class="fa-solid fa-save"></i> Update Package
                            </button>

                            <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary">
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
function addFeature() {
    let html = `
        <div class="d-flex mb-2">
            <input type="text" name="features[]" class="form-control" placeholder="Enter feature" required>
            <button type="button" class="btn btn-danger ms-2 removeFeature">X</button>
        </div>
    `;
    document.getElementById('featuresWrapper').insertAdjacentHTML('beforeend', html);
}

// remove feature
document.addEventListener('click', function(e){
    if(e.target.classList.contains('removeFeature')){
        e.target.parentElement.remove();
    }
});

// loading button
document.getElementById('packageForm').addEventListener('submit', function () {
    let btn = document.getElementById('saveBtn');
    btn.disabled = true;
    btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Updating...';
});
</script>