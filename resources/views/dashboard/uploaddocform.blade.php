@extends('dashboard.inc.master')

@section('title','SJAK Doc Share Blank')

@section('content')

        <div class="app-content pt-3 p-md-3 p-lg-4">
                <div class="app-card app-card-notification shadow-sm mb-4">
				    
                    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">

						@if(session('success'))
							<div class="alert alert-success">
								{{ session('success') }}
							</div>
						@endif

						@if(session('error'))
							<div class="alert alert-danger">
								{{ session('error') }}
							</div>
						@endif

                        <div class="row g-3 mb-4 align-items-center justify-content-between">
                            <div class="col-auto">
                                <h1 class="app-page-title mb-0">Document File Upload</h1>
                            </div>                            
                        </div>
						
						<div class="app-card-header px-4 py-3">
							<div class="row g-3 align-items-center">
								<form method="POST" action="{{ route('document.upload') }}" enctype="multipart/form-data">
									@csrf
									<div class="form-row">
										<!-- Title of the document -->
										<div class="form-group col-md-6">
											<label for="documentTitle">Title of the Document</label>
											<input type="text" class="form-control" id="documentTitle" name="title" placeholder="Enter Document Title" required>
										</div>
										
										<!-- Amount -->
										<div class="form-group col-md-6">
											<label for="amount">Amount</label>
											<input type="number" class="form-control" id="amount" name="amount" placeholder="Amount" required>
										</div>
									</div>

									<div class="form-group">
										<!-- Description -->
										<label for="description">Description</label>
										<textarea class="form-control" id="description" name="description" rows="4" placeholder="Describe the document" required></textarea>
									</div>

									<div class="form-row">
										<!-- Date and Time (auto-generated) -->
										<div class="form-group col-md-6">
											<label for="uploadDateTime">Date and Time</label>
											<input type="text" class="form-control" id="uploadDateTime" name="upload_time" value="{{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}" readonly>
										</div>
										
										<!-- Person uploading (can be the authenticated user's name) -->
										<div class="form-group col-md-6">
											<label for="uploadedBy">Person Uploading</label>
											<input type="text" class="form-control" id="uploadedBy" name="uploaded_by" value="{{ Auth::user()->name }}" readonly>
											<input type="hidden" class="form-control" id="uploadedBy" name="userid" value="{{ Auth::user()->id }}">
										</div>
									</div>

									<div class="form-group">
										<!-- File Attachment (PDF) -->
										<label for="documentFile">Attach Document (PDF)</label>
										<input type="file" class="form-control-file" id="documentFile" name="document_file" accept="application/pdf" required>
									</div>

									<div class="form-group">
										<!-- Department requesting -->
										<label for="department">Department</label>
										<select id="department" class="form-control" name="department" required>
											<option selected>Choose...</option>
											<option value="supplies">Shop</option>
											<option value="Marketing">Marketing</option>
											<option value="Finance">Finance</option>
											<option value="HR">HR</option>
											<option value="ICT">ICT</option>
											<option value="Admin">Administration</option>
											<option value="Training">Training</option>
											<option value="EMS">EMS Department</option>
											<option value="Volunteers">Volunteers/Brigade</option>
											<!-- Add more departments as needed -->
										</select>
									</div>

									<button type="submit" class="btn btn-primary">Submit</button>
								</form>
							</div>
						</div>						

				        </div><!--//row-->
				    </div><!--//app-card-header-->
				</div><!--//app-card-->
        </div>

@endsection