@extends('backend.layouts.master')
@section('main-content')


    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>EDIT Subcategory</h2>

            </div>

            <div class="box-content">
                <form class="form-horizontal" action="{{ route('subcategories.update', $subcategory->id) }}" method="post" >
                    @csrf
                    @method('PUT')
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">Subcategory Name</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="name" required value="{!! $subcategory->name !!}">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="category">Category Select</label>
                            <div class="controls">
                                <select name="cat_id" class="input-xlarge">
                                    <option value="">Select Category</option>

                                    @foreach($category as $cat)
                                      <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>



                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Subcategory Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="description" rows="3">{!! $subcategory->description !!}</textarea>
                            </div>

                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Update Subcategory</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->
    </div><!--/row-->
    </div><!--/row-->
@endsection
