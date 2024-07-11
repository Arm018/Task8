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

    <div class="container">
        <div class="row">

            @if (session('success'))
                <div class="alert alert-success" style="font-size: 16px">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger" style="font-size: 16px">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @include('profile.layouts.left_sidebar')
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
                            <p>Your password should be at least 8 random characters long to be safe</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
