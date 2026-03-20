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


        <!-- Master -->
        <li
            class="{{ request()->routeIs('admin.locations.*', 'admin.categories.*', 'admin.subcategories.*', 'admin.mandals.*') ? 'active' : '' }}">
            <a href="#">
                <i class="fa-solid fa-database"></i> Master
            </a>

            <ul>

                <li class="{{ request()->routeIs('admin.locations.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.locations.index') }}">
                        Manage Location
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.categories.index') }}">
                        Manage Categories
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.subcategories.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.subcategories.index') }}">
                        Manage Sub Categories
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.mandals.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.mandals.index') }}">
                        Manage Mandals
                    </a>
                </li>

            </ul>
        </li>


        <!-- Listing & Members -->
        <li class="{{ request()->routeIs('admin.listings.*', 'admin.mandal-members.*') ? 'active' : '' }}">
            <a href="#">
                <i class="fa-solid fa-list"></i> Listing & Members
            </a>

            <ul>

                <li class="{{ request()->routeIs('admin.listings.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.listings.index') }}">
                        Manage Listing
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.mandal-members.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.mandal-members.index') }}">
                        Manage Mandal Members
                    </a>
                </li>

            </ul>
        </li>


        <!-- FAQ & Blogs -->
        <li class="{{ request()->routeIs('admin.faqs.*', 'admin.blogs.*') ? 'active' : '' }}">
            <a href="#">
                <i class="fa-solid fa-blog"></i> FAQ & Blogs
            </a>

            <ul>

                <li class="{{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.faqs.index') }}">
                        Manage FAQ
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.blogs.index') }}">
                        Manage Blogs
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

                <li class="{{ request()->routeIs('admin.home-intro.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.home-intro.edit') }}">
                        <i class="fa-solid fa-house"></i> Manage Introduction
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.home-hero.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.home-hero.edit') }}">
                        <i class="fa-solid fa-image"></i> Manage Hero Section
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.settings.edit') }}">
                        <i class="fa-solid fa-gear"></i> Manage Contact Page
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.about.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.about.edit') }}">
                        <i class="fa-solid fa-circle-info"></i>Manage About Us
                    </a>
                </li>

                <li class="{{ request()->routeIs('') ? 'active' : '' }}">
                    <a href="{{ route('admin.why.edit') }}">
                        <i class="fa-solid fa-lightbulb"></i> Manage Why Choose Us
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.pages.index') }}">
                        <i class="fa-solid fa-file-lines"></i> Manage Dynamic Pages
                    </a>
                </li>


            </ul>
        </li>


    </ul>
</div>