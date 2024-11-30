@extends('layouts.admin.admin')


@section('content')



	<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Eidt Category</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{ route('category.index') }}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<form action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label for="name">Name</label>
											<input type="text" value="{{ $category->name }}" name="name" id="name" class="form-control" placeholder="Name">
										</div>
									</div>

									<div class="col-md-6">
										<div class="mb-3">
											<label for="email">Slug</label>
											<input type="text" value="{{ $category->slug }}" name="slug" id="slug" class="form-control" placeholder="Slug">
										</div>
									</div>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h2 class="h4 mb-3">Media</h2>
                                            <div class="d-flex align-items-center">
                                                <input type="file" id="imageInput" accept="image/*" name="image" onchange="showImage(event)">
                                                <img id="previewImage" src="{{ $category->image  }}" style="max-width: 70px; height: auto;"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="category_id">Chosse Status</label>
                                        <select name="status" id="category_id"  class="form-control">

                                            @foreach ($status as  $s)
                                            <option @selected($category->status == $s) >{{ $s}}</option>
                                            @endforeach




                                        </select>
                                    </div>
								</div>
							</div>
						</div>
						<div class="pb-5 pt-3">
							<button class="btn btn-primary" type="submit">Edit</button>
							<button type="reset" href="#" class="btn btn-outline-dark ml-3">Cancel</button>
						</div>
                        </form>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
</div>




@endsection

@push('js')


    <script>
        function showImage(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
            const previewImage = document.getElementById('previewImage');
            previewImage.src = e.target.result;
            previewImage.style.display = 'block'; // Make the image visible
            };

            reader.readAsDataURL(input.files[0]); // Read the file as a data URL
        }
        }
    </script>

@endpush





