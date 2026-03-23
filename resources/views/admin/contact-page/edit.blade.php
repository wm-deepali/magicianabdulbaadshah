@include('admin.top-header')

<div class="main-section">

    @include('admin.header')

    <div class="app-content content container-fluid">

        <!-- Breadcrumb -->
        <div class="breadcrumbs-top d-flex align-items-center bg-light mb-3">
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Manage Contact Page
                    </li>
                </ol>
            </div>
        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Manage Contact Page</strong>
                </div>

                <div class="card-body">

                    <form id="contactForm" method="POST" action="{{ route('admin.contact-page.update') }}">

                        @csrf

                        <!-- Phone -->
                        <div class="form-group">
                            <label>Phone Number *</label>
                            <input type="text" name="phone" class="form-control" value="{{ $contact->phone ?? '' }}"
                                required>
                        </div>

                        <!-- WhatsApp -->
                        <div class="form-group mt-3">
                            <label>WhatsApp Number *</label>
                            <input type="text" name="whatsapp" class="form-control"
                                value="{{ $contact->whatsapp ?? '' }}" required>
                        </div>

                        <!-- Email -->
                        <div class="form-group mt-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $contact->email ?? '' }}">
                        </div>

                        <!-- Address -->
                        <div class="form-group mt-3">
                            <label>Address</label>
                            <textarea name="address" rows="3"
                                class="form-control">{{ $contact->address ?? '' }}</textarea>
                        </div>

                        <!-- Google Map iframe -->
                        <div class="form-group mt-3">
                            <label>Google Map Iframe</label>
                            <textarea name="map_iframe" rows="4" class="form-control"
                                placeholder="Paste iframe code here">{{ $contact->map_iframe ?? '' }}</textarea>
                        </div>


                        <!-- 🔥 SOCIAL LINKS -->
                        <hr class="mt-4">

                        <h5 class="mb-3">Social Links</h5>

                        <div class="form-group">
                            <label>Facebook URL</label>
                            <input type="text" name="facebook" class="form-control"
                                value="{{ $contact->facebook ?? '' }}">
                        </div>

                        <div class="form-group mt-3">
                            <label>Instagram URL</label>
                            <input type="text" name="instagram" class="form-control"
                                value="{{ $contact->instagram ?? '' }}">
                        </div>

                        <div class="form-group mt-3">
                            <label>YouTube URL</label>
                            <input type="text" name="youtube" class="form-control"
                                value="{{ $contact->youtube ?? '' }}">
                        </div>

                        <!-- Submit -->
                        <div class="mt-4">
                            <button type="submit" id="saveBtn" class="btn btn-success">
                                <i class="fa-solid fa-save"></i> Save Changes
                            </button>

                            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
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
    document.getElementById('contactForm').addEventListener('submit', function () {
        let btn = document.getElementById('saveBtn');
        btn.disabled = true;
        btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saving...';
    });
</script>