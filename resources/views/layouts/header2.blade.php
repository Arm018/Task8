<header id="header-container" class="header-style-2">

    <!-- Header -->
    <div id="header">
        <div class="container">

            <!-- Left Side Content -->
            <div class="left-side">

                <!-- Logo -->
                <div id="logo" class="margin-top-10">
                    <a href="/"><img src="/images/logo.png" alt=""></a>

                    <!-- Logo for Sticky Header -->
                    <a href="/" class="sticky-logo"><img src="/images/logo2.png" alt=""></a>
                </div>

                <!-- Mobile Navigation -->
                <div class="mmenu-trigger">
                    <button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
                    </button>
                </div>

            </div>
            <!-- Left Side Content / End -->

            <!-- Right Side Content / End -->
            <div class="right-side">
                <ul class="header-widget">
                    <li>
                        <i class="sl sl-icon-call-in"></i>
                        <div class="widget-content">
                            <span class="title">Questions?</span>
                            <span class="data">(123) 123-456 </span>
                        </div>
                    </li>

                    <li>
                        <i class="sl sl-icon-location"></i>
                        <div class="widget-content">
                            <span class="title">Our Office</span>
                            <span class="data">45 Park Avenue, NY</span>
                        </div>
                    </li>

                    <li class="with-btn"><a href="{{route('property.create')}}" class="button border">Submit
                            Property</a></li>
                </ul>
            </div>
            <!-- Right Side Content / End -->

        </div>

        <!-- Main Navigation -->
        <nav id="navigation" class="style-2">
            <div class="container">
                <ul id="responsive">

                    <li><a class="current" href="/">Home</a>
                        <ul>
                            <li><a href="/">Home 1</a></li>
                            <li><a href="{{route('home2')}}">Home 2</a></li>
                            <li><a href="{{route('home3')}}">Home 3</a></li>
                            <li><a href="{{route('home4')}}">Home 4</a></li>
                        </ul>
                    </li>

                    <li><a href="#">Listings</a>
                        <ul>
                            <li><a href="#">List Layout</a>
                                <ul>
                                    <li><a href="{{route('search')}}">With Sidebar</a></li>
                                    <li><a href="listings-list-with-map.html">With Map</a></li>
                                    <li><a href="listings-list-full-width.html">Full Width</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Grid Layout</a>
                                <ul>
                                    <li><a href="listings-grid-standard-with-sidebar.html">Standard With Sidebar</a>
                                    </li>
                                    <li><a href="listings-grid-compact-with-sidebar.html">Compact With Sidebar</a></li>
                                    <li><a href="listings-grid-with-map.html">With Map</a></li>
                                    <li><a href="listings-grid-full-width.html">Full Width</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Half Map</a>
                                <ul>
                                    <li><a href="listings-half-map-list.html">List Layout</a></li>
                                    <li><a href="listings-half-map-grid-standard.html">Grid Standard Layout</a></li>
                                    <li><a href="listings-half-map-grid-compact.html">Grid Compact Layout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li><a href="#">Features</a>
                        <ul>
                            <li><a href="#">Single Properties</a>
                                <ul>
                                    <li><a href="single-property-page-1.html">Property Style 1</a></li>
                                    <li><a href="single-property-page-2.html">Property Style 2</a></li>
                                    <li><a href="single-property-page-3.html">Property Style 3</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Search Styles</a>
                                <ul>
                                    <li><a href="index.html">Home Search 1</a></li>
                                    <li><a href="index-2.html">Home Search 2</a></li>
                                    <li><a href="index-3.html">Home Search 3</a></li>
                                    <li><a href="listings-list-full-width.html">Advanced Style</a></li>
                                    <li><a href="listings-list-with-sidebar.html">Sidebar Search</a></li>
                                </ul>
                            </li>
                            <li><a href="#">My Account</a>
                                <ul>
                                    <li><a href="my-profile.html">My Profile</a></li>
                                    <li><a href="my-bookmarks.html">Bookmarked Listings</a></li>
                                    <li><a href="my-properties.html">My Properties</a></li>
                                    <li><a href="change-password.html">Change Password</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Agencies & Agents</a>
                                <ul>
                                    <li><a href="agencies-list.html">Agencies List</a></li>
                                    <li><a href="agency-page.html">Agency Page</a></li>
                                    <li><a href="agents-list.html">Agents List</a></li>
                                    <li><a href="agent-page.html">Agent Page</a></li>
                                </ul>
                            </li>

                            <li><a href="compare-properties.html">Compare Properties</a></li>
                            <li><a href="submit-property.html">Submit Property</a></li>
                        </ul>
                    </li>

                    <li><a href="#">Pages</a>
                        <ul>
                            <li><a href="blog.html">Blog</a>
                                <ul>
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="blog-post.html">Blog Post</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="elements.html">Elements</a></li>
                            <li><a href="pricing-tables.html">Pricing Tables</a></li>
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="icons.html">Icons</a></li>
                        </ul>
                    </li>

                    <!-- 						<li class="right-side-menu-item"><a href="login-register.html" class="sign-in"><i class="fa fa-user"></i> Log In / Register</a></li> -->
                </ul>
            </div>
        </nav>

        <!-- User Menu -->
        <div class="container">
            <div class="row">
                <div class="user-menu-container">
                    <div class="user-menu">
                        <div class="user-name" style="font-size: 16px">
                                        <span>
                                            @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->userInfo && \Illuminate\Support\Facades\Auth::user()->userInfo->image)
                                                <img src="{{ \Illuminate\Support\Facades\Storage::url(\Illuminate\Support\Facades\Auth::user()->userInfo->image) }}"
                                                    style="height: 35px !important;">
                                            @else
                                                <img src="/images/agent-01.jpg">
                                            @endif
                                        </span>
                            Hi, {{ \Illuminate\Support\Facades\Auth::user()->name }}!
                        </div>
                        <ul>
                            <li><a href="{{route('my-profile')}}"><i class="sl sl-icon-user"></i> My Profile</a>
                            </li>
                            <li><a href="{{route('favorites')}}"><i class="sl sl-icon-star"></i> Bookmarks</a></li>
                            <li><a href="{{route('property.index')}}"><i class="sl sl-icon-docs"></i> My Properties</a>
                            </li>
                            <li>
                                <form action="{{route('logout')}}" method="post">
                                    @csrf
                                    <button type="submit"><i class="sl sl-icon-power"></i>Log Out</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- User Menu / End -->

        <div class="clearfix"></div>
        <!-- Main Navigation / End -->
    </div>
    <!-- Header / End -->

</header>
<div class="clearfix"></div>
