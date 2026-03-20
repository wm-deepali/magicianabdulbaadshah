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

                    <li class="breadcrumb-item active">
                        Manage Mandal Members
                    </li>

                </ol>
            </div>

            <div class="ml-auto mr-2">
                <a href="{{ route('admin.mandal-members.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Member
                </a>
            </div>

        </div>


        <div class="content-wrapper pb-4">

            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-striped table-hover">

                            <thead class="thead-light">
                                <tr>

                                    <th width="60">ID</th>

                                    <th width="80">Photo</th>

                                    <th>Mandal</th>

                                    <th>Member Name</th>

                                    <th>Designation</th>

                                    <th>Mobile</th>

                                    <th>Location</th>

                                    <th>Since</th>

                                    <th width="120">Status</th>

                                    <th width="120">Action</th>

                                </tr>
                            </thead>

                            <tbody>

                                @forelse($members as $member)

                                    <tr id="row{{ $member->id }}">

                                        <td>{{ $member->id }}</td>

                                        <td>

                                            @if($member->photo)
                                                <img src="{{ asset('storage/' . $member->photo) }}"
                                                    style="width:40px;height:40px;border-radius:50%;object-fit:cover;">
                                            @else
                                                <img src="https://via.placeholder.com/40" style="border-radius:50%;">
                                            @endif

                                        </td>

                                        <td>{{ $member->mandal->name ?? '-' }}</td>

                                        <td>
                                            <strong>{{ $member->name }}</strong>

                                            @if($member->whatsapp)
                                                <br>
                                                <a href="https://wa.me/91{{ $member->whatsapp }}" target="_blank"
                                                    class="text-success small">
                                                    <i class="fa fa-whatsapp"></i> WhatsApp
                                                </a>
                                            @endif

                                        </td>

                                        <td>{{ $member->designation }}</td>

                                        <td>{{ $member->mobile }}</td>

                                        <td>{{ $member->location ?? '-' }}</td>

                                        <td>{{ $member->since ?? '-' }}</td>

                                        <td>

                                            @if($member->status)
                                                <span class="badge badge-primary">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif

                                        </td>

                                        <td>

                                            <a href="{{ route('admin.mandal-members.edit', $member->id) }}"
                                                class="btn btn-sm btn-outline-dark">
                                                <i class="fa fa-pencil"></i>
                                            </a>

                                            <button class="btn btn-sm btn-outline-danger"
                                                onclick="deleteMember({{ $member->id }})">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="10" class="text-center text-muted py-4">
                                            No Members Found
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>
            </div>

        </div>

    </div>

</div>

@include('admin.footer')


<script>

    function deleteMember(id) {
        Swal.fire({
            title: 'Delete Member?',
            text: "This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete'
        })
            .then((result) => {

                if (result.isConfirmed) {

                    $.ajax({

                        url: "{{ url('admin/mandal-members') }}/" + id,

                        type: "DELETE",

                        data: {
                            _token: "{{ csrf_token() }}"
                        },

                        success: function (res) {

                            Swal.fire('Deleted!', res.message, 'success');

                            $("#row" + id).fadeOut(400, function () {
                                $(this).remove();
                            });

                        }

                    });

                }

            });

    }

</script>