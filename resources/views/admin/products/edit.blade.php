@extends('layouts.admin.admin')



@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Product</h1>
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
            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title">Name</label>
                                            <input type="text" name="name" value="{{ $product->name }}" id="nameInput" class="form-control" placeholder="Title">
                                        </div>
                                        <input type="text" id="slugInput" value="{{ $product->slug }}" name="slug" style="display: none;">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">

                                            <textarea name="description"  cols="88" rows="7" class="form-control" placeholder="Description">{{ $product->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Media</h2>
                                <div class="d-flex align-items-center">
                                    <input type="file" id="imageInput" accept="image/*" name="image" onchange="showImage(event)">
                                    <img id="previewImage" src="{{ $product->image  }}" style="max-width: 70px; height: auto;"/>
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
                                            <input type="text" value="{{ $product->price }}" name="price" id="price" class="form-control" placeholder="Price">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="compare_price">Compare at Price</label>
                                            <input type="text" value="{{ $product->oldprice }}" name="oldprice" id="compare_price" class="form-control" placeholder="Compare Price">
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
                                            <input type="text" name="sku" value="{{ $product->sku }}" id="sku" class="form-control" placeholder="sku">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="barcode">Barcode</label>
                                            <input type="text" name="barcode" value="{{ $product->barcode }}" id="barcode" class="form-control" placeholder="Barcode">
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <h2 class="h4 mb-2">Track Quantity</h2>
                                        <div class="mb-2">
                                            <select name="trackqty" id="status" class="form-control">
                                                <option disabled selected>Select Track Quantity </option>
                                                @foreach ( $track as $t )
                                                <option @selected($product->trackqty == $t) value=" {{ $t }} ">{{ $t }}</option>
                                                @endforeach

                                        </div>
                                        <div class="mb-3 mt-2">
                                            <input type="number" min="0" value="{{ $product->qty }}" name="qty" id="qty" class="form-control" placeholder="Qty">
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
                                        <option @selected($product->status == $s) value=" {{ $s }} " >{{ $s }}</option>

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
                                            <option @selected($product->category_id == $c->id) value="{{ $c->id }}"> {{ $c->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="category">Sub category</label>
                                    <select name="subcategory_id" id="sub_category" class="form-control">
                                        <option disabled selected>Select Sub category </option>
                                        @foreach ( $subcategories as $sc )
                                            <option @selected($product->subcategory_id == $sc->id) value="{{ $sc->id }}"> {{ $sc->name }} </option>
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
                                            <option @selected($product->brand_id == $b->id) value="{{ $b->id }}"> {{ $b->name }} </option>
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
                                        <option disabled selected>Select Featured product </option>

                                        @foreach ( $featured as $f )
                                            <option @selected($product->isfeatured == $f) value="{{ $f }}"> {{ $f }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pb-5 pt-3">
                    <button class="btn btn-primary" type="submit">Edit</button>
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
