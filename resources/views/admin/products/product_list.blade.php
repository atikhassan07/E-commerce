@extends('layouts.app')
@section('admin_content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>All Product List</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>Preview</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Disscount</th>
                        <th>After Disscount</th>
                        <th>SKU</th>
                        <th>Banner</th>
                        <th>Product</th>
                        <th>Trendy</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($products as $key=> $product)
                    <tr>
                            <td>
                                <img width="150" src="{{ asset('uploads/products') }}/{{ $product->preview_image }}" alt="">
                            </td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->product_price }}</td>
                            <td>{{ $product->discount }}</td>
                            <td>{{ $product->after_disscount }}</td>
                            <td>{{ $product->sku }}</td>
                            <td>
                                <input type="checkbox" data-toggle="switchbutton" checked data-size="xs">
                            </td>
                            <td> <input type="checkbox" data-toggle="switchbutton" checked data-size="xs"></td>
                            <td> <input type="checkbox" data-toggle="switchbutton" checked data-size="xs"></td>
                            <td> <input type="checkbox" data-toggle="switchbutton" checked data-size="xs"></td>
                            <td>
                                <a href="{{ route('delete.product',$product->id) }}" class="btn btn-danger shadow btn-xs" id="delete"><i class="fa fa-trash"></i></a>
                                <a href="{{ route('inventory',$product->id) }}" class="btn btn-success shadow btn-xs mt-2"><i class="fa fa-archive"></i></a>
                            </td>

                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
