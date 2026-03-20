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
                        Manage Home Hero
                    </li>

                </ol>
            </div>
        </div>

        <div class="content-wrapper pb-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <strong>Manage Homepage Hero</strong>
                </div>

                <div class="card-body">

                    <form method="POST"
                          action="{{ route('admin.home-hero.update') }}"
                          enctype="multipart/form-data">

                        @csrf

                        <!-- TITLE -->
                        <div class="form-group">
                            <label>Hero Title</label>
                            <input type="text"
                                   name="title"
                                   class="form-control"
                                   value="{{ $hero->title ?? '' }}"
                                   required>
                        </div>

                        <!-- SUBTITLE -->
                        <div class="form-group mt-3">
                            <label>Hero Subtitle</label>
                            <textarea name="subtitle"
                                      class="form-control"
                                      rows="3">{{ $hero->subtitle ?? '' }}</textarea>
                        </div>

                        <!-- BUTTON TEXT -->
                        <div class="form-group mt-3">
                            <label>Button Text</label>
                            <input type="text"
                                   name="button_text"
                                   class="form-control"
                                   value="{{ $hero->button_text ?? '' }}">
                        </div>

                        <hr>

                        <!-- BACKGROUND IMAGE -->
                        <div class="form-group mt-3">
                            <label>Background Image</label>

                            <input type="file"
                                   name="background_image"
                                   class="form-control"
                                   accept="image/*">

                            <small class="text-muted">
                                Recommended size: 1920×600px
                            </small>

                            @if(!empty($hero->background_image))
                                <div class="mt-3">
                                    <img src="{{ asset('storage/'.$hero->background_image) }}"
                                         width="200"
                                         style="border-radius:8px;">
                                </div>
                            @endif
                        </div>

                        <!-- SUBMIT -->
                        <div class="mt-4">
                            <button class="btn btn-success">
                                <i class="fa fa-save"></i> Save Hero Section
                            </button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@include('admin.footer')