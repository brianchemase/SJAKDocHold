@extends('dashboard.inc.master')

@section('title','SJAK Doc Share Blank')

@section('content')

        <div class="app-content pt-3 p-md-3 p-lg-4">
                <div class="app-card app-card-notification shadow-sm mb-4">
				    
                    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">

                        <div class="row g-3 mb-4 align-items-center justify-content-between">
                            <div class="col-auto">
                                <h1 class="app-page-title mb-0">Uploaded submitions</h1>
                            </div>                            
                        </div>

							<div class="table-responsive">
								<table id="example" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th>No</th>
											<th>Title</th>
											<th>Amount</th>
											<th>Reference</th>
											<th>Description</th>
											<th>Uploaded By</th>
											<th>Upload Time</th>
											<th>Department</th>
											<th>File</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
											@foreach ($submissions as $submission)
												<tr>
													<td>{{ $submission->id }}</td>
													<td>{{ $submission->title }}</td>
													<td>{{ $submission->amount }}</td>
													<td>{{ $submission->ref }}</td>
													<td>{{ $submission->description }}</td>
													<td>{{ $submission->uploaded_by }}</td>
													<td>{{ $submission->upload_time }}</td>
													<td>{{ $submission->department }}</td>
													<td>
														<a href="{{ asset('storage/uploads/' . $submission->document_file) }}" target="_blank">View File</a>
													</td>
													<td>
														<!-- Add the View Details button with an icon -->
														<a href="{{ route('document.show', $submission->id) }}" class="btn btn-info btn-sm">
															<i class="fas fa-eye"></i> View Details
														</a>
													</td>
												</tr>
											@endforeach
										</tbody>
									<tfoot>
										<tr>
											<th>No</th>
											<th>Title</th>
											<th>Amount</th>
											<th>Reference</th>
											<th>Description</th>
											<th>Uploaded By</th>
											<th>Upload Time</th>
											<th>Department</th>
											<th>File</th>
											<th>Action</th>
										</tr>
									</tfoot>
								</table>
							</div><!--//table-responsive-->

				        </div><!--//row-->
				    </div><!--//app-card-header-->
				</div><!--//app-card-->
        </div>

@endsection