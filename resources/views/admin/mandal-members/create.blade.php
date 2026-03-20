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
                        Add Member
                    </li>

                </ol>
            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Add Mandal Member</strong>
                </div>

                <div class="card-body">

                    <form id="memberForm" method="POST" action="{{ route('admin.mandal-members.store') }}"
                        enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label>Mandal *</label>

                            <select name="mandal_id" class="form-control" required>

                                <option value="">Select Mandal</option>

                                @foreach($mandals as $mandal)
                                    <option value="{{ $mandal->id }}">{{ $mandal->name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <label>Member Photo</label>
                            <input type="file" name="photo" class="form-control">
                        </div>

                        <div class="form-group mt-3">
                            <label>Member Name *</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>Designation</label>
                            <input type="text" name="designation" class="form-control">
                        </div>

                        <div class="form-group mt-3">
                            <label>Location</label>
                            <input type="text" name="location" class="form-control">
                        </div>

                        <div class="form-group mt-3">
                            <label>Member Since</label>
                            <input type="text" name="since" class="form-control" placeholder="e.g. Jan 2023">
                        </div>

                        <div class="form-group mt-3">
                            <label>Mobile *</label>
                            <input type="text" name="mobile" class="form-control" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>WhatsApp</label>
                            <input type="text" name="whatsapp" class="form-control">
                        </div>

                        <div class="form-group mt-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
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
                                Save Member

                            </button>

                            <a href="{{ route('admin.mandal-members.index') }}" class="btn btn-secondary">

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

    document.getElementById('memberForm').addEventListener('submit', function () {

        let btn = document.getElementById('saveBtn');

        btn.disabled = true;

        btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saving...';

    });

</script>