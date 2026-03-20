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
                        Manage Introduction
                    </li>

                </ol>
            </div>
        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Manage Homepage Introduction</strong>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('admin.home-intro.update') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- TITLE -->
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control"
                                value="{{ $intro->title ?? '' }}" required>
                        </div>

                        <!-- DESCRIPTION -->
                        <div class="form-group mt-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control ckeditor"
                                rows="5">{{ $intro->description ?? '' }}</textarea>
                        </div>

                        <hr>

                        <!-- STATS -->
                        <h5 class="mb-3 text-primary">Stats Section</h5>

                        <div class="row">

                            <div class="col-md-4">
                                <label>Stat 1</label>
                                <input type="text" name="stat_1" class="form-control"
                                    value="{{ $intro->stat_1 ?? '' }}">

                                <input type="text" name="stat_1_label" class="form-control mt-2"
                                    placeholder="Label"
                                    value="{{ $intro->stat_1_label ?? '' }}">
                            </div>

                            <div class="col-md-4">
                                <label>Stat 2</label>
                                <input type="text" name="stat_2" class="form-control"
                                    value="{{ $intro->stat_2 ?? '' }}">

                                <input type="text" name="stat_2_label" class="form-control mt-2"
                                    placeholder="Label"
                                    value="{{ $intro->stat_2_label ?? '' }}">
                            </div>

                            <div class="col-md-4">
                                <label>Stat 3</label>
                                <input type="text" name="stat_3" class="form-control"
                                    value="{{ $intro->stat_3 ?? '' }}">

                                <input type="text" name="stat_3_label" class="form-control mt-2"
                                    placeholder="Label"
                                    value="{{ $intro->stat_3_label ?? '' }}">
                            </div>

                        </div>

                        <hr>

                        <!-- IMAGE -->
                        <div class="form-group mt-3">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">

                            @if(!empty($intro->image))
                                <img src="{{ asset('storage/' . $intro->image) }}" width="120" class="mt-2">
                            @endif
                        </div>

                        <!-- SUBMIT -->
                        <div class="mt-4">
                            <button class="btn btn-success">
                                <i class="fa fa-save"></i> Save Introduction
                            </button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')

<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replaceAll('ckeditor');
</script>