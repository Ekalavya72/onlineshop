@extends('admin.inc.main')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">



                



				<!-- Content Header (Page header) -->
				<section class="content-header">
                    
                       

					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Show Brand </h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('brand.index')}}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->

                    
					<div class="container-fluid">
                        <div class="card">
                            <div class="card-body">								
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <strong>Brand's Name:</strong> {{ $brands->name }}
                                        </div>
                                        <div class="mb-3">
                                            <strong>Brand's Slug:</strong> {{ $brands->slug }}
                                        </div>
                                        <div class="mb-3">
                                            <strong>Status:</strong> {{ $brands->status }}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card h-100 shadow-sm">
                                            <div class="card-body">
                                                <img src="{{ asset('uploads/brand/image/' . $brands->image) }}" alt="img" class="img-fluid" style="max: width: 5000px; height: auto;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
        



@endsection