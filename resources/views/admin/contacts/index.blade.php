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
                        Contact Enquiries
                    </li>

                </ol>
            </div>

        </div>


        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Contact Enquiries</strong>
                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">

                            <thead>

                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Event Type</th>
                                    <th>Event Date</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th width="100">Action</th>
                                </tr>

                            </thead>

                            <tbody>

                                @forelse($contacts as $contact)

                                    <tr id="row{{ $contact->id }}">

                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $contact->name }}</td>

                                        <td>{{ $contact->phone }}</td>

                                        <td>{{ optional($contact->service)->title }}</td>

                                        <td>{{ $contact->event_date }}</td>

                                        <td style="max-width:250px">
                                            {{ $contact->message }}
                                        </td>

                                        <td>
                                            {{ $contact->created_at->format('d M Y') }}
                                        </td>

                                        <td>

                                            <button class="btn btn-danger btn-sm delete-contact"
                                                onclick="deleteContact({{ $contact->id }})">

                                                <i class="fa fa-trash"></i>

                                            </button>
                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="8" class="text-center">
                                            No Contact Enquiries Found
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                    <div class="mt-3">

                        {{ $contacts->links() }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
<script>

    function deleteContact(id) {
        Swal.fire({
            title: 'Delete Contact Inquiry?',
            text: "This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete'
        })
            .then((result) => {

                if (result.isConfirmed) {

                    $.ajax({

                        url: "{{ url('/admin/contacts') }}/" + id,

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
@include('admin.footer')