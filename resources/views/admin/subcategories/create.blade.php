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
                        <a href="{{ route('admin.subcategories.index') }}">Manage Sub Categories</a>
                    </li>

                    <li class="breadcrumb-item active">
                        Add Sub Category
                    </li>

                </ol>
            </div>

        </div>


        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Add New Sub Category</strong>
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


                    <form id="subCategoryForm" method="POST" action="{{ route('admin.subcategories.store') }}">

                        @csrf


                        <div class="form-group">

                            <label>
                                Category <span class="text-danger">*</span>
                            </label>

                            <select name="category_id" class="form-control" required>

                                <option value="">Select Category</option>

                                @foreach($categories as $cat)

                                    <option value="{{ $cat->id }}">
                                        {{ $cat->name }}
                                    </option>

                                @endforeach

                            </select>

                        </div>


                        <div class="form-group mt-3">

                            <label>
                                Sub Category Name <span class="text-danger">*</span>
                            </label>

                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter Sub Category" required>

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
                                Save Sub Category

                            </button>


                            <a href="{{ route('admin.subcategories.index') }}" class="btn btn-secondary">

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

    document.getElementById('name').addEventListener('keyup', function () {

        let slug = this.value
            .trim()
            .replace(/\s+/g, '-');

        document.getElementById('slug').value = slug;

    });


    document.getElementById('subCategoryForm').addEventListener('submit', function () {

        let btn = document.getElementById('saveBtn');

        btn.disabled = true;

        btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saving...';

    });

</script>