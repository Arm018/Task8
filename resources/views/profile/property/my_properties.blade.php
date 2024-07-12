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
                                <h4><a href="#">{{$property->title}}</a></h4>
                                <span>{{$property->address}}</span>
                                <span class="table-property-price">${{$property->price}} / monthly</span>
                            </div>
                        </td>
                        <td class="expire-date" style="font-size: 16px">{{$property->timeFormat($property)}}</td>
                        <td class="action">
                            <a href="#"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="#"><i class="fa  fa-eye-slash"></i> Hide</a>
                            <a href="#" class="delete"><i class="fa fa-remove"></i> Delete</a>
                        </td>
                    </tr>
                    @endforeach


                </table>
                <a href="{{route('profile.property')}}" class="margin-top-40 button">Submit New Property</a>
            </div>

        </div>
    </div>

@endsection
