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
                        Manage Listings
                    </li>

                </ol>
            </div>

            <div class="ml-auto mr-2">
                <a href="{{ route('admin.listings.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Listing
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

                                    <th width="80">Image</th>

                                    <th width="80">Logo</th>

                                    <th>Business</th>

                                    <th>Location</th>

                                    <th>Category</th>

                                    <th>Mobile</th>

                                    <th width="120">Status</th>

                                    <th width="120">Action</th>

                                </tr>
                            </thead>

                            <tbody>

                                @forelse($listings as $listing)

                                                            <tr id="row{{ $listing->id }}">

                                                                <td>{{ $listing->id }}</td>

                                                                <td>
                                                                    <img src="{{ $listing->image
                                    ? asset('storage/' . $listing->image)
                                    : asset('images/no-image.png') }}" width="50" height="50"
                                                                        style="object-fit:cover;border-radius:6px;">
                                                                </td>

                                                                <!-- LOGO -->
                                                                <td>
                                                                    <img src="{{ $listing->logo
                                    ? asset('storage/' . $listing->logo)
                                    : asset('images/no-image.png') }}" width="50" height="50"
                                                                        style="object-fit:contain;border-radius:6px;background:#fff;padding:3px;">
                                                                </td>

                                                                <td>
                                                                    <strong>{{ $listing->business_name }}</strong>
                                                                </td>

                                                                <td>{{ $listing->location->location ?? '-' }}</td>

                                                                <td>{{ $listing->category->name ?? '-' }}</td>

                                                                <td>{{ $listing->mobile }}</td>

                                                                <td>
                                                                    @if($listing->status)
                                                                        <span class="badge badge-primary">Active</span>
                                                                    @else
                                                                        <span class="badge badge-danger">Inactive</span>
                                                                    @endif
                                                                </td>

                                                                <td>

                                                                    <a href="{{ route('admin.listings.edit', $listing->id) }}"
                                                                        class="btn btn-sm btn-outline-dark">

                                                                        <i class="fa fa-pencil"></i>

                                                                    </a>

                                                                    <button class="btn btn-sm btn-outline-danger"
                                                                        onclick="deleteListing({{ $listing->id }})">

                                                                        <i class="fa fa-trash"></i>

                                                                    </button>

                                                                </td>

                                                            </tr>

                                @empty

                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-4">
                                            No Listings Found
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

    function deleteListing(id) {
        Swal.fire({
            title: 'Delete Listing?',
            text: "This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete'
        })
            .then((result) => {

                if (result.isConfirmed) {

                    $.ajax({

                        url: "{{ url('admin/listings') }}/" + id,

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