@include('admin.layouts.header')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">User List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Users</h3>
                        </div>
                        <div class="card-body">
                            <!-- Search Form -->
                            <form method="GET" action="{{route('admin.users.search')}}" class="mb-3">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>About</th>
                                            <th>Created At</th>
                                            <th>Action</th>

                                        </tr>
                                        <tr>
                                            <th>
                                                <input type="text" name="search_id" class="form-control form-control-sm" placeholder="Search ID" value="{{ request()->get('search_id') }}">
                                            </th>
                                            <th>
                                                <input type="text" name="search_name" class="form-control form-control-sm" placeholder="Search Name" value="{{ request()->get('search_name') }}">
                                            </th>
                                            <th>
                                                <input type="text" name="search_email" class="form-control form-control-sm" placeholder="Search Email" value="{{ request()->get('search_email') }}">
                                            </th>
                                            <th>
                                                <input type="text" name="search_phone" class="form-control form-control-sm" placeholder="Search Phone" value="{{ request()->get('search_phone') }}">
                                            </th>
                                            <th>
                                            </th>
                                            <th>
                                                <input type="date" name="search_date" class="form-control form-control-sm"  placeholder="Search by Date" value="{{ request()->get('search_date') }}">
                                            </th>
                                            <th>
                                                <button type="submit" class="btn btn-primary btn-sm">Search</button>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->userInfo->phone ?? 'N/A' }}</td>
                                                <td>{{ $user->userInfo->about ?? 'N/A' }}</td>
                                                <td>{{ $user->created_at->format('m-d-Y') }}</td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </form>

                            <div class="card-footer clearfix">
                                <div class="float-right">
                                    {{ $users->links('vendor.pagination.bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('admin.layouts.footer')
