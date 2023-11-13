@extends('layouts.app')
@section('admin_content')
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <span class="text-info"><b><i>Trash Category List</i></b></span>
                </div>
                <div class="card-body">
                    <table class="table table-stripe">
                        <thead>
                           <tr>
                            <th>SL NO:</th>
                            <th>Category Name:</th>
                            <th>Category Image:</th>
                            <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                            @foreach ($trash_cat as $key=> $category)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td><img width="100" src="{{ asset('uploads/category') }}/{{ $category->category_photo }}" alt=""></td>
                                    <td>
                                        <a href="{{ route('category.restore', $category->id) }}" class="btn btn-success shadow btn-xs"><i class="fa fa-reply"></i></a>
                                        <a href="{{ route('category.force.delete',$category->id) }}" class="btn btn-danger btn-xs" id="delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
