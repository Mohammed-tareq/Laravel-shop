@extends('layouts.admin.admin')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sub Category</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('subcategory.create') }}" class="btn btn-primary">New Sub Category</a>
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
                            <button onclick="window.location.href='{{ route('subcategory.index') }}'" class="btn btn-default btn-small" type="reset">Reset</button>
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
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Category</th>
                                <th width="100">Status</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($subcategories->isNotEmpty())

                                @foreach ($subcategories as $subcategory )

                                    <tr>
                                        <td>{{ $subcategory->id }}</td>
                                        <td>{{ $subcategory->name }}</td>
                                        <td>{{ $subcategory->slug }}</td>
                                        <td>
                                            @if($subcategory->category->status=='active')
                                                <svg class="text-success-500 h-6 w-6 text-success" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            @else
                                                <svg class="text-danger h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            @endif
                                            {{ $subcategory->category->name }}
                                        </td>
                                        <td>
                                            @if($subcategory->status=='active')
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
                                                    <a href="{{ route('subcategory.edit', $subcategory->id) }}" class="btn">
                                                        <i class="fa fa-edit text-success"></i>
                                                    </a>
                                                    <form action="{{ route('subcategory.destroy' , $subcategory->id)   }}" method="post">
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
                <div class="card-footer clearfix">
                    <ul class="pagination pagination m-0 float-right">
                      {{ $subcategories->links() }}
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>



@endsection
