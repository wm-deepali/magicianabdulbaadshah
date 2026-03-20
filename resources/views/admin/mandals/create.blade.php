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
                        <a href="{{ route('admin.mandals.index') }}">Manage Mandals</a>
                    </li>

                    <li class="breadcrumb-item active">
                        Add Mandal
                    </li>

                </ol>
            </div>

        </div>


        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Add New Mandal</strong>
                </div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form id="mandalForm" method="POST" action="{{ route('admin.mandals.store') }}">

                        @csrf


                        <div class="form-group">

                            <label>
                                Mandal Name <span class="text-danger">*</span>
                            </label>

                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter Mandal Name" required>

                        </div>


                        <div class="form-group mt-3">

                            <label>Slug</label>

                            <input type="text" name="slug" id="slug" class="form-control" readonly>

                        </div>


                        <div class="form-group mt-3">

                            <div class="custom-control custom-checkbox">

                                <input type="checkbox" name="status" id="status" class="custom-control-input" checked>

                                <label class="custom-control-label" for="status">
                                    Active
                                </label>

                            </div>

                        </div>


                        <div class="mt-4">

                            <button type="submit" id="saveBtn" class="btn btn-success">

                                <i class="fa-solid fa-save"></i>
                                Save Mandal

                            </button>


                            <a href="{{ route('admin.mandals.index') }}" class="btn btn-secondary">

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

    // slug generator
    document.getElementById('name').addEventListener('keyup', function () {

        let slug = this.value
            .trim()
            .replace(/\s+/g, '-');

        document.getElementById('slug').value = slug;

    });


    // prevent multiple submit
    document.getElementById('mandalForm').addEventListener('submit', function () {

        let btn = document.getElementById('saveBtn');

        btn.disabled = true;

        btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saving...';

    });

</script>