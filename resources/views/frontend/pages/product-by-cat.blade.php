@extends('frontend.layouts.master')

@section('main_content')
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Sub Categories</h3>
                        <div class="checkbox-filter">
                            @foreach ($subcategories as $subcategory)
                                <div class="input-checkbox">
                                    <input type="checkbox" id="category-1">
                                    <label for="category-1">
                                        <span></span>
                                        {{ $subcategory->name }}
                                        <small>({{ $subcategory->products_count }})</small>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /aside Widget -->

                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Price</h3>
                        <div class="price-filter">
                            <div id="price-slider"></div>
                            <div class="input-number price-min">
                                <input id="price-min" type="number">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                            <span>-</span>
                            <div class="input-number price-max">
                                <input id="price-max" type="number">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                        </div>
                    </div>
                    <!-- /aside Widget -->
           <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Brand</h3>
                        <div class="checkbox-filter">
                            @foreach ($brands as $brand)
                                <div class="input-checkbox">
                                    <input type="checkbox" id="brand-1">
                                    <label for="brand-1">
                                        <span></span>
                                        {{ $brand->name }}
                                        <small>({{ $brand->products_count }})</small>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /aside Widget -->

                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Top selling</h3>
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="{{ asset('frontend') }}/img/product01.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                            </div>
                        </div>

                        <div class="product-widget">
                            <div class="product-img">
                                <img src="{{ asset('frontend') }}/img/product02.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                            </div>
                        </div>

                        <div class="product-widget">
                            <div class="product-img">
                                <img src="{{ asset('frontend') }}/img/product03.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                            </div>
                        </div>
                    </div>
                    <!-- /aside Widget -->
                </div>
                <!-- /ASIDE -->

                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <div class="store-sort">
                            <label>
                                Sort By:
                                <select class="input-select">
                                    <option value="0">Popular</option>
                                    <option value="1">Position</option>
                                </select>
                            </label>

                            <label>
                                Show:
                                <select class="input-select">
                                    <option value="0">20</option>
                                    <option value="1">50</option>
                                </select>
                            </label>
                        </div>
                        <ul class="store-grid">
                            <li class="active"><i class="fa fa-th"></i></li>
                            <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                        </ul>
                    </div>
                    <!-- /store top filter -->

                    <!-- store products -->
                    <div class="row">
                        @forelse ($products as $product)
                            {{-- multiple image separate --}}
                            @php
                                $images = json_decode($product->image);
                                $firstImage = $images[0];
                            @endphp

                            <!-- product -->
                            <div class="col-md-4 col-xs-6">
                                <div class="product">
                                    <a href="{{ route('products_details', $product->id) }}">
                                        <div class="product-img">
                                            <img src="{{ asset('images/product/' . $firstImage) }}"
                                                alt="{{ $product->name }}" height="250">
                                            <div class="product-label">
                                                <span class="sale">-30%</span>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{ $product->category->name }}</p>
                                            <h3 class="product-name"><a href="#">{{ $product->name }}</a></h3>
                                            <h4 class="product-price">&#2547 {{ $product->price }} <del
                                                    class="product-old-price">&#2547 {{ $product->price }}</del>
                                            </h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                        class="tooltipp">add to wishlist</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                        class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span
                                                        class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
                                                cart</button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!-- /product -->
                        @empty
                            <div class="col-12 text-center">
                                <h4 class="text-danger">No products available in this category.</h4>
                            </div>
                        @endforelse
                    </div>
                    <!-- /store products -->
                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">
                        <span class="store-qty">Showing 20-100 products</span>
                        <ul class="store-pagination">
                            <li class="active">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                    <!-- /store bottom filter -->
                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
