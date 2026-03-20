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
<a href="{{ route('admin.listings.index') }}">Manage Listings</a>
</li>

<li class="breadcrumb-item active">
Edit Listing
</li>

</ol>
</div>

</div>


<div class="content-wrapper pb-4">

<div class="card shadow-sm">

<div class="card-header">
<strong>Edit Listing</strong>
</div>

<div class="card-body">

<form id="listingForm"
method="POST"
action="{{ route('admin.listings.update',$listing->id) }}"
enctype="multipart/form-data">

@csrf
@method('PUT')


<div class="form-group">
<label>Location *</label>

<select name="location_id" class="form-control" required>

<option value="">Select Location</option>

@foreach($locations as $loc)

<option value="{{ $loc->id }}"
{{ $listing->location_id == $loc->id ? 'selected':'' }}>

{{ $loc->location }}

</option>

@endforeach

</select>
</div>



<div class="form-group mt-3">

<label>Category *</label>

<select name="category_id"
id="category"
class="form-control"
required>

<option value="">Select Category</option>

@foreach($categories as $cat)

<option value="{{ $cat->id }}"
{{ $listing->category_id == $cat->id ? 'selected':'' }}>

{{ $cat->name }}

</option>

@endforeach

</select>

</div>



<div class="form-group mt-3">

<label>Sub Category</label>

<select name="sub_category_id"
id="sub_category"
class="form-control">

<option value="">Select Sub Category</option>

@foreach($subcategories as $sub)

<option value="{{ $sub->id }}"
{{ $listing->sub_category_id == $sub->id ? 'selected':'' }}>

{{ $sub->name }}

</option>

@endforeach

</select>

</div>



<div class="form-group mt-3">

<label>Business Name *</label>

<input
type="text"
name="business_name"
class="form-control"
value="{{ $listing->business_name }}"
required>

</div>



<div class="form-group mt-3">

<label>Full Address</label>

<textarea
name="address"
class="form-control">{{ $listing->address }}</textarea>

</div>



<div class="form-group mt-3">

<label>Mobile *</label>

<input
type="text"
name="mobile"
class="form-control"
value="{{ $listing->mobile }}"
required>

</div>



<div class="form-group mt-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
value="{{ $listing->email }}">

</div>



<div class="form-group mt-3">

<label>WhatsApp</label>

<input
type="text"
name="whatsapp"
class="form-control"
value="{{ $listing->whatsapp }}">

</div>



<div class="form-group mt-3">

<label>Short Description</label>

<textarea
name="short_description"
class="form-control">{{ $listing->short_description }}</textarea>

</div>



<div class="form-group mt-3">

<label>Services</label>

<textarea
name="services"
class="form-control">{{ $listing->services }}</textarea>

</div>



<div class="form-group mt-3">

<label>Working Hours</label>

<input
type="text"
name="working_hours"
class="form-control"
value="{{ $listing->working_hours }}">

</div>



<div class="form-group mt-3">

<label>Closed Days</label>

<div class="row">

@php
$days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
$closed = $listing->closed_days ?? [];
@endphp

@foreach($days as $day)

<div class="col-md-3">

<input
type="checkbox"
name="closed_days[]"
value="{{ $day }}"
{{ in_array($day,$closed) ? 'checked':'' }}>

{{ $day }}

</div>

@endforeach

</div>

</div>



<div class="form-group mt-3">

<label>Website</label>

<input
type="url"
name="website"
class="form-control"
value="{{ $listing->website }}">

</div>


<div class="form-group mt-3">

<label>Business Image</label>

@if($listing->image)
<div class="mb-2">
    <img src="{{ asset('storage/'.$listing->image) }}"
         width="120"
         style="border-radius:6px;">
</div>
@endif

<input type="file"
name="image"
class="form-control"
accept="image/*">

<small class="text-muted">
Upload new image to replace existing one
</small>

</div>

<div class="form-group mt-3">

    <label>Business Logo</label>

    @if($listing->logo)
        <div class="mb-2">
            <img src="{{ asset('storage/'.$listing->logo) }}"
                 width="100"
                 style="border-radius:6px;object-fit:contain;background:#fff;padding:5px;">
        </div>
    @endif

    <input type="file"
           name="logo"
           class="form-control"
           accept="image/*">

    <small class="text-muted">
        Upload new logo to replace existing one
    </small>

</div>

<div class="form-group mt-3">

<div class="custom-control custom-checkbox">

<input
type="checkbox"
name="status"
id="status"
class="custom-control-input"
{{ $listing->status ? 'checked':'' }}>

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
Update Listing

</button>

<a
href="{{ route('admin.listings.index') }}"
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

$('#category').change(function(){

let id = $(this).val();

$.get('/admin/get-subcategories/'+id,function(data){

$('#sub_category').html(data);

});

});


document.getElementById('listingForm').addEventListener('submit',function(){

let btn = document.getElementById('saveBtn');

btn.disabled = true;

btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Updating...';

});

</script>