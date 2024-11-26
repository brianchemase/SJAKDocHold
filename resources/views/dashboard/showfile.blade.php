@extends('dashboard.inc.master')

@section('title','SJAK Doc Share Blank')

@section('content')

        <div class="app-content pt-12 p-md-5 p-lg-8">
                <div class="app-card app-card-notification shadow-sm mb-8">
				    						
						<div class="container-fluid">
							@if(session('status'))
								<div class="alert alert-success">
									{{ session('status') }}
								</div>
							@endif
							<div class="row">								

								<div class="col-md-4">
									<h3>Document Details</h3>
									<table class="table table-bordered">
									<tr>
										<th scope="row">Title</th>
										<td>{{ $document->title }}</td>
									</tr>

									<tr>
										<th scope="row">Amount</th>
										<td>{{ $document->amount }}</td>
									</tr>

									<tr>
										<th scope="row">Department</th>
										<td>{{ $document->department }}</td>
									</tr>

									<tr>
										<th scope="row">Reference Number</th>
										<td>{{ $document->ref }}</td>
									</tr>

									<tr>
										<th scope="row">Status</th>
										<td>
											<span class="badge 
												@if($document->status == 'approved') 
													badge-success 
												@elseif($document->status == 'rejected') 
													badge-danger 
												@elseif($document->status == 'pending') 
													badge-warning 
												@else 
													badge-secondary 
												@endif">
												{{ $document->status }}
											</span>
										</td>
									</tr>

									<tr>
										<th scope="row">Description</th>
										<td>{{ $document->description }}</td>
									</tr>

									<tr>
										<th scope="row">Uploaded By</th>
										<!-- <td><b>{{ $document->uploaded_by }} on {{ $document->upload_time }}</b></td> -->
										<td><b>{{ $document->uploaded_by }} on {{ \Carbon\Carbon::parse($document->upload_time)->format('j F, Y, g:i A') }}</b></td>
									</tr>
									</table>

									<h2>Action Trail</h2>

									@if(session('status'))
										<div class="alert alert-success">
											{{ session('status') }}
										</div>
									@endif

								<div class="list-group">
									@foreach($actions as $action)
									<div class="list-group-item">
										<h5 class="mb-1">{{ ucfirst($action->action) }}</h5> <!-- Display the action (Approve/Return) -->
										<p class="mb-1"><strong>User:</strong> {{ $action->user_name }}</p> <!-- Display user name -->
										<p class="mb-1"><strong>Comment:</strong> {{ $action->comment ?? 'No comment' }}</p>
										<small><strong>Date and Time:</strong> {{ \Carbon\Carbon::parse($action->actiontime)->format('Y-m-d H:i:s') }}</small>
									</div>
									<hr>
									@endforeach
								</div>
								
								@if(Auth::user()->role == 'approver' || Auth::user()->role == 'admin')						
									<div class="container">
										<!-- Button to open modal -->
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#approveModal">
												Approve
											</button>
											<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#returnModal">
												Return
											</button>
											@include('dashboard.modals.action')
										<br>
										<br>
									</div>
								@endif


								</div>
								

								<!-- Right Section - Display PDF -->
								<div class="col-md-8">
									<h3>Uploaded PDF</h3>
									<embed src="{{ asset('storage/' . $document->document_file) }}" type="application/pdf" width="100%" height="1200px" />
								</div>
							</div>
						</div>					       
				    
				</div>
        </div>

@endsection