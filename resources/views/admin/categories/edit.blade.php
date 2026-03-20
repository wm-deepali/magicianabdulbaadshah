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
<a href="{{ route('admin.categories.index') }}">Manage Categories</a>
</li>

<li class="breadcrumb-item active">
Edit Category
</li>

</ol>
</div>

</div>


<div class="content-wrapper pb-4">

<div class="card shadow-sm">

<div class="card-header">
<strong>Edit Category</strong>
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


<form id="categoryForm"
method="POST"
action="{{ route('admin.categories.update',$category->id) }}"
enctype="multipart/form-data">

@csrf
@method('PUT')


<div class="form-group">

<label>
Category Name <span class="text-danger">*</span>
</label>

<input
type="text"
name="name"
id="name"
class="form-control"
value="{{ $category->name }}"
required>

</div>


<div class="form-group mt-3">

<label>Slug</label>

<input
type="text"
name="slug"
id="slug"
class="form-control"
value="{{ $category->slug }}">

</div>


<div class="form-group mt-3">

<label>Category Image</label>

@if($category->image)
<div class="mb-2">
<img src="{{ asset('storage/'.$category->image) }}"
style="width:80px;height:80px;object-fit:cover;border-radius:6px;">
</div>
@endif

<input
type="file"
name="image"
class="form-control">

</div>


<div class="form-group mt-3">

<div class="custom-control custom-checkbox">

<input
type="checkbox"
name="is_popular"
id="popular"
class="custom-control-input"
{{ $category->is_popular ? 'checked' : '' }}>

<label class="custom-control-label" for="popular">
Popular Category
</label>

</div>

</div>


<div class="form-group mt-3">

<div class="custom-control custom-checkbox">

<input
type="checkbox"
name="show_header"
id="header"
class="custom-control-input"
{{ $category->show_header ? 'checked' : '' }}>

<label class="custom-control-label" for="header">
Show on Header
</label>

</div>


<div class="custom-control custom-checkbox mt-2">

<input
type="checkbox"
name="show_footer"
id="footer"
class="custom-control-input"
{{ $category->show_footer ? 'checked' : '' }}>

<label class="custom-control-label" for="footer">
Show on Footer
</label>

</div>


<div class="custom-control custom-checkbox mt-2">

<input
type="checkbox"
name="status"
id="status"
class="custom-control-input"
{{ $category->status ? 'checked' : '' }}>

<label class="custom-control-label" for="status">
Active
</label>

</div>

</div>


<div class="mt-4">

<button
type="submit"
id="saveBtn"
class="btn btn-success">

<i class="fa-solid fa-save"></i>
Update Category

</button>


<a
href="{{ route('admin.categories.index') }}"
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


document.getElementById('categoryForm').addEventListener('submit',function(){

let btn=document.getElementById('saveBtn');

btn.disabled=true;

btn.innerHTML='<i class="fa fa-spinner fa-spin"></i> Updating...';

});

</script>