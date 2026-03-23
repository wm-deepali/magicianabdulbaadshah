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
                        Services
                    </li>
                </ol>
            </div>

            <div class="ml-auto mr-2">
                <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Service
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
                                    <th>Image</th>
                                    <th>Icon</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th width="120">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($services as $service)

                                    <tr id="row{{ $service->id }}">

                                        <td>{{ $service->id }}</td>
                                        <td>
                                            @if($service->image)
                                                <img src="{{ asset('storage/' . $service->image) }}" width="60" height="60"
                                                    style="object-fit:cover; border-radius:6px;">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>
                                        <td>
                                            <i class="{{ $service->icon }} fa-2x text-primary"></i>
                                        </td>

                                        <td>{{ $service->title }}</td>

                                        <td>{{ Str::limit($service->description, 50) }}</td>

                                        <td>

                                            <a href="{{ route('admin.services.edit', $service->id) }}"
                                                class="btn btn-sm btn-outline-dark">
                                                <i class="fa fa-pencil"></i>
                                            </a>

                                            <button class="btn btn-sm btn-outline-danger"
                                                onclick="deleteService({{ $service->id }})">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-4">
                                            No Services Found
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
    function deleteService(id) {
        if (confirm('Delete this service?')) {
            $.ajax({
                url: "{{ url('admin/services') }}/" + id,
                type: "DELETE",
                data: { _token: "{{ csrf_token() }}" },
                success: function () {
                    $("#row" + id).fadeOut(400, function () {
                        $(this).remove();
                    });
                }
            });
        }
    }
</script>