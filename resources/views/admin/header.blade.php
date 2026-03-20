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

        <!-- Gallery -->
        <li class="{{ request()->routeIs('admin.gallery-images.*', 'admin.gallery-videos.*') ? 'active' : '' }}">
            <a href="#">
                <i class="fa-solid fa-image"></i> Gallery
            </a>

            <ul>
                <li class="{{ request()->routeIs('admin.gallery-images.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.gallery-images.index') }}">
                        Image Gallery
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.gallery-videos.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.gallery-videos.index') }}">
                        Video Gallery
                    </a>
                </li>
            </ul>
        </li>



        <!-- FAQ & Blogs -->
        <li class="{{ request()->routeIs('admin.faqs.*', 'admin.blogs.*') ? 'active' : '' }}">
            <a href="#">
                <i class="fa-solid fa-blog"></i> FAQ
            </a>

            <ul>

                <li class="{{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.faqs.index') }}">
                        Manage FAQ
                    </a>
                </li>

            </ul>
        </li>

        <li class="{{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
            <a href="{{ route('admin.contacts.index') }}">
                <i class="fa-solid fa-envelope"></i> Contact Enquiries
            </a>
        </li>

        <li class="{{ request()->routeIs('admin.settings.*', 'admin.about.*', 'admin.why.*') ? 'active' : '' }}">
            <a href="#">
                <i class="fa-solid fa-list"></i> Content Management
            </a>

            <ul>




            </ul>
        </li>


    </ul>
</div>