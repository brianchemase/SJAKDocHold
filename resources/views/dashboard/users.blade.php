@extends('dashboard.inc.master')

@section('title','SJAK Doc Share Blank')

@section('content')


    <div class="app-content pt-3 p-md-3 p-lg-4">


                <div class="app-card app-card-notification shadow-sm mb-4">	
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif			    
                    <div class="app-card-header px-4 py-3">
                    <div>
                        <!-- Button to open modal -->
                                <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#registerUserModal">Register New User</button>
                                
                                <!-- Modal for registering a new user -->
                                @include('dashboard.modals.usersmodal')

                    </div>
                    </div>
                </div>

                <div class="app-card app-card-notification shadow-sm mb-4">				    
                    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
                            <div class="row g-3 mb-4 align-items-center justify-content-between">
                                <div class="col-auto">
                                    <h1 class="app-page-title mb-0">Users Management</h1>
                                </div>                            
                            </div>

							<div class="table-responsive">
								<table id="example" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Role</th>
                                            <th>Actions</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>
                                                    @if ($user->role === "initiator")
                                                        Initiator
                                                    @elseif ($user->role === "approver")
                                                        Approver                                                    
                                                    @elseif ($user->role === "admin")
                                                       System Admin
                                                    @else
                                                        Unassigned
                                                    @endif
                                                </td>
                                                <td>
                                                    <button 
                                                        class="btn btn-primary btn-sm" 
                                                        onclick="showEditUserModal({{ $user }})"
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#editUserModal"
                                                    >
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-warning btn-sm" onclick="resetPassword({{ $user->id }})">Reset Password</button>
                                                    <button class="btn btn-danger btn-sm" onclick="deleteUser({{ $user->id }})">Delete</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
									<tfoot>
										<tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Role</th>
                                            <th>Actions</th>
										</tr>
									</tfoot>
								</table>
							</div><!--//table-responsive-->

				        </div><!--//row-->
				    </div><!--//app-card-header-->
				</div><!--//app-card-->
        </div>




<script>
    function editUser(user) {
        // Logic to open a modal and edit the user details
        alert('Edit User: ' + user.name);
    }

    function resetPassword(userId) {
        if (confirm('Are you sure you want to reset the password for this user?')) {
            // Send a request to reset password
            alert('Password reset for user ID: ' + userId);
        }
    }

    function deleteUser(userId) {
        if (confirm('Are you sure you want to delete this user?')) {
            // Send a request to delete user
            alert('User with ID ' + userId + ' deleted');
        }
    }
</script>

<script>
    function resetPassword(userId) {
    if (confirm('Are you sure you want to reset the password for this user?')) {
        fetch(`/users/${userId}/reset-password`, {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => alert(data.message || 'Password reset successfully.'))
        .catch(error => console.error('Error:', error));
    }
}

function deleteUser(userId) {
    if (confirm('Are you sure you want to delete this user?')) {
        fetch(`/users/${userId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => alert(data.message || 'User deleted successfully.'))
        .catch(error => console.error('Error:', error));
    }
}

</script>
@endsection
