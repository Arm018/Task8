@extends('layouts.app')
@section('content')

    <div id="titlebar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>My Properties</h2>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>My Properties</li>
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
            @include('profile.layouts.left_sidebar')

            <!-- Widget -->


            <div class="col-md-8">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="manage-table responsive-table">

                    <tr>
                        <th><i class="fa fa-file-text"></i> Property</th>
                        <th class="expire-date"><i class="fa fa-calendar"></i> Expiration Date</th>
                        <th></th>
                    </tr>
                    @foreach($properties as $property)
                    <tr>
                        <td class="title-container">
                            <img src="{{Storage::url($property->images->first()->image)}}" style="width: 120px !important;height: 100px !important;" alt="">
                            <div class="title">
                                <h4><a href="{{route('single.property',$property->id)}}">{{$property->title}}</a></h4>
                                <span>{{$property->address}}</span>

                                @if($property->status == "For Sale")
                                <span class="table-property-price">${{$property->price}}</span>
                                @else
                                <span class="table-property-price">${{$property->price}} / monthly</span>
                                @endif
                            </div>
                        </td>
                        <td class="expire-date" style="font-size: 16px">{{$property->expiration_date}}</td>
                        <td class="action">
                            <a href="{{route('property.edit', $property->id)}}"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="#"><i class="fa  fa-eye-slash"></i> Hide</a>
                            <form action="{{route('property.destroy', $property->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete" onclick="return confirmDelete()" style="background:none;padding:0;border:none; cursor:pointer;font-size: 15px">
                                    <i class="fa fa-remove" style="font-size: 15px"></i>

                                    Delete
                                </button>

                            </form>
                        </td>
                    </tr>
                    @endforeach


                </table>
                <a href="{{route('property.create')}}" class="margin-top-40 button">Submit New Property</a>
            </div>

        </div>
    </div>
    @include('layouts.footer')
    <script>
        function confirmDelete() {
            return confirm('Do you really want to delete?');
        }
    </script>
@endsection
