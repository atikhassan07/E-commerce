@extends('layouts.app')
@section('admin_content')
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <span class="text-info"><b><i>Edit Subcategory</i></b></span>
                </div>
                <form action="{{ route('subcategory.update', $subcategories->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for=""><b>Category Name:</b></label>
                                <select name="category_id" id="" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="" {{ $subcategories->category_id == $category->id?'selected':' ' }}>{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="mb-3">
                            <label for=""><b>Subategory Name:</b></label>
                            <input type="text" name="category_name" class="form-control" value="{{ $subcategories->subcategory_name}}">
                        </div>

                        <div class="mb-3">
                            <label for=""><b>Subcategory Photo:</b></label>
                            <input type="file" name="subcategory_photo" class="form-control dropify" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <div class="mb-3">
                            <img width="100" src="{{ asset('uploads/subcategory') }}/{{ $subcategories->subcategory_photo }}" alt="" id="blah">
                        </div>
                </div>
                <div class="card-footer">
                    <style>
                        .card-footer button{
                            background-color: blue;
                        }
                    </style>
                    <button type="submit" class="btn btn-primary form-control">Update Subcategory</button>
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
