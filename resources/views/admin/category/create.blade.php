@extends('admin.inc.main')
@section('content')






<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">



                



				<!-- Content Header (Page header) -->
				<section class="content-header">
                    
                       

					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Create Category</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('category.index')}}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->

                    <div class="container">
                    @if(session('message'))
                        <div class="alert alert-success alert-dismissible fade show" style="background-color: #d4edda; color: #155724; border: none;" role="alert">
                            <strong>{{ session('message') }}</strong> 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <script>
                            // Automatically close the success message after 5 seconds
                            setTimeout(function() {
                                document.querySelector('.alert').classList.add('d-none'); // Hide the alert
                            }, 5000); // Adjust the time as needed
                        </script>
                    @endif
                    </div>
					<div class="container-fluid">
                        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="slug">Slug</label>
                                                <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="img">Choose Image</label>
                                                <input type="file" name="image" id="img" class="form-control" placeholder="Slug">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="status">Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option name="status" value="1">Active</option>
                                                    <option name="status" value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pb-5 pt-3">
                                <button class="btn btn-primary">Create</button>
                            </div>
                        </form>

					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->

@endsection