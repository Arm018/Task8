@extends('layouts.app')

@section('content')

    <div id="titlebar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>My Favorite Properties</h2>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>My Favorites</li>
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
                    @forelse($favorites as $favorite)
                        <tr>
                            <td class="title-container">
                                <img src="{{ Storage::url($favorite->property->images->first()->image) }}"
                                     style="width: 120px !important; height: 100px !important;" alt="">
                                <div class="title">
                                    <h4>
                                        <a href="{{ route('single.property', $favorite->property->id) }}">{{ $favorite->property->title }}</a>
                                    </h4>
                                    <span>{{ $favorite->property->address }}</span>

                                    @if($favorite->property->status == "For Sale")
                                        <span class="table-property-price">${{ $favorite->property->price }}</span>
                                    @else
                                        <span
                                            class="table-property-price">${{ $favorite->property->price }} / monthly</span>
                                    @endif
                                </div>
                            </td>
                            <td class="expire-date"
                                style="font-size: 16px">{{ $favorite->property->expiration_date ? $favorite->property->expiration_date : 'N/A' }}</td>
                            <td class="action">
                                <form action="{{route('favorite.destroy', $favorite->property->id)}}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete" onclick="return confirmDelete()"
                                            style="background:none;padding:0;border:none; cursor:pointer;font-size: 15px">
                                        <i class="fa fa-remove" style="font-size: 15px"></i>
                                        Remove
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" style="font-size: 16px">You have no favorite properties.</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>

    @include('layouts.footer')

    <script>
        function confirmDelete() {
            return confirm('Do you really want to remove this property from your favorites?');
        }
    </script>
@endsection
