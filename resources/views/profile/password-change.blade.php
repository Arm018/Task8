@extends('layouts.app')
@section('content')
    <div id="titlebar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>Change Password</h2>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>Change Password</li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>


    <!-- Content
    ================================================== -->
    <div class="container">
        <div class="row">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Widget -->
            <div class="col-md-4">
                <div class="sidebar left">

                    <div class="my-account-nav-container">

                        <ul class="my-account-nav">
                            <li class="sub-nav-title">Manage Account</li>
                            <li><a href="my-profile.html"><i class="sl sl-icon-user"></i> My Profile</a></li>
                            <li><a href="my-bookmarks.html"><i class="sl sl-icon-star"></i> Bookmarked Listings</a></li>
                        </ul>

                        <ul class="my-account-nav">
                            <li class="sub-nav-title">Manage Listings</li>
                            <li><a href="my-properties.html"><i class="sl sl-icon-docs"></i> My Properties</a></li>
                            <li><a href="submit-property.html"><i class="sl sl-icon-action-redo"></i> Submit New Property</a></li>
                        </ul>

                        <ul class="my-account-nav">
                            <li><a href="{{route('profilePassword')}}"><i class="sl sl-icon-lock"></i> Change Password</a></li>
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

            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6  my-profile">
                        <h4 class="margin-top-0 margin-bottom-30">Change Password</h4>
                        <form action="{{route('changePassword')}}" method="post">
                        @csrf
                        <label>Current Password</label>
                        <input type="password" name="old_password">

                        <label>New Password</label>
                        <input type="password" name="new_password">

                        <label>Confirm New Password</label>
                        <input type="password" name="new_password_confirmation">

                        <button class="margin-top-20 button" type="submit">Save Changes</button>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <div class="notification notice">
                            <p>Your password should be at least 12 random characters long to be safe</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
