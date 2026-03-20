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
                    Manage Locations
                </li>
            </ol>
        </div>

        <div class="ml-auto mr-2">
            <a href="{{ route('admin.locations.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add Location
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
                                <th>Location</th>
                                <th width="120">Popular</th>
                                <th width="120">Default</th>
                                <th width="120">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                        @forelse($locations as $location)

                            <tr id="row{{ $location->id }}">

                                <td>{{ $location->id }}</td>

                                <td>
                                    <strong>{{ $location->location }}</strong>
                                </td>

                                <td>
                                    @if($location->is_popular)
                                        <span class="badge badge-success">Popular</span>
                                    @else
                                        <span class="badge badge-secondary">No</span>
                                    @endif
                                </td>

                                <td>
                                    @if($location->is_default)
                                        <span class="badge badge-primary">Default</span>
                                    @else
                                        -
                                    @endif
                                </td>

                                <td>

                                    <a href="{{ route('admin.locations.edit',$location->id) }}"
                                       class="btn btn-sm btn-outline-dark">

                                        <i class="fa fa-pencil"></i>

                                    </a>

                                    <button
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="deleteLocation({{ $location->id }})">

                                        <i class="fa fa-trash"></i>

                                    </button>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    No Locations Found
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

function deleteLocation(id)
{
    Swal.fire({
        title: 'Delete Location?',
        text: "This action cannot be undone.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete'
    })
    .then((result) => {

        if (result.isConfirmed)
        {

            $.ajax({

                url: "{{ url('admin/locations') }}/" + id,

                type: "DELETE",

                data: {
                    _token: "{{ csrf_token() }}"
                },

                success: function(res)
                {
                    Swal.fire(
                        'Deleted!',
                        res.message,
                        'success'
                    );

                    $("#row"+id).fadeOut(400,function(){
                        $(this).remove();
                    });
                }

            });

        }

    });
}

</script>