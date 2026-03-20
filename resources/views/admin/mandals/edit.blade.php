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
Edit Mandal
</li>

</ol>
</div>

</div>


<div class="content-wrapper pb-4">

<div class="card shadow-sm">

<div class="card-header">
<strong>Edit Mandal</strong>
</div>

<div class="card-body">

<form id="mandalForm"
method="POST"
action="{{ route('admin.mandals.update',$mandal->id) }}">

@csrf
@method('PUT')


<div class="form-group">

<label>Mandal Name</label>

<input
type="text"
name="name"
id="name"
class="form-control"
value="{{ $mandal->name }}"
required>

</div>


<div class="form-group mt-3">

<label>Slug</label>

<input
type="text"
name="slug"
id="slug"
class="form-control"
value="{{ $mandal->slug }}"
readonly>

</div>


<div class="form-group mt-3">

<div class="custom-control custom-checkbox">

<input
type="checkbox"
name="status"
id="status"
class="custom-control-input"
{{ $mandal->status ? 'checked':'' }}>

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
Update Mandal

</button>

<a
href="{{ route('admin.mandals.index') }}"
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

document.getElementById('name').addEventListener('keyup',function(){

let slug=this.value
.trim()
.replace(/\s+/g,'-');

document.getElementById('slug').value=slug;

});


document.getElementById('mandalForm').addEventListener('submit',function(){

let btn=document.getElementById('saveBtn');

btn.disabled=true;

btn.innerHTML='<i class="fa fa-spinner fa-spin"></i> Updating...';

});

</script>