@extends('backend.layouts.master')
@section('main-content')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Brands</h2>

            </div>

            <div class="box-content">
                <form class="form-horizontal" action="{{ route('brands.store') }}" method="post" >
                    @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">Brand Name</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="name" required>
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Brand Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="description" rows="3"></textarea>
                            </div>

                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Add Brand</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div>
    </div>
    </div>
@endsection
