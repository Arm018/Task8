@extends('layouts.app')
@section('content')
    <div id="titlebar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>My Profile</h2>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>My Profile</li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @include('profile.layouts.left_sidebar')
            <div class="col-md-8">
                <div class="row">
                    <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data"
                          class="container">
                        @csrf
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
                        <div class="row">
                            <div class="col-md-8 my-profile">
                                <h4 class="mt-0 mb-3">My Account</h4>

                                <div class="form-group">
                                    <label for="name">Your Name</label>
                                    <input id="name" name="name"
                                           value="{{\Illuminate\Support\Facades\Auth::user()->name}}" type="text"
                                           class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="title">Your Title</label>
                                    <input id="title" name="title"
                                           @if(\Illuminate\Support\Facades\Auth::user()->userInfo && \Illuminate\Support\Facades\Auth::user()->userInfo->title) value="{{\Illuminate\Support\Facades\Auth::user()->userInfo->title}}"
                                           @else placeholder="Agent In New York"
                                           @endif type="text" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input id="phone" name="phone"
                                           @if(\Illuminate\Support\Facades\Auth::user()->userInfo && \Illuminate\Support\Facades\Auth::user()->userInfo->phone) value="{{\Illuminate\Support\Facades\Auth::user()->userInfo->phone}}"
                                           @else placeholder="123-456-789"
                                           @endif type="text"
                                           class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" name="email"
                                           value="{{\Illuminate\Support\Facades\Auth::user()->email}}" type="email"
                                           disabled
                                           class="form-control">
                                </div>

                                <h4 class="mt-5 mb-2">About Me</h4>
                                <div class="form-group">
                                    @if(\Illuminate\Support\Facades\Auth::user()->userInfo && \Illuminate\Support\Facades\Auth::user()->userInfo->about)
                                        <textarea name="about" id="about" style="font-size: 16px" cols="30" rows="10"
                                                  class="form-control p-4">{{\Illuminate\Support\Facades\Auth::user()->userInfo->about}}
                                        </textarea>
                                    @else
                                        <textarea name="about" id="about" style="font-size: 16px" cols="30" rows="10"
                                                  placeholder="Developer In Munich" class="form-control p-4">
                                        </textarea>

                                    @endif

                                </div>

                                <h4 class="mt-5 mb-0">Social</h4>

                                <div class="form-group">
                                    <label for="twitter"><i class="fa fa-twitter"></i> Twitter</label>
                                    <input id="twitter" name="twitter" value="https://www.twitter.com/" type="text"
                                           class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="facebook"><i class="fa fa-facebook-square"></i> Facebook</label>
                                    <input id="facebook" name="facebook" value="https://www.facebook.com/" type="text"
                                           class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="google_plus"><i class="fa fa-google-plus"></i> Google+</label>
                                    <input id="google_plus" name="google_plus" value="https://www.google.com/"
                                           type="text" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="linkedin"><i class="fa fa-linkedin"></i> Linkedin</label>
                                    <input id="linkedin" name="linkedin" value="https://www.linkedin.com/" type="text"
                                           class="form-control">
                                </div>

                                <button type="submit" class="button margin-top-20 margin-bottom-20">Save Changes
                                </button>
                            </div>
                            <div class="col-md-4">
                                <div class="edit-profile-photo">
                                    <img id="profile-image"
                                         @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->userInfo && \Illuminate\Support\Facades\Auth::user()->userInfo->image)
                                             src="{{ \Illuminate\Support\Facades\Storage::url(\Illuminate\Support\Facades\Auth::user()->userInfo->image) }}"
                                         @else
                                             src="{{ asset('/images/agent-avatar.jpg') }}"
                                         @endif class="img-fluid"
                                         style="width: 250px !important; height: 220px !important;">
                                    <div class="change-photo-btn">
                                        <div class="photoUpload">
                                            <span><i class="fa fa-upload"></i> Upload Photo</span>
                                            <input type="file" id="profile_photo" name="profile_photo" class="upload "/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#profile_photo').on('change', function () {
                var file = this.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#profile-image').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
