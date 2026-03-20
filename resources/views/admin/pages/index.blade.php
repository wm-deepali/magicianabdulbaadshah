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
                    <li class="breadcrumb-item active">Manage Pages</li>
                </ol>
            </div>

            <div class="ml-auto mr-2">
                <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Page
                </a>
            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-striped table-hover">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Menu Name</th>
                                    <th>Slug</th>
                                    <th>Menu</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($pages as $page)

                                                            <tr id="row{{ $page->id }}">

                                                                <td>{{ $page->id }}</td>

                                                                <td><strong>{{ $page->menu_name }}</strong></td>

                                                                <td>{{ $page->slug }}</td>

                                                                <td>
                                                                    {!! $page->show_in_menu
                                    ? '<span class="badge badge-success">Yes</span>'
                                    : '<span class="badge badge-secondary">No</span>' !!}
                                                                </td>

                                                                <td>
                                                                    {!! $page->status
                                    ? '<span class="badge badge-primary">Active</span>'
                                    : '<span class="badge badge-danger">Inactive</span>' !!}
                                                                </td>

                                                                <td>

                                                                    <a href="{{ route('admin.pages.edit', $page->id) }}"
                                                                        class="btn btn-sm btn-outline-dark">
                                                                        <i class="fa fa-pencil"></i>
                                                                    </a>

                                                                    <button class="btn btn-sm btn-outline-danger"
                                                                        onclick="deletePage({{ $page->id }})">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>

                                                                </td>

                                                            </tr>

                                @empty

                                    <tr>
                                        <td colspan="6" class="text-center">No Pages Found</td>
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
    function deletePage(id) {
        Swal.fire({
            title: 'Delete Page?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes Delete'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: "{{ url('admin/pages') }}/" + id,
                    type: "DELETE",
                    data: { _token: "{{ csrf_token() }}" },
                    success: function (res) {
                        Swal.fire('Deleted!', res.message, 'success');
                        $("#row" + id).remove();
                    }
                });

            }
        });
    }
</script>