@extends('backend.layouts.master')
@section('main-content')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>

            </div>

            <div class="box-content">
                <form class="form-horizontal" action="{{ route('products.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">Product Code</label>
                            <div class="controls">
                                <input type="number" class="input-xlarge" name="code" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">Product Name</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="name" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="category">Category Select</label>
                            <div class="controls">
                                <select name="cat_id" class="input-xlarge" required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="subcategory">SubCategory Select</label>
                            <div class="controls">
                                <select name="subcat_id" class="input-xlarge" required>
                                    <option value="">Select subCategory</option>
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="brand">Brand Select</label>
                            <div class="controls">
                                <select name="br_id" class="input-xlarge" required>
                                    <option value="">Select brand</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="brand">Unit Select</label>
                            <div class="controls">
                                <select name="unit_id" class="input-xlarge" required>
                                    <option value="">Select unit</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="brand">size Select</label>
                            <div class="controls">
                                <select name="size_id" class="input-xlarge" required>
                                    <option value="">Select size</option>
                                    @foreach ($sizes as $size)
                                        @foreach (json_decode($size->size) as $singleSize)
                                            <option value="{{ $size->id }}">{{ $singleSize }}</option>
                                        @endforeach
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="brand">color Select</label>
                            <div class="controls">
                                <select name="color_id" class="input-xlarge" required>
                                    <option value="">Select color</option>
                                    @foreach ($colors as $color)
                                        @foreach (json_decode($color->color) as $singlecolor)
                                            <option value="{{ $color->id }}">{{ $singlecolor }}</option>
                                        @endforeach
                                    @endforeach

                                </select>
                            </div>
                        </div>


                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Category Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="description" rows="3"></textarea>
                            </div>

                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Price </label>
                            <div class="controls">
                                <input type="number" class="input-xlarge" name="price" required>
                            </div>

                        </div>

                        <div class="control-group">
                            <label class="control-label">File Upload</label>
                            <div class="controls">
                                <input type="file" name="image[]" multiple required>
                            </div>
                        </div>


                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->
    </div><!--/row-->
    </div><!--/row-->
@endsection
