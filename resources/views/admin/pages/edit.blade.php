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
                        <a href="{{ route('admin.pages.index') }}">Manage Pages</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Edit Page
                    </li>
                </ol>
            </div>
        </div>

        <div class="content-wrapper pb-4">
            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Edit Page</strong>
                </div>

                <div class="card-body">

                    <form id="pageForm" method="POST" action="{{ route('admin.pages.update', $page->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Menu Name -->
                        <div class="form-group">
                            <label>Menu Name *</label>
                            <input type="text" name="menu_name" id="title"
                                value="{{ old('menu_name', $page->menu_name) }}"
                                class="form-control" required>
                        </div>

                        <!-- Slug -->
                        <div class="form-group mt-3">
                            <label>Slug</label>
                            <input type="text" name="slug" id="slug"
                                value="{{ old('slug', $page->slug) }}"
                                class="form-control">
                        </div>

                        <!-- Meta Title -->
                        <div class="form-group mt-3">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title"
                                value="{{ old('meta_title', $page->meta_title) }}"
                                class="form-control">
                        </div>

                        <!-- Meta Description -->
                        <div class="form-group mt-3">
                            <label>Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', $page->meta_description) }}</textarea>
                        </div>

                        <!-- Content -->
                        <div class="form-group mt-3">
                            <label>Content *</label>
                            <textarea name="content" class="form-control ckeditor" rows="8" required>{{ old('content', $page->content) }}</textarea>
                        </div>

                        <!-- Status -->
                        <div class="form-group mt-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="status" id="status"
                                    class="custom-control-input"
                                    {{ $page->status ? 'checked' : '' }}>
                                <label class="custom-control-label" for="status">
                                    Active
                                </label>
                            </div>
                        </div>

                        <!-- Show in Menu -->
                        <div class="form-group mt-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="show_in_menu" id="show_in_menu"
                                    class="custom-control-input"
                                    {{ $page->show_in_menu ? 'checked' : '' }}>
                                <label class="custom-control-label" for="show_in_menu">
                                    Show in Menu
                                </label>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="mt-4">
                            <button type="submit" id="saveBtn" class="btn btn-primary">
                                <i class="fa-solid fa-save"></i> Update Page
                            </button>

                            <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">
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

<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replaceAll('ckeditor');

    // Auto slug (only if user edits title)
  document.getElementById('title').addEventListener('keyup', function () {
    let slug = this.value
        .toLowerCase()
        .trim()
        .replace(/\s+/g, '-')          // spaces → dash
        .replace(/[^\p{L}\p{N}-]+/gu, ''); // allow Hindi + English

    document.getElementById('slug').value = slug;
});

    // Loading button
    document.getElementById('pageForm').addEventListener('submit', function () {
        let btn = document.getElementById('saveBtn');
        btn.disabled = true;
        btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Updating...';
    });
</script>