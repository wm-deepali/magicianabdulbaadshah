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
                    <a href="{{ route('admin.locations.index') }}">Manage Locations</a>
                </li>

                <li class="breadcrumb-item active">
                    Add Location
                </li>
            </ol>
        </div>

    </div>


    <div class="content-wrapper pb-4">

        <div class="card shadow-sm">

            <div class="card-header">
                <strong>Add New Location</strong>
            </div>

            <div class="card-body">

                {{-- Validation Errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form id="locationForm"
                      method="POST"
                      action="{{ route('admin.locations.store') }}">

                    @csrf


                    <div class="form-group">

                        <label>
                            Location Name <span class="text-danger">*</span>
                        </label>

                        <input
                            type="text"
                            name="location"
                            class="form-control"
                            placeholder="Enter Location"
                            value="{{ old('location') }}"
                            required>

                    </div>


                    <div class="form-group mt-3">

                        <div class="custom-control custom-checkbox">

                            <input
                                type="checkbox"
                                name="is_popular"
                                id="popular"
                                class="custom-control-input">

                            <label class="custom-control-label" for="popular">
                                Show as Popular
                            </label>

                        </div>


                        <div class="custom-control custom-checkbox mt-2">

                            <input
                                type="checkbox"
                                name="is_default"
                                id="default"
                                class="custom-control-input">

                            <label class="custom-control-label" for="default">
                                Set as Default Location
                            </label>

                        </div>

                    </div>


                    <div class="mt-4">

                        <button
                            type="submit"
                            id="saveBtn"
                            class="btn btn-success">

                            <i class="fa-solid fa-save"></i>
                            Save Location

                        </button>


                        <a
                            href="{{ route('admin.locations.index') }}"
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

document.getElementById('locationForm').addEventListener('submit', function(){

    let btn = document.getElementById('saveBtn');

    btn.disabled = true;

    btn.innerHTML =
        '<i class="fa fa-spinner fa-spin"></i> Saving...';

});

</script>