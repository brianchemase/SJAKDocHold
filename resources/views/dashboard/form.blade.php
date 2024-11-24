@extends('dashboard.inc.master')

@section('title','SJAK Doc Share Blank')

@section('content')

        <div class="app-content pt-3 p-md-3 p-lg-4">
                <div class="app-card app-card-notification shadow-sm mb-4">
				    
                    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">

                        <div class="row g-3 mb-4 align-items-center justify-content-between">
                            <div class="col-auto">
                                <h1 class="app-page-title mb-0">Form Title</h1>
                            </div>                            
                        </div>
						
							<div class="app-card-header px-4 py-3">
								<div class="row g-3 align-items-center">

									<form>
										<div class="form-row">
										<div class="form-group col-md-6">
											<label for="inputEmail4">Email</label>
											<input type="email" class="form-control" id="inputEmail4" placeholder="Email">
										</div>
										<div class="form-group col-md-6">
											<label for="inputPassword4">Password</label>
											<input type="password" class="form-control" id="inputPassword4" placeholder="Password">
										</div>
										</div>
										<div class="form-group">
										<label for="inputAddress">Address</label>
										<input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
										</div>
										<div class="form-group">
										<label for="inputAddress2">Address 2</label>
										<input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
										</div>
										<div class="form-row">
										<div class="form-group col-md-6">
											<label for="inputCity">City</label>
											<input type="text" class="form-control" id="inputCity">
										</div>
										<div class="form-group col-md-4">
											<label for="inputState">State</label>
											<select id="inputState" class="form-control">
											<option selected>Choose...</option>
											<option>...</option>
											</select>
										</div>
										<div class="form-group col-md-2">
											<label for="inputZip">Zip</label>
											<input type="text" class="form-control" id="inputZip">
										</div>
										</div>
										<div class="form-group">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" id="gridCheck">
											<label class="form-check-label" for="gridCheck">
											Check me out
											</label>
										</div>
										</div>
										<button type="submit" class="btn btn-primary">Sign in</button>
									</form>
								</div><!--//row-->
							</div><!--//app-card-header-->							

				        </div><!--//row-->
				    </div><!--//app-card-header-->
				</div><!--//app-card-->
        </div>

@endsection