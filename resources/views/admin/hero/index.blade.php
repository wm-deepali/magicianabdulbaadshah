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
                <li class="breadcrumb-item active">Hero Slider</li>
            </ol>
        </div>

        <div class="ml-auto mr-2">
            <a href="{{ route('admin.hero.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add Slide
            </a>
        </div>

    </div>

    <div class="card">
        <div class="card-body">

            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($sliders as $slider)

                    <tr id="row{{ $slider->id }}">
                        <td>{{ $slider->id }}</td>

                        <td>
                            <img src="{{ asset('storage/' . $slider->image) }}"
                                 width="100">
                        </td>

                        <td>{!! $slider->title !!}</td>

                        <td>
                            <a href="{{ route('admin.hero.edit', $slider->id) }}"
                               class="btn btn-sm btn-dark">
                                Edit
                            </a>

                            <button onclick="deleteSlide({{ $slider->id }})"
                                    class="btn btn-sm btn-danger">
                                Delete
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

@include('admin.footer')

<script>
function deleteSlide(id){
    if(confirm('Delete this slide?')){
        $.ajax({
            url: "{{ url('admin/hero') }}/" + id,
            type: "DELETE",
            data: {_token: "{{ csrf_token() }}"},
            success: function(){
                $("#row"+id).remove();
            }
        });
    }
}
</script>