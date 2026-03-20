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
                        <a href="{{ route('admin.listings.index') }}">Manage Listings</a>
                    </li>

                    <li class="breadcrumb-item active">
                        Add Listing
                    </li>

                </ol>
            </div>

        </div>


        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Add Listing</strong>
                </div>

                <div class="card-body">

                    <form id="listingForm" method="POST" action="{{ route('admin.listings.store') }}"
                        enctype="multipart/form-data">

                        @csrf


                        <div class="form-group">
                            <label>Location *</label>

                            <select name="location_id" class="form-control" required>

                                <option value="">Select Location</option>

                                @foreach($locations as $loc)

                                    <option value="{{ $loc->id }}">
                                        {{ $loc->location }}
                                    </option>

                                @endforeach

                            </select>
                        </div>


                        <div class="form-group mt-3">
                            <label>Category *</label>

                            <select name="category_id" id="category" class="form-control" required>

                                <option value="">Select Category</option>

                                @foreach($categories as $cat)

                                    <option value="{{ $cat->id }}">
                                        {{ $cat->name }}
                                    </option>

                                @endforeach

                            </select>
                        </div>


                        <div class="form-group mt-3">

                            <label>Sub Category</label>

                            <select name="sub_category_id" id="sub_category" class="form-control">

                                <option value="">Select Sub Category</option>

                            </select>

                        </div>


                        <div class="form-group mt-3">

                            <label>Business Name *</label>

                            <input type="text" name="business_name" class="form-control" required>

                        </div>


                        <div class="form-group mt-3">

                            <label>Full Address</label>

                            <textarea name="address" class="form-control"></textarea>

                        </div>


                        <div class="form-group mt-3">

                            <label>Mobile *</label>

                            <input type="text" name="mobile" class="form-control" required>

                        </div>


                        <div class="form-group mt-3">

                            <label>Email</label>

                            <input type="email" name="email" class="form-control">

                        </div>


                        <div class="form-group mt-3">

                            <label>WhatsApp</label>

                            <input type="text" name="whatsapp" class="form-control">

                        </div>


                        <div class="form-group mt-3">

                            <label>Short Description</label>

                            <textarea name="short_description" class="form-control"></textarea>

                        </div>


                        <div class="form-group mt-3">

                            <label>Services</label>

                            <textarea name="services" class="form-control"></textarea>

                        </div>


                        <div class="form-group mt-3">

                            <label>Working Hours</label>

                            <input type="text" name="working_hours" class="form-control"
                                placeholder="9:00 AM - 8:00 PM">

                        </div>


                        <div class="form-group mt-3">

                            <label>Closed Days</label>

                            <div class="row">

                                @php
                                    $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                                @endphp

                                @foreach($days as $day)

                                    <div class="col-md-3">

                                        <input type="checkbox" name="closed_days[]" value="{{ $day }}"> {{ $day }}

                                    </div>

                                @endforeach

                            </div>

                        </div>


                        <div class="form-group mt-3">

                            <label>Website</label>

                            <input type="url" name="website" class="form-control">

                        </div>

                        <div class="form-group mt-3">

                            <label>Business Image</label>

                            <input type="file" name="image" class="form-control" accept="image/*">

                            <small class="text-muted">
                                Recommended size: 600×400px
                            </small>

                        </div>

                        <div class="form-group mt-3">

                            <label>Business Logo</label>

                            <input type="file" name="logo" class="form-control" accept="image/*">

                            <small class="text-muted">
                                Recommended: square logo (200×200px)
                            </small>

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
                                Save Listing

                            </button>

                            <a href="{{ route('admin.listings.index') }}" class="btn btn-secondary">

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

    $('#category').change(function () {

        let id = $(this).val();

        $.get('/admin/get-subcategories/' + id, function (data) {

            $('#sub_category').html(data);

        });

    });


    document.getElementById('listingForm').addEventListener('submit', function () {

        let btn = document.getElementById('saveBtn');

        btn.disabled = true;

        btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saving...';

    });

</script>