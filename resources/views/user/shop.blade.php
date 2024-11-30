@extends('layouts.user.user')






@section('content')

<main>
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Shop</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="section-6 pt-5">
        <div class="container">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-3 sidebar">
                    <!-- Categories -->
                    <div class="sub-title">
                        <h2>Categories</h2>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="accordion accordion-flush" id="categoriesAccordion">
                                @foreach ($categories as $key => $category)
                                <div class="accordion-item">
                                        @if($category->subcategory->isNotEmpty())
                                        <h2 class="accordion-header" id="heading-{{ $key }}">
                                                <button class="accordion-button collapsed {{ ($categoryselected == $category->id ? 'text-primary' : '') }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $key }}" aria-expanded="false" aria-controls="collapse-{{ $key }}">
                                                    {{ $category->name }}
                                                </button>
                                            @else
                                            <a href="{{ route('user.shop', $category->name ) }}" class="nav-item nav-link {{ ($categoryselected == $category->id ? 'text-primary' : '') }}">{{ $category->name }}</a>
                                            @endif
                                        </h2>
                                        @if($category->subcategory->isNotEmpty())
                                            <div id="collapse-{{ $key }}" class="accordion-collapse collapse {{ ($categoryselected == $category->id ? 'show':'') }}" aria-labelledby="heading-{{ $key }}" data-bs-parent="#categoriesAccordion">
                                                <div class="accordion-body">
                                                    <ul class="list-unstyled">
                                                        @foreach ($category->subcategory as $sub)
                                                            <li><a href="{{ route('user.shop', [$category->name, $sub->name] ) }}" class="nav-link {{ ($subcategoryselected == $sub->id ? 'text-primary' : '') }}">{{ $sub->name }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Brands -->
                    <div class="sub-title mt-5">
                        <h2>Brand</h2>
                    </div>
                    <div class="card">

                        <div class="card-body">
                                @foreach ($brands as $brand)
                                    <div class="form-check mb-2">
                                        <input {{ in_array($brand->id, $brandArray) ? 'checked' : '' }} class="form-check-input brand-label" type="checkbox" name="brand[]" value="{{ $brand->id }}" id="brand-{{ $brand->id }}">
                                        <label class="form-check-label" for="brand-{{ $brand->id }}">{{ $brand->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                    </div>

                    <!-- Price Range -->
                    <div class="sub-title mt-5">
                        <h2>Price</h2>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            @php
                                $prices = ['0-100', '100-200', '200-500', '500-'];
                            @endphp
                            @foreach ($prices as $price)
                                <div class="form-check mb-2">
                                    <input {{ in_array($price, $priceArray) ? 'checked' : '' }} class="form-check-input price-label" type="checkbox" name="price[]" value="{{ $price }}" id="price-{{ $price }}">
                                    <label class="form-check-label" for="price-{{ $price }}">
                                        @if ($price == '500-')
                                            $500+
                                        @else
                                            ${{ explode('-', $price)[0] }}-${{ explode('-', $price)[1] }}
                                        @endif
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="col-md-9">
                    {{-- <div class="d-flex justify-content-end mb-4">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="sortingDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                Sorting
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="sortingDropdown">
                                <li><a class="dropdown-item" href="">Latest</a></li>
                                <li><a class="dropdown-item" href="">Price High</a></li>
                                <li><a class="dropdown-item" href="">Price Low</a></li>
                            </ul>
                        </div>
                    </div> --}}
                    <div class="row">
                        @forelse ($products as $product)

                            <div class="col-md-4">
                                <div class="card product-card">
                                    <div class="product-image position-relative">
                                        <a href="" class="product-img"><img class="card-img-top" src="{{ $product->image }}" alt="" height="200" width="200"></a>
                                        <a class="whishlist" href="222"><i class="far fa-heart"></i></a>

                                        <div class="product-action">
                                            <a class="btn btn-dark" href="#">
                                                <i class="fa fa-shopping-cart"></i> Add To Cart
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body text-center mt-3">
                                        <a class="h6 link" href="product.php">{{ $product->name }}</a>
                                        <div class="price mt-2">
                                            <span class="h5"><strong>$ {{ $product->price }}</strong></span>
                                            @if (!empty($product->oldprice))
                                            <span class="h6 text-underline"><del>${{ $product->oldprice }}</del></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center">No products available.</p>
                        @endforelse
                    </div>
                    <div class="d-flex justify-content-end">
                        <ul class="pagination pagination m-0 float-right">

                            {{ $products->links() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


@endsection




@push('js')


{{-- <script>
    $(".brand-label").change(function(){
        apply_filters();

    });
    function apply_filters(){
        var brands = [];
        $(".brand-label:checked").each(function(){
            brands.push($(this).val());

        });
        console.log(brands.toString());

        var url = '{{ url()->current() }}';

        window.location.href = url + '?brands=' + brands.toString();

    }
</script> --}}

{{-- <script>
    $(".brand-label, .price-label").change(function(){
        apply_filters();
        });
        function apply_filters(){
            var brands = []; var prices = []; $(".brand-label:checked").each(function(){
                brands.push($(this).val());
            });
            $(".price-label:checked").each(function(){
                    prices.push($(this).val()); });

                    var url = '{{ url()->current() }}';

                    window.location.href = url + '?brands=' + brands.toString() + '&prices=' + prices.toString();
            }
</script> --}}

<script>
    $(".brand-label, .price-label").change(function(){
        apply_filters();
    });

    function apply_filters(){
        var brands = [];
        var prices = [];

        $(".brand-label:checked").each(function(){
            brands.push($(this).val());
        });

        $(".price-label:checked").each(function(){
            prices.push($(this).val());
        });

        var url = '{{ url()->current() }}';
        window.location.href = url + '?brands=' + brands.toString() + '&prices=' + prices.toString();
    }
</script>


@endpush
