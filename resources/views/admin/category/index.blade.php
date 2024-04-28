@extends('admin.inc.main')
@section('content')
<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Categories</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('category.create')}}" class="btn btn-primary">New Category</a>
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
						<div class="card">
							<div class="card-header">
								<div class="card-tools">
									<div class="input-group input-group" style="width: 250px;">
										<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
					
										<div class="input-group-append">
										  <button type="submit" class="btn btn-default">
											<i class="fas fa-search"></i>
										  </button>
										</div>
									  </div>
								</div>
							</div>
							<div class="card-body table-responsive p-0">								
								<table class="table table-hover text-nowrap">
									<thead>
										<tr>
											<th width="60">SN</th>
											<th width="100">Name</th>
											<th width="100">Slug</th>
                                            <th>Image</th>
											<th width="100">Status</th>
											<th width="200">Action</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach ($categories as $category )
                                        <tr>
											<td>{{$category->id}}</td>
											<td>{{$category->name}}</td>
											<td>{{$category->slug}}</td>
                                            <td>
                                                <a href="{{ asset ('uploads/'. $category->image)}} " target="_blank">
                                                <img src="{{ asset ('uploads/'. $category->image)}}" alt="img" width="50px" height="50px"> <a>
                                            </td>
											<td>
												@if($category->status==1)

												<svg class="text-success-500 h-6 w-6 text-success" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
													<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
												</svg>
												@elseif($category->status==0)
												<svg class="text-danger h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
													<path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
												</svg>
												@endif

											</td>
											<td>
												<a href="{{route('category.edit',$category->id)}}">
                                                <i class="fa-regular fa-pen-to-square"></i>
    
												</a>
                                                <a href="{{route('category.show', $category->id)}}">
                                                    <i class="fa-sharp fa-regular fa-eye"></i>

                                                </a>

												<a href="\"  data-bs-toggle="modal" data-bs-target="#exampleModal{{$category->id}}"> <i class="fa-solid fa-trash"></i> </a>



												<!-- Modal -->
												<div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog ">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																Are you sure ?
															</div>
															<div class="modal-footer">

																<form action="{{route('category.destroy', $category->id)}}" method="POST" enctype="multipart/form-data">
																	@csrf
																	@method('delete')

																	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
																	<button type="submit" class="btn btn-danger">Yes</button>
																</form>
															</div>
														</div>
													</div>
												</div>
											</td>
										</tr>



                                            
                                        @endforeach
										
										
											
										
									</tbody>
								</table>
                                
                                										
							</div>
                            
                           
							<div class="card-footer clearfix ">
								
                                {{$categories->links()}}
				
							</div>
                            
						</div>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
			</div>


@endsection