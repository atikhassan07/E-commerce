@extends('layouts.app')
@section('admin_content')
    <div class="row">
        @if (session()->has('success'))
            <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert"></button>
                    {{ session()->get('success') }}
            </div>
        @endif
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <span class="text-info"><b><i>Category List</i></b></span>
                </div>
                <div class="card-body">
                    <table class="table table-stripe">
                        <thead>
                           <tr>
                            <th width="50px"><input type="checkbox" id="master"></th>
                            <th>SL NO:</th>
                            <th>Category Name:</th>
                            <th>Category Image:</th>
                            <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key=> $category)
                                <tr>
                                    <td><input type="checkbox" class="sub_chk" data-id="master"></td>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td><img width="50" src="{{ asset('uploads/category') }}/{{ $category->category_photo }}" alt=""></td>
                                    <td>
                                        <a href="{{ route('category.edit',$category->id) }}" class="btn btn-success shadow btn-sm"><i class="fa fa-pencil"></i></a>

                                        <a href="{{ route('category.soft.delete',$category->id) }}" class="btn btn-danger shadow btn-sm" id="delete"><i class="fa fa-trash"></i></a>
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
                    <span class="text-info"><b><i>Add New Category</i></b></span>
                </div>
                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                        <div class="mb-3">
                            <label for=""><b>Category Name:</b></label>
                            <input type="text" name="category_name" class="form-control" placeholder="Enter Category Name">
                        </div>
                        @error('category_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="mb-3">
                            <label for=""><b>Category Photo:</b></label>
                            <input type="file" name="category_photo" class="form-control dropify">
                        </div>
                        @error('category_photo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="card-footer">
                    <style>
                        .card-footer button{
                            background-color: blue;
                        }
                    </style>
                    <button type="submit" class="btn btn-primary form-control">Add Category</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
@section('footer_script')
{{-- dropify  --}}
<script>
    $('.dropify').dropify();
    $('.dropify2').dropify();
</script>
@endsection
