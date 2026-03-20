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
                        Site Settings
                    </li>

                </ol>
            </div>

        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Contact Settings</strong>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('admin.settings.update') }}">

                        @csrf

                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control" rows="3">{{ $setting->address }}</textarea>
                        </div>

                        <div class="form-group mt-3">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ $setting->phone }}">
                        </div>

                        <div class="form-group mt-3">
                            <label>Support Phone</label>
                            <input type="text" name="support_phone" class="form-control"
                                value="{{ $setting->support_phone }}">
                        </div>

                        <div class="form-group mt-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $setting->email }}">
                        </div>

                        <div class="form-group mt-3">
                            <label>Support Email</label>
                            <input type="email" name="support_email" class="form-control"
                                value="{{ $setting->support_email }}">
                        </div>

                        <div class="form-group mt-3">
                            <label>Facebook</label>
                            <input type="text" name="facebook" class="form-control" value="{{ $setting->facebook }}">
                        </div>

                        <div class="form-group mt-3">
                            <label>Instagram</label>
                            <input type="text" name="instagram" class="form-control" value="{{ $setting->instagram }}">
                        </div>

                        <div class="form-group mt-3">
                            <label>Twitter</label>
                            <input type="text" name="twitter" class="form-control" value="{{ $setting->twitter }}">
                        </div>

                        <div class="form-group mt-3">
                            <label>WhatsApp Link</label>
                            <input type="text" name="whatsapp" class="form-control" value="{{ $setting->whatsapp }}">
                        </div>

                        <div class="form-group mt-3">
                            <label>Google Map Embed</label>
                            <textarea name="google_map" class="form-control"
                                rows="4">{{ $setting->google_map }}</textarea>
                        </div>

                        <div class="mt-4">

                            <button class="btn btn-success">
                                <i class="fa fa-save"></i> Save Settings
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')