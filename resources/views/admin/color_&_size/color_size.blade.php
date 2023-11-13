@extends('layouts.app')
@section('admin_content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <span class="text-info"><b><i>All Color List</i></b></span>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                           <tr>
                            <th>SL NO:</th>
                            <th>Color Name:</th>
                            <th>Color Code:</th>
                            <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                            @foreach ($colors as $key=> $color)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $color->color_name }}</td>
                                    <td><span class="badage p-2 " style="background-color: {{ $color->color_code }};border-radius:10px; font-size:12px; width:50px;height:50px;">{{ $color->color_code }}</span></td>
                                    <td>
                                        <a href="{{ route('color.delete',$color->id) }}" class="btn btn-danger shadow btn-sm" id="delete"><i class="fa fa-trash"></i></a>
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
                    <span class="text-info"><b><i>Add New Color</i></b></span>
                </div>
                <form action="{{ route('color.store') }}" method="POST" >
                    @csrf
                <div class="card-body">
                        <div class="mb-3">
                            <label for=""><b>Color Name:</b></label>
                            <input type="text" name="color_name" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for=""><b>Color Code:</b></label>
                            <input type="text" name="color_code" class="form-control">
                        </div>
                </div>
                <div class="card-footer">
                    <style>
                        .card-footer button{
                            background-color: blue;
                        }
                    </style>
                    <button type="submit" class="btn btn-primary form-control">Add Color</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <span class="text-info"><b><i>Size List</i></b></span>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($categories as $category)
                        <div class="col-lg-6">
                            <div class="card-header">
                               <b> {{ $category->category_name }}:</b>
                            </div>
                            <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Size Name:</th>
                            <th>Action</th>
                        </tr>
                            @forelse (App\Models\Size::where('category_id', $category->id)->get() as $size)
                                <tr>
                                    <td>{{ $size->size_name }}</td>
                                    <td>
                                        <a href="{{ route('size.delete', $size->id) }}" class="btn btn-danger shadow btn-xs" id="delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>
                                        <span colspan="4" class="text-center text-danger">No Size Found</span>
                                    </td>
                                </tr>
                            @endforelse
                    </table>
                            </div>
                        </div>
                        @endforeach
                    </div>


                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <span class="text-info"><b><i>Add New Size</i></b></span>
                </div>
                <form action="{{ route('size.store') }}" method="POST" >
                    @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <select name="category_id" id="" class="form-control">
                            <option value="" disabled selected>Select a Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                        <div class="mb-3">
                            <label for=""><b>Size Name:</b></label>
                            <input type="text" name="size_name" class="form-control" placeholder="Size">
                        </div>

                </div>
                <div class="card-footer">
                    <style>
                        .card-footer button{
                            background-color: blue;
                        }
                    </style>
                    <button type="submit" class="btn btn-primary form-control">Add Size</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
