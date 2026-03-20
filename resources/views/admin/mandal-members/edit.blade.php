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
<a href="{{ route('admin.mandal-members.index') }}">Manage Mandal Members</a>
</li>

<li class="breadcrumb-item active">
Edit Member
</li>

</ol>
</div>

</div>

<div class="content-wrapper pb-4">

<div class="card shadow-sm">

<div class="card-header">
<strong>Edit Mandal Member</strong>
</div>

<div class="card-body">

<form id="memberForm"
method="POST"
action="{{ route('admin.mandal-members.update',$member->id) }}"
enctype="multipart/form-data">

@csrf
@method('PUT')


<div class="form-group">

<label>Mandal *</label>

<select name="mandal_id" class="form-control">

@foreach($mandals as $mandal)

<option value="{{ $mandal->id }}"
{{ $member->mandal_id == $mandal->id ? 'selected':'' }}>

{{ $mandal->name }}

</option>

@endforeach

</select>

</div>


<div class="form-group mt-3">

<label>Member Photo</label>

@if($member->photo)
<div class="mb-2">
<img src="{{ asset('storage/'.$member->photo) }}"
style="width:70px;height:70px;border-radius:50%;object-fit:cover;">
</div>
@endif

<input type="file" name="photo" class="form-control">

</div>


<div class="form-group mt-3">

<label>Member Name *</label>

<input
type="text"
name="name"
class="form-control"
value="{{ $member->name }}"
required>

</div>


<div class="form-group mt-3">

<label>Designation</label>

<input
type="text"
name="designation"
class="form-control"
value="{{ $member->designation }}">

</div>


<div class="form-group mt-3">

<label>Location</label>

<input
type="text"
name="location"
class="form-control"
value="{{ $member->location }}">

</div>


<div class="form-group mt-3">

<label>Member Since</label>

<input
type="text"
name="since"
class="form-control"
value="{{ $member->since }}"
placeholder="e.g. Jan 2023">

</div>


<div class="form-group mt-3">

<label>Mobile *</label>

<input
type="text"
name="mobile"
class="form-control"
value="{{ $member->mobile }}"
required>

</div>


<div class="form-group mt-3">

<label>WhatsApp</label>

<input
type="text"
name="whatsapp"
class="form-control"
value="{{ $member->whatsapp }}">

</div>


<div class="form-group mt-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
value="{{ $member->email }}">

</div>

<div class="form-group mt-3">

<label>Relation With Bayepur</label>

<select name="relation" class="form-control">

<option value="">Select</option>

<option value="native" {{ $member->relation == 'native' ? 'selected':'' }}>
मैं बयेपुर का मूल निवासी हूँ
</option>

<option value="resident" {{ $member->relation == 'resident' ? 'selected':'' }}>
मैं अभी बयेपुर में रहता हूँ
</option>

<option value="nri" {{ $member->relation == 'nri' ? 'selected':'' }}>
मैं बाहर रहता हूँ
</option>

<option value="wellwisher" {{ $member->relation == 'wellwisher' ? 'selected':'' }}>
मैं शुभचिंतक हूँ
</option>

</select>

</div>

@php
$contributions = $member->contribution ? explode(',', $member->contribution) : [];
@endphp

<div class="form-group mt-3">

<label>Contribution</label>

<div class="row">

<div class="col-md-6 mb-2">
<label class="d-flex align-items-center gap-2 border rounded p-2">
<input type="checkbox" name="contribution[]" value="mandal"
{{ in_array('mandal',$contributions) ? 'checked':'' }}>
<span>मंडल में शामिल होना</span>
</label>
</div>

<div class="col-md-6 mb-2">
<label class="d-flex align-items-center gap-2 border rounded p-2">
<input type="checkbox" name="contribution[]" value="digital_help"
{{ in_array('digital_help',$contributions) ? 'checked':'' }}>
<span>दुकानदारों की डिजिटल मदद</span>
</label>
</div>

<div class="col-md-6 mb-2">
<label class="d-flex align-items-center gap-2 border rounded p-2">
<input type="checkbox" name="contribution[]" value="problem_solving"
{{ in_array('problem_solving',$contributions) ? 'checked':'' }}>
<span>गाँव की समस्याओं का समाधान</span>
</label>
</div>

<div class="col-md-6 mb-2">
<label class="d-flex align-items-center gap-2 border rounded p-2">
<input type="checkbox" name="contribution[]" value="volunteer"
{{ in_array('volunteer',$contributions) ? 'checked':'' }}>
<span>वॉलंटियर / सोशल वर्क</span>
</label>
</div>

<div class="col-md-12">
<label class="d-flex align-items-center gap-2 border rounded p-2">
<input type="checkbox" name="contribution[]" value="other"
{{ in_array('other',$contributions) ? 'checked':'' }}>
<span>अन्य तरीके से योगदान</span>
</label>
</div>

</div>

</div>

<div class="form-group mt-3">

<label>Member Message</label>

<textarea
name="message"
class="form-control"
rows="4"
placeholder="Member interest / message">

{{ $member->message }}

</textarea>

</div>
<div class="form-group mt-3">

<div class="custom-control custom-checkbox">

<input
type="checkbox"
name="status"
id="status"
class="custom-control-input"
{{ $member->status ? 'checked':'' }}>

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
Update Member

</button>

<a
href="{{ route('admin.mandal-members.index') }}"
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

document.getElementById('memberForm').addEventListener('submit',function(){

let btn=document.getElementById('saveBtn');

btn.disabled=true;

btn.innerHTML='<i class="fa fa-spinner fa-spin"></i> Updating...';

});

</script>