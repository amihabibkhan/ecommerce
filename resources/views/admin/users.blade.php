@extends('layouts.app')

@section('page_title') Users @endsection

@section('main_content')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-heading bg-purple">
                    <h3 class="card-title text-white">User List</h3>
                </div>
                <div class="card-body">
                    <table class="table text-center table-bordered">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                        @forelse($users as $single_user)
                            <tr>
                                <td>{{ $single_user->name }}</td>
                                <td>{{ $single_user->email }}</td>
                                <td>{{ $single_user->phone }}</td>
                                <td><x-user-role :role="$single_user->role_id" /></td>
                                <td>
                                    @if($single_user->id != auth()->id())
                                        <a href="#update_user{{ $single_user->id }}" class="btn btn-primary waves-effect waves-light m-r-5" data-animation="push" data-plugin="custommodal"
                                           data-overlaySpeed="100" data-overlayColor="#36404a"><i class="far fa-edit"></i></a>

                                        <a href="{{ route('manage_user.show', $single_user->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this user?')"><i class="fas fa-trash"></i></a>

                                        <!-- Update Modal -->
                                        <div id="update_user{{ $single_user->id }}" class="modal-demo text-left">
                                            <button type="button" class="close" onclick="Custombox.close();">
                                                <span>&times;</span><span class="sr-only">Close</span>
                                            </button>
                                            <h4 class="custom-modal-title">Update User Info</h4>
                                            <div class="custom-modal-text">
                                                <form action="{{ route('manage_user.update', $single_user->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <select name="role_id" class="form-control">
                                                            <option disabled selected>Select User Type</option>
                                                            <option {{ $single_user->role_id == 2 ? 'selected' : '' }} value="2">Manager</option>
                                                            <option {{ $single_user->role_id == 4 ? 'selected' : '' }} value="4">Editor</option>
                                                            <option {{ $single_user->role_id == 3 ? 'selected' : '' }} value="3">General User</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" value="{{ $single_user->name }}" class="form-control" placeholder="Name" name="name">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="number" value="{{ $single_user->phone }}" class="form-control" placeholder="Phone Number" name="phone">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" value="{{ $single_user->email }}" placeholder="Email Address" name="email">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" placeholder="Change Password" name="password">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" placeholder="Confirm New Password" name="password_confirmation">
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-success">Update User</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5">No Data Found</td></tr>
                        @endforelse
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-heading bg-purple">
                    <h3 class="card-title text-white">Add User</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('manage_user.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <select name="role_id" class="form-control">
                                <option disabled selected>Select User Type</option>
                                <option value="2">Manager</option>
                                <option value="4">Editor</option>
                                <option value="3">General User</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name" name="name">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Phone Number" name="phone">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email Address" name="email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Create User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

