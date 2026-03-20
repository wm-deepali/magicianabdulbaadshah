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
                        About Page Settings
                    </li>

                </ol>
            </div>
        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>About Page Settings</strong>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('admin.about.update') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- HERO -->
                        <h5 class="mb-3 text-primary">Hero Section</h5>

                        <div class="form-group">
                            <label>Hero Title</label>
                            <input type="text" name="hero_title" class="form-control" value="{{ $data->hero_title }}">
                        </div>

                        <div class="form-group mt-3">
                            <label>Hero Subtitle</label>
                            <textarea name="hero_subtitle" class="form-control"
                                rows="3">{{ $data->hero_subtitle }}</textarea>
                        </div>

                        <hr>

                        <!-- ABOUT -->
                        <h5 class="mb-3 text-primary">About Section</h5>

                        <div class="form-group">
                            <label>About Title</label>
                            <input type="text" name="about_title" class="form-control" value="{{ $data->about_title }}">
                        </div>

                        <div class="form-group mt-3">
                            <label>About Image</label>
                            <input type="file" name="about_image" class="form-control">

                            @if($data->about_image)
                                <img src="{{ asset('storage/' . $data->about_image) }}" width="120" class="mt-2">
                            @endif
                        </div>

                        <div class="form-group mt-3">
                            <label>About Description</label>
                            <textarea name="about_description" class="form-control ckeditor"
                                rows="5">{!! $data->about_description !!}</textarea>
                        </div>

                        <hr>

                        <!-- VISION / MISSION -->
                        <h5 class="mb-3 text-primary">Vision & Mission</h5>

                        <div class="form-group">
                            <label>Vision</label>
                            <textarea name="vision" class="form-control ckeditor"
                                rows="4">{!! $data->vision !!}</textarea>
                        </div>

                        <div class="form-group mt-3">
                            <label>Mission</label>
                            <textarea name="mission" class="form-control ckeditor"
                                rows="4">{!! $data->mission !!}</textarea>
                        </div>

                        <div class="form-group mt-3">
                            <label>Objectives</label>
                            <textarea name="objectives" class="form-control ckeditor"
                                rows="4">{!! $data->objectives !!}</textarea>
                        </div>

                        <hr>

                        <!-- FOUNDER -->
                        <h5 class="mb-3 text-primary">Founder Section</h5>

                        <div class="form-group">
                            <label>Founder Name</label>
                            <input type="text" name="founder_name" class="form-control"
                                value="{{ $data->founder_name }}">
                        </div>

                        <div class="form-group mt-3">
                            <label>Founder Description</label>
                            <textarea name="founder_description" class="form-control ckeditor"
                                rows="5">{!! $data->founder_description !!}</textarea>
                        </div>

                        <div class="form-group mt-3">
                            <label>Founder Quote</label>
                            <textarea name="founder_quote" class="form-control"
                                rows="3">{{ $data->founder_quote }}</textarea>
                        </div>

                        <div class="form-group mt-3">
                            <label>Founder Image</label>
                            <input type="file" name="founder_image" class="form-control">

                            @if($data->founder_image)
                                <img src="{{ asset('storage/' . $data->founder_image) }}" width="120" class="mt-2">
                            @endif
                        </div>

                        <hr>

                        <!-- SOCIAL -->
                        <h5 class="mb-3 text-primary">Social Links</h5>

                        <div class="form-group">
                            <label>LinkedIn</label>
                            <input type="text" name="linkedin" class="form-control" value="{{ $data->linkedin }}">
                        </div>

                        <div class="form-group mt-3">
                            <label>Instagram</label>
                            <input type="text" name="instagram" class="form-control" value="{{ $data->instagram }}">
                        </div>

                        <div class="form-group mt-3">
                            <label>WhatsApp</label>
                            <input type="text" name="whatsapp" class="form-control" value="{{ $data->whatsapp }}">
                        </div>

                        <hr>

                        <!-- CTA -->
                        <h5 class="mb-3 text-primary">Call To Action</h5>

                        <div class="form-group">
                            <label>CTA Title</label>
                            <input type="text" name="cta_title" class="form-control" value="{{ $data->cta_title }}">
                        </div>

                        <div class="form-group mt-3">
                            <label>CTA Description</label>
                            <textarea name="cta_description" class="form-control"
                                rows="3">{{ $data->cta_description }}</textarea>
                        </div>

                        <!-- Submit -->
                        <div class="mt-4">
                            <button class="btn btn-success">
                                <i class="fa fa-save"></i> Save About Page
                            </button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')

<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replaceAll('ckeditor');
</script>