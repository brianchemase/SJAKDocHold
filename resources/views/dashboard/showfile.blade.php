@extends('dashboard.inc.master')

@section('title','SJAK Doc Share Blank')

@section('content')

        <div class="app-content pt-12 p-md-5 p-lg-8">
                <div class="app-card app-card-notification shadow-sm mb-8">
				    						
						<div class="container-fluid">
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
								</div>
								<!-- <div class="col-md-6">
									<h3>Document Details</h3>
									<form>
										<div class="form-group">
											<label for="title">Title</label>
											<input type="text" class="form-control" id="title" value="{{ $document->title }}" disabled>
										</div>

										<div class="form-group">
											<label for="title">Amount</label>
											<input type="text" class="form-control" id="amount" value="{{ $document->amount }}" disabled>
										</div>


										<div class="form-group">
											<label for="title">Department</label>
											<input type="text" class="form-control" id="department" value="{{ $document->department }}" disabled>
										</div>

										<div class="form-group">
											<label for="title">Reference Number</label>
											<input type="text" class="form-control" id="reference" value="{{ $document->ref }}" disabled>
										</div>

										

										<div class="form-group">
											<label for="status">Status</label>
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
										</div>
																				
										<div class="form-group">
											<label for="description">Description</label>
											<textarea class="form-control" id="description" rows="9" disabled>{{ $document->description }}</textarea>
										</div>

										<div class="form-group">
											<label for="title"><b> Uploaded by {{ $document->uploaded_by }} on {{ $document->upload_time }}</b> </label>
											
										</div>
									</form>
								</div> -->

								<!-- Right Section - Display PDF -->
								<div class="col-md-8">
									<h3>Uploaded PDF</h3>
									<embed src="{{ asset('storage/' . $document->document_file) }}" type="application/pdf" width="100%" height="800px" />
								</div>
							</div>
						</div>					       
				    
				</div>
        </div>

@endsection