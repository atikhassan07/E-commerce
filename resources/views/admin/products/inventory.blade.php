@extends('layouts.app')
@section('admin_content')
  <div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <span class="text-info"><b><i>Product Inventory</i></b></span>
            </div>
            <div class="card-body">
                <table class="table table-stripe">
                    <thead>
                       <tr>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Action</th>
                       </tr>
                    </thead>
                    <tbody>
                        @foreach ($inventories as  $inventory)
                            <tr>
                                <td>{{ $inventory->rel_to_color->color_name }}</td>
                                <td>{{ $inventory->rel_to_size->size_name }}</td>
                                <td>{{ $inventory->quantity }}</td>

                                <td>
                                    <a href="{{ route('inventory.delete', $inventory->id) }}" class="btn btn-danger shadow btn-sm" id="delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <span>Add Inventory For, <b class="text-primary">{{ $product_info->product_name }}</b></span>
            </div>
            <form action="{{ route('inventory.store') }}" method="POST">
                @csrf
            <div class="card-body">
                   <div class="mb-3">
                    <input type="hidden" name="product_id" value="{{ $product_info->id }}">
                    <select name="color_id" id="" class="form-control">
                        <option value="" disabled selected>Select a Color</option>
                        @foreach ($colors as $color)
                        <option value="{{ $color->id }}">{{ $color->color_name }}</option>
                        @endforeach
                    </select>
                   </div>
                    <div class="mb-3">
                        <select name="size_id" id="" class="form-control">
                            <option value="" disabled selected>Select a Size</option>
                            @foreach ($sizes as $size)
                            <option value="{{ $size->id }}">{{ $size->size_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for=""><b>Quantity:</b></label>
                        <input type="number" class="form-control" placeholder="Add Quantity" name="quantity">
                    </div>


            </div>
            <div class="card-footer">
                <div class="mb-3">
                    <style>
                        .card-footer button{
                            background-color: blue;
                            color: #fff;
                        }
                        </style>
                        <button type="submit" class="btn btn-info form-control ">Add Inventory</button>
                </div>
            </div>
        </form>
        </div>
    </div>
  </div>
@endsection
