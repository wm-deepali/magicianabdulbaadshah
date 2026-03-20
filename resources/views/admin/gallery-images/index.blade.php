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
                        Image Gallery
                    </li>

                </ol>
            </div>

            <div class="ml-auto mr-2">
                <a href="{{ route('admin.gallery-images.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Image
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
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th width="120">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($images as $image)

                                    <tr id="row{{ $image->id }}">

                                        <td>{{ $image->id }}</td>

                                        <td>{{ $image->title ?? '-' }}</td>

                                        <td>
                                            <img src="{{ asset('storage/' . $image->image) }}"
                                                width="80" height="60"
                                                style="object-fit:cover;border-radius:5px;">
                                        </td>

                                        <td>

                                            <a href="{{ route('admin.gallery-images.edit', $image->id) }}"
                                                class="btn btn-sm btn-outline-dark">
                                                <i class="fa fa-pencil"></i>
                                            </a>

                                            <button class="btn btn-sm btn-outline-danger"
                                                onclick="deleteImage({{ $image->id }})">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="4" class="text-center text-muted py-4">
                                            No Images Found
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
    function deleteImage(id) {
        Swal.fire({
            title: 'Delete Image?',
            text: "This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete'
        }).then((result) => {

            if (result.isConfirmed) {

                $.ajax({
                    url: "{{ url('admin/gallery-images') }}/" + id,
                    type: "DELETE",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (res) {

                        Swal.fire('Deleted!', res.message ?? 'Deleted successfully', 'success');

                        $("#row" + id).fadeOut(400, function () {
                            $(this).remove();
                        });
                    }
                });

            }

        });
    }
</script>