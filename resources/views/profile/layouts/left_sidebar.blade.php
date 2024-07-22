<div class="col-md-4">
    <div class="sidebar left">

        <div class="my-account-nav-container">

            <ul class="my-account-nav">
                <li class="sub-nav-title">Manage Account</li>
                <li><a href="{{ route('my-profile') }}" @if (request()->routeIs('my-profile')) class="current" @endif><i
                            class="sl sl-icon-user"></i> My Profile</a></li>
                <li><a href="{{route('favorites')}}"><i class="sl sl-icon-star"></i> Bookmarked Listings</a></li>
            </ul>

            <ul class="my-account-nav">
                <li class="sub-nav-title">Manage Listings</li>
                <li><a href="{{route('property.index')}}"
                       @if (request()->routeIs('property.index')) class="current" @endif><i class="sl sl-icon-docs"></i>
                        My Properties</a></li>
                <li><a href="{{route('property.create')}}"><i class="sl sl-icon-action-redo"></i> Submit New
                        Property</a></li>
            </ul>

            <ul class="my-account-nav">
                <li><a href="{{route('profilePassword')}}"
                       @if (request()->routeIs('profilePassword')) class="current" @endif><i
                            class="sl sl-icon-lock"></i> Change Password</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit"><i class="sl sl-icon-power"></i> Log Out</button>
                    </form>
                </li>
            </ul>

        </div>

    </div>
</div>
