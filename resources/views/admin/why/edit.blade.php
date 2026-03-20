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
                        Why Page Settings
                    </li>
                </ol>
            </div>
        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Why Page Settings</strong>
                </div>

                <div class="card-body">

                    <!-- SETTINGS FORM -->
                    <form method="POST" action="{{ route('admin.why.update') }}">
                        @csrf

                        <!-- HERO -->
                        <h5 class="text-primary mb-3">Hero Section</h5>

                        <div class="form-group">
                            <label>Hero Title</label>
                            <input type="text" name="hero_title" class="form-control" value="{{ $data->hero_title }}">
                        </div>

                        <div class="form-group mt-3">
                            <label>Hero Subtitle</label>
                            <textarea name="hero_subtitle" class="form-control ckeditor" rows="4">
                                {{ $data->hero_subtitle }}
                            </textarea>
                        </div>

                        <hr>

                        <!-- SHOPKEEPER -->
                        <h5 class="text-primary mb-3">Shopkeeper Section</h5>

                        <div class="form-group">
                            <label>Title</label>
                            <textarea name="shopkeeper_title" class="form-control ckeditor">
                                {{ $data->shopkeeper_title }}
                            </textarea>
                        </div>

                        <div class="form-group mt-3">
                            <label>Description</label>
                            <textarea name="shopkeeper_description" class="form-control ckeditor">
                                {{ $data->shopkeeper_description }}
                            </textarea>
                        </div>

                        <hr>

                        <!-- CUSTOMER -->
                        <h5 class="text-primary mb-3">Customer Section</h5>

                        <div class="form-group">
                            <label>Title</label>
                            <textarea name="customer_title" class="form-control ckeditor">
                                {{ $data->customer_title }}
                            </textarea>
                        </div>

                        <div class="form-group mt-3">
                            <label>Description</label>
                            <textarea name="customer_description" class="form-control ckeditor">
                                {{ $data->customer_description }}
                            </textarea>
                        </div>

                        <hr>

                        <!-- CTA -->
                        <h5 class="text-primary mb-3">Call To Action</h5>

                        <div class="form-group">
                            <label>CTA Title</label>
                            <input type="text" name="cta_title" class="form-control" value="{{ $data->cta_title }}">
                        </div>

                        <div class="form-group mt-3">
                            <label>CTA Description</label>
                            <textarea name="cta_description" class="form-control" rows="3">
                                {{ $data->cta_description }}
                            </textarea>
                        </div>

                        <button class="btn btn-success mt-4">
                            <i class="fa fa-save"></i> Save Why Page
                        </button>
                    </form>

                    <!-- ===================== -->
                    <!-- BENEFITS SECTION 🔥 -->
                    <!-- ===================== -->

                    <hr class="mt-5">

                    <h5 class="text-primary mb-3">Manage Benefits</h5>

                    <!-- ADD FORM -->
                    <form method="POST" action="{{ route('admin.why.benefit.store') }}">
                        @csrf

                        <div class="row">

                            <div class="col-md-3">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Title" required>
                            </div>

                            <div class="col-md-3">
                                <label>Icon</label>
                                <input type="text" name="icon" class="form-control" placeholder="fa-solid fa-icon">
                            </div>

                            <div class="col-md-2">
                                <label>Type</label>
                                <select name="type" class="form-control">
                                    <option value="shopkeeper">Shopkeeper</option>
                                    <option value="customer">Customer</option>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label>Order</label>
                                <input type="number" name="sort_order" class="form-control" placeholder="Order">
                            </div>

                            <div class="col-md-2">
                                <button class="btn btn-primary">Add</button>
                            </div>

                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control mt-2 ckeditor"
                                placeholder="Description"></textarea>
                        </div>

                    </form>

                   <hr>

<div id="edit-section" style="display:none;">
    <h5 class="text-warning">Edit Benefit</h5>

    <form method="POST" action="{{ route('admin.why.benefit.update') }}">
        @csrf

        <input type="hidden" name="id" id="edit_id">

        <div class="row">

            <div class="col-md-3">
                <label>Title</label>
                <input type="text" name="title" id="edit_title" class="form-control">
            </div>

            <div class="col-md-3">
                <label>Icon</label>
                <input type="text" name="icon" id="edit_icon" class="form-control">
            </div>

            <div class="col-md-2">
                <label>Type</label>
                <select name="type" id="edit_type" class="form-control">
                    <option value="shopkeeper">Shopkeeper</option>
                    <option value="customer">Customer</option>
                </select>
            </div>

            <div class="col-md-2">
                <label>Order</label>
                <input type="number" name="sort_order" id="edit_order" class="form-control">
            </div>

            <div class="col-md-2">
                <button class="btn btn-success mt-4">Update</button>
            </div>

        </div>

        <div class="form-group mt-2">
            <label>Description</label>
            <textarea name="description" id="edit_description" class="form-control ckeditor"></textarea>
        </div>

    </form>
</div>

                    <!-- LIST -->
                    <table class="table mt-4">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Icon</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($benefits as $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ ucfirst($item->type) }}</td>
                                    <td><i class="{{ $item->icon }}"></i></td>
                                    <td>
                                        <button class="btn btn-warning btn-sm edit-btn" data-id="{{ $item->id }}"
                                            data-title="{{ $item->title }}" data-icon="{{ $item->icon }}"
                                            data-type="{{ $item->type }}" data-order="{{ $item->sort_order }}"
                                            data-description="{{ $item->description }}">
                                            Edit
                                        </button>

                                        <a href="{{ route('admin.why.benefit.delete', $item->id) }}"
                                            class="btn btn-danger btn-sm">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replaceAll('ckeditor');
</script>
<script>
    document.querySelectorAll('.edit-btn').forEach(btn => {
        btn.addEventListener('click', function () {

            // Show edit section
            document.getElementById('edit-section').style.display = 'block';

            // Fill data
            document.getElementById('edit_id').value = this.dataset.id;
            document.getElementById('edit_title').value = this.dataset.title;
            document.getElementById('edit_icon').value = this.dataset.icon;
            document.getElementById('edit_type').value = this.dataset.type;
            document.getElementById('edit_order').value = this.dataset.order;

            // CKEditor set data
            if (CKEDITOR.instances.edit_description) {
                CKEDITOR.instances.edit_description.setData(this.dataset.description);
            }

            // Scroll to edit form
            document.getElementById('edit-section').scrollIntoView({
                behavior: 'smooth'
            });

        });
    });
</script>