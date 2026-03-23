<!-- fixed-top-->
<div class="row d-none">
    <!-- success message open -->
    <div class="col-10">
        @if(session()->get('success'))
            <div class="alert alert-info alert-dismissible fade in">
                <a href="javascript:void(0);" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ session()->get('success') }}
            </div>
        @endif

        @if(session()->get('error'))
            <div class="alert alert-danger alert-dismissible fade in">
                <a href="javascript:void(0);" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Error!</strong> {{ session()->get('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <!-- success message close -->
</div>
<div id='cssmenu'>
    <ul class="pt-0">

        <!-- Dashboard -->
        <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <i class="fa-solid fa-gauge"></i> Dashboard
            </a>
        </li>

        <!-- Enquiries -->
        <li class="{{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
            <a href="{{ route('admin.contacts.index') }}">
                <i class="fa-solid fa-envelope"></i> Contact Enquiries
            </a>
        </li>

        <!-- Services -->
        <li class="{{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
            <a href="{{ route('admin.services.index') }}">
                <i class="fa-solid fa-wand-magic-sparkles"></i> Services
            </a>
        </li>

        <!-- Packages -->
        <li class="{{ request()->routeIs('admin.packages.*') ? 'active' : '' }}">
            <a href="{{ route('admin.packages.index') }}">
                <i class="fa-solid fa-box"></i> Packages
            </a>
        </li>

        <!-- FAQ -->
        <li class="{{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
            <a href="{{ route('admin.faqs.index') }}">
                <i class="fa-solid fa-circle-question"></i> FAQ
            </a>
        </li>

        <!-- Gallery -->
        <li class="{{ request()->routeIs('admin.gallery-images.*', 'admin.gallery-videos.*') ? 'active' : '' }}">
            <a href="#">
                <i class="fa-solid fa-image"></i> Gallery
            </a>
            <ul>
                <li class="{{ request()->routeIs('admin.gallery-images.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.gallery-images.index') }}">
                        <i class="fa-solid fa-images"></i> Image Gallery
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.gallery-videos.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.gallery-videos.index') }}">
                        <i class="fa-solid fa-video"></i> Video Gallery
                    </a>
                </li>
            </ul>
        </li>

        <!-- Content Management -->
        <li
            class="{{ request()->routeIs('admin.about.*', 'admin.hero.*', 'admin.about-page.*', 'admin.contact-page.*') ? 'active' : '' }}">
            <a href="#">
                <i class="fa-solid fa-layer-group"></i> Content Management
            </a>

            <ul>

                <li class="{{ request()->routeIs('admin.hero.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.hero.index') }}">
                        <i class="fa-solid fa-images"></i> Hero Slider
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.about.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.about.edit') }}">
                        <i class="fa-solid fa-house"></i> Home About
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.about-page.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.about-page.edit') }}">
                        <i class="fa-solid fa-circle-info"></i> About Page
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.contact-page.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.contact-page.edit') }}">
                        <i class="fa-solid fa-address-book"></i> Contact Settings
                    </a>
                </li>

            </ul>
        </li>

    </ul>
</div>