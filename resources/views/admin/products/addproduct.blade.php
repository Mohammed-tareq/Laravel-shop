@extends('layouts.admin.admin')

@push('css')
<style>
    .upload-container {
        width: 300px;
        margin: 0 auto;
        text-align: center;
        border: 2px dashed #ddd;
        padding: 20px;
        cursor: pointer;
    }

    .preview-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 20px;
    }

    .preview-item {
        position: relative;
        width: 100px;
        height: 100px;
        overflow: hidden;
        border: 1px solid #ccc;
    }

    .preview-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .delete-btn {
        position: absolute;
        top: 5px;
        right: 5px;
        background-color: red;
        color: white;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        width: 20px;
        height: 20px;
    }
</style>

@endpush

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Product</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('product.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title">Name</label>
                                            <input type="text" name="name" id="nameInput" class="form-control" placeholder="Title">
                                        </div>
                                        <input type="text" id="slugInput" name="slug" style="display: none;">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">

                                            <textarea name="description"  cols="88" rows="7" class="form-control" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                                <div class="card-body">
                                    <h2 class="h4 mb-3">Media</h2>
                                    <div class="upload-container" onclick="document.getElementById('file-input').click()">
                                        <p>Drop files here or click to upload.</p>
                                        <input type="file" id="file-input" name="image" multiple style="display: none;">
                                    </div>

                                    <div class="preview-container" id="preview-container">
                                        <!-- Preview images will appear here -->
                                    </div>
                                    
                                </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Pricing</h2>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="price">Price</label>
                                            <input type="text" name="price" id="price" class="form-control" placeholder="Price">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="compare_price">Compare at Price</label>
                                            <input type="text" name="oldprice" id="compare_price" class="form-control" placeholder="Compare Price">
                                            <p class="text-muted mt-3">
                                                To show a reduced price, move the product is original price into Compare at price. Enter a lower value into Price.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Inventory</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sku">SKU </label>
                                            <input type="text" name="sku" id="sku" class="form-control" placeholder="sku">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="barcode">Barcode</label>
                                            <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode">
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <h2 class="h4 mb-2">Track Quantity</h2>
                                        <div class="mb-2">
                                            <select name="trackqty" id="status" class="form-control">
                                                <option disabled selected>Select Track Quantity </option>
                                                @foreach ( $track as $t )
                                                <option @selected($track == $t) value=" {{ $t }} ">{{ $t }}</option>
                                                @endforeach

                                        </div>
                                        <div class="mb-3 mt-2">
                                            <input type="number" min="0" name="qty" id="qty" class="form-control" placeholder="Qty">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Product status</h2>
                                <div class="mb-3">
                                    <select name="status" id="status" class="form-control">
                                        <option disabled selected>Select Status </option>
                                        @foreach ( $status as $s )
                                        <option @selected($status == $s) value=" {{ $s }} ">{{ $s }}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h2 class="h4  mb-3">Product category</h2>
                                <div class="mb-3">
                                    <label for="category">Category</label>
                                    <select name="category_id" id="category" class="form-control">
                                        <option disabled selected>Select Category </option>
                                        @foreach ( $categories as $c )
                                            <option @selected($categories == $c) value="{{ $c->id }}"> {{ $c->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="category">Sub category</label>
                                    <select name="subcategory_id" id="sub_category" class="form-control">
                                        <option disabled selected>Select Sub category </option>
                                        @foreach ( $subcategories as $sc )
                                            <option @selected($subcategories == $sc) value="{{ $sc->id }}"> {{ $sc->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Product brand</h2>
                                <div class="mb-3">
                                    <select name="brand_id" id="status" class="form-control">
                                        <option disabled selected>Select Brand </option>
                                        @foreach ( $brands as $b )
                                            <option @selected($categories == $b) value="{{ $b->id }}"> {{ $b->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Featured product</h2>
                                <div class="mb-3">
                                    <select name="isfeatured" id="status" class="form-control">
                                        <option disabled selected>Select Featured </option>
                                        @foreach ( $featured as $f )
                                            <option @selected($featured == $f) value="{{ $f }}"> {{ $f }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pb-5 pt-3">
                    <button class="btn btn-primary" type="submit">Create</button>
                    <a href="{{ route('product.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
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
    const fileInput = document.getElementById('file-input');
const previewContainer = document.getElementById('preview-container');

fileInput.addEventListener('change', (event) => {
    const files = event.target.files;
    for (const file of files) {
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = (e) => {
                const previewItem = document.createElement('div');
                previewItem.classList.add('preview-item');

                const img = document.createElement('img');
                img.src = e.target.result;
                previewItem.appendChild(img);

                const deleteBtn = document.createElement('button');
                deleteBtn.classList.add('delete-btn');
                deleteBtn.textContent = 'X';
                deleteBtn.onclick = () => previewContainer.removeChild(previewItem);
                previewItem.appendChild(deleteBtn);

                previewContainer.appendChild(previewItem);
            };
            reader.readAsDataURL(file);
        }
    }
});
</script>


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

{{-- for slug input --}}
    <script>

        document.getElementById('nameInput').addEventListener('input', function() {
        const nameValue = this.value;
        const slugInput = document.getElementById('slugInput');

        // Update slug input with a 'slugified' version of the name
        slugInput.value = nameValue
            .toLowerCase()               // Convert to lowercase
            .replace(/[^a-z0-9]+/g, '-') // Replace non-alphanumeric characters with hyphens
            .replace(/^-+|-+$/g, '');    // Remove leading/trailing hyphens
        });
    </script>




@endpush
