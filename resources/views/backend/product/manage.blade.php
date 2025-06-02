@extends('backend.layouts.master')
@section('main-content')
    <div class="box span12">
        <div class="box-header" data-original-title="">
            <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
                <table class="table table-striped table-bordered bootstrap-datatable datatable dataTable"
                    id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                                rowspan="1" colspan="1" aria-sort="ascending"
                                aria-label="Username: activate to sort column descending" style="width: 253px;">ID
                            </th>
                            <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                                rowspan="1" colspan="1" aria-sort="ascending"
                                aria-label="Username: activate to sort column descending" style="width: 253px;">CAT Name
                            </th>
                            <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                                rowspan="1" colspan="1" aria-sort="ascending"
                                aria-label="Username: activate to sort column descending" style="width: 253px;">Brand Name
                            </th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                                rowspan="1" colspan="1"aria-label="Date registered: activate to sort column ascending"
                                style="width: 200px;">
                                Product Name</th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                                rowspan="1" colspan="1"aria-label="Date registered: activate to sort column ascending"
                                style="width: 200px;">
                                Product Price</th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                                rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending"
                                style="width: 204px;">Description</th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                                rowspan="1" colspan="1"aria-label="Date registered: activate to sort column ascending"
                                style="width: 400px;">
                                Product Image</th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                                rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending"
                                style="width: 214px;">Status</th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                                rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending"
                                style="width: 422px;">Actions</th>

                        </tr>
                    </thead>
                    @foreach ($products as $product)
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                            <tr class="odd">
                                <td class="sorting_1">{{ $product->id }}</td>
                                <td class="sorting_1">{{ $product->category->name }}</td>
                                <td class="sorting_1">{{ $product->brand->name }}</td>

                                <td class="center ">{{ $product->name }}</td>
                                <td class="center ">{{ $product->price }}</td>
                                <td class="center">{!! $product->description !!}</td>
                                <td class="center ">
                                    @foreach (json_decode($product->image) as $img)
                                        <img src="{{ asset('images/product/' . $img) }}" width="50px" height="50px"
                                            alt="" style="margin: 2px;">
                                    @endforeach
                                </td>
                                <td class="center">
                                    <form action="{{ route('change_status_product', $product->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-link"
                                            onclick="return confirm('Are you sure you want to change the status?')">
                                            @if ($product->status == 1)
                                                <span class="label label btn-success">
                                                    <i class="fa-solid fa-toggle-on fa-2x"></i>
                                                </span>
                                            @else
                                                <span class="label label btn-danger">
                                                    <i class="fa-solid fa-toggle-off fa-2x"></i>
                                                </span>
                                            @endif
                                        </button>
                                    </form>
                                </td>


                                <td class="center">
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this product?');">
                                        <a class="btn btn-info" href="{{ route('products.edit', $product->id) }}">
                                            <i class="halflings-icon white edit"></i>
                                        </a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">
                                            <i class="halflings-icon white trash"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>

                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
<div class="span2"></div>
