@extends('layouts.app')
@section('admin_content')
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <span class="text-info"><b><i>Add New Category</i></b></span>
                </div>
                <form action="{{ route('category.update', $categories->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                        <div class="mb-3">
                            <label for=""><b>Category Name:</b></label>
                            <input type="text" name="category_name" class="form-control" value="{{ $categories->category_name}}">
                        </div>
                        @error('category_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="mb-3">
                            <label for=""><b>Category Photo:</b></label>
                            <input type="file" name="category_photo" class="form-control dropify" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <div class="mb-3">
                            <img width="100" src="{{ asset('uploads/category') }}/{{ $categories->category_photo }}" alt="" id="blah">
                        </div>
                </div>
                <div class="card-footer">
                    <style>
                        .card-footer button{
                            background-color: blue;
                        }
                    </style>
                    <button type="submit" class="btn btn-primary form-control">Update Category</button>
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
