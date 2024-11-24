@extends('dashboard.inc.master')

@section('title','SJAK Doc Share Blank')

@section('content')

        <div class="app-content pt-12 p-md-5 p-lg-8">
                <div class="app-card app-card-notification shadow-sm mb-8">
				    						
						<div class="container-fluid">
							<div class="row">
								<!-- Left Section - Form with Document Data -->
								<div class="col-md-4">
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
											<label for="description">Description</label>
											<textarea class="form-control" id="description" rows="9" disabled>{{ $document->description }}</textarea>
										</div>

										<div class="form-group">
											<label for="title"><b> Uploaded by {{ $document->uploader }} on {{ $document->uploaddatetime }}</b> </label>
											
										</div>
									</form>
								</div>

								<!-- Right Section - Display PDF -->
								<div class="col-md-8">
									<h3>Uploaded PDF</h3>
									<embed src="{{ asset('storage/' . $document->file_path) }}" type="application/pdf" width="100%" height="800px" />
								</div>
							</div>
						</div>			

				       
				    
				</div><!--//app-card-->
        </div>

@endsection