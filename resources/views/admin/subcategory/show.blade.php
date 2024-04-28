@extends('admin.inc.main')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">



                



				<!-- Content Header (Page header) -->
				<section class="content-header">
                    
                       

					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Show SubCategory </h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('subcategory.index')}}" class="btn btn-primary">Back</a>
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
                                            <strong>Category Name:</strong> {{ $subcategories->category->name }}
                                        </div>
                                        <div class="mb-3">
                                            <strong>Category Slug:</strong> {{ $subcategories->category->slug }}
                                        </div>
                                        <div class="mb-3">
                                            <strong>Category Status:</strong> {{ $subcategories->category->status }}
                                        </div>
                                        <div class="mb-3">
                                            <strong>SubCategory Name:</strong> {{ $subcategories->name }}
                                        </div>
                                        <div class="mb-3">
                                            <strong>SubCategory Slug:</strong> {{ $subcategories->slug }}
                                        </div>
                                        
                                        <div class="mb-3">
                                            <strong>SubCategory Status:</strong> {{ $subcategories->status }}
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card h-100 shadow-sm">
                                            <div class="card-body">
                                                <img src="{{ asset('uploads/' . $subcategories->category->image) }}" alt="img" class="img-fluid" style="max: width: 5000px; height: auto;">
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