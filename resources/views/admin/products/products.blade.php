@extends('layouts.admin.admin')


@section('content')

@if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif

                                    @if (session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ session('error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('product.create') }}" class="btn btn-primary">New Product</a>
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
                <form action="#" method="get">
                    <div class="card-header">
                        <div class="card-title">
                            <button onclick="window.location.href='{{ route('product.index') }}'" class="btn btn-default btn-small" type="reset">Reset</button>
                        </div>
                        <div class="card-tools">
                            <div class="input-group input-group" style="width: 250px;">
                                <input value="{{ Request::get('keyword') }}"  type="text" name="keyword" class="form-control float-right" placeholder="Search By Name">

                                <div class="input-group-append">
                                  <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                  </button>
                                </div>
                              </div>
                        </div>
                    </div>
                </form>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th width="60">ID</th>
                                <th width="80"></th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>SKU</th>
                                <th>Category</th>
                                <th width="100">Status</th>
                                <th width="100">Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            @if($products->isNotEmpty())
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td><img src="{{ $product->image }}" class="img-thumbnail" width="50" height="40" ></td>
                                        <td><a href="#">{{ $product->name }}</a></td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->qty }}</td>
                                        <td>{{ $product->sku  }}</td>
                                        <td>
                                            @if($product->category->status=='active')
                                                <svg class="text-success-500 h-6 w-6 text-success" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            @else
                                                <svg class="text-danger h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            @endif
                                            {{ $product->category->name }}
                                        </td>
                                        <td>
                                            @if($product->status=='active')
                                                <svg class="text-success-500 h-6 w-6 text-success" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            @else
                                                <svg class="text-danger h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            @endif
                                        </td>
                                        <td>
                                            <div class=" d-flex ">
                                                <a href="{{ route('product.edit', $product->id) }}" class="btn">
                                                    <i class="fa fa-edit text-success"></i>
                                                </a>
                                                <form action="{{ route('product.destroy' , $product->id)   }}" method="post">
                                                    @csrf
                                                    @method('delete')

                                                    <button  class="text-danger btn" type="submit">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">Record Not Found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                {{-- <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {{ $products->links() }}
                    </ul>
                </div> --}}
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>



@endsection
