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
                    Packages
                </li>
            </ol>
        </div>

        <div class="ml-auto mr-2">
            <a href="{{ route('admin.packages.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add Package
            </a>
        </div>

    </div>

    <div class="content-wrapper pb-4">
        <div class="card">
            <div class="card-body">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Popular</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($packages as $package)
                        <tr id="row{{ $package->id }}">
                            <td>{{ $package->id }}</td>
                            <td>{{ $package->title }}</td>
                            <td>₹{{ $package->price }}</td>
                            <td>
                                @if($package->is_popular)
                                    <span class="badge badge-success">Yes</span>
                                @else
                                    <span class="badge badge-secondary">No</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('admin.packages.edit', $package->id) }}"
                                   class="btn btn-sm btn-outline-dark">
                                    <i class="fa fa-pencil"></i>
                                </a>

                                <button onclick="deletePackage({{ $package->id }})"
                                        class="btn btn-sm btn-outline-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    </div>

</div>
</div>

@include('admin.footer')

<script>
function deletePackage(id){
    if(confirm('Delete this package?')){
        $.ajax({
            url: "{{ url('admin/packages') }}/" + id,
            type: "DELETE",
            data: {_token: "{{ csrf_token() }}"},
            success: function(){
                $("#row"+id).remove();
            }
        });
    }
}
</script>