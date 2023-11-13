@extends('layouts.app')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card shadow">
                <div class="card-header">
                    <h3>Add New Product</h3>

                </div>
                <div class="card-body">
                    <style>
                        .select2-container--default .select2-selection--single {

                            border-radius: 1.25rem;
                            background: #fff;
                            border: 1px solid #f0f1f5;
                            color: #B1B1B1;
                            height: 56px;
                        }
                        .select2-container--default .select2-selection--single .select2-selection__rendered{
                            margin-left: 10px;
                            margin-top: 15px;
                            color: #B1B1B1;
                            font-size: 14px;
                            font-weight: normal;
                        }
                        .select2-container--default .select2-selection--single .select2-selection__arrow{margin-top: 10px; color:#B1B1B1; }
                    </style>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for=""><b class="text-info"><i>Category Name:</i></b></label>
                                <div class="mb-3">
                                <select name="category_id" id="" class="custom_form category">
                                    <option value="" disabled selected><span class="ml-3">Select a Category</span></option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                                </select>

                                </div>
                            </div>

                        </div>
                        {{-- 1st col-6 end  --}}

                        {{-- 2nd col-6 begin  --}}
                        <div class="col-lg-6">
                            <label for=""><b class="text-info"><i>Subcategory Name:</i></b></label>
                            <select name="subcategory_id" id="" class="form-control subcategory">
                                <option value="" disabled selected>Select a Subcategory</option>
                                @foreach ($subcategories as $category)
                                <option value="{{ $category->id }}">{{ $category->subcategory_name }}</option>
                            @endforeach
                            </select>

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-4">
                            <label for=""><b class="text-info"><i>Product Name:</i></b></label>
                            <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name">
                        </div>
                        <div class="col-lg-4">
                            <label for=""><b class="text-info"><i>Product Price:</i></b></label>
                            <input type="number" name="product_price" class="form-control" placeholder="Enter Product Price">
                        </div>
                        <div class="col-lg-4">
                                {{-- brands  --}}
                                <div class="mb-3">
                                <label for=""><b class="text-info"><i>Brand Name:</i></b></label>
                                <div class="mb-3">
                                <select name="brand_id" id="" class="form-control ">
                                    <option value="" disabled selected>Select a Category</option>
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                @endforeach
                                </select>

                                </div>
                            </div>
                        </div>
                        </div>
                    <hr>

                            {{-- 3rd row begin  --}}
                            <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                <label for=""><b class="text-info"><i>Discount:</i></b></label>
                                <input type="number" name="discount" class="form-control" placeholder="Discount">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <label for=""><b class="text-info"><i>Tag:</i></b></label>

                                <div class="input-group">
                                    <input type="text" id="input-tags" name="tags" value="awesome,neasted,beast" class="form-control"/>
                                    </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for=""><b class="text-info"><i>Short Description:</i></b></label>
                                <input type="text" name="short_description" class="form-control" placeholder="Enter Short Description">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for=""><b class="text-info"><i>Long Description:</i></b></label>
                                    <textarea name="long_description" class="form-control" id="summernote"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for=""><b class="text-info"><i>Additional Description:</i></b></label>
                                    <textarea name="additonal_description" class="form-control" id="summernote2"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for=""><b class="text-info"><i>Thumbnail Image:</i></b></label>
                                    <input type="file" name="thumbnail_image[]" class="form-control" multiple>
                                </div>
                                </div>
                            <div class="col-lg-12">
                            <div class="mb-3">
                                <label for=""><b class="text-info"><i>Preview Image:</i></b></label>
                                <input type="file" name="preview_image" class="form-control dropify">
                            </div>
                            </div>

                        </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-6 m-auto">
                            <style>
                            .card-footer button{
                                background-color: blue;
                                color: #fff;
                            }
                            </style>
                            <button type="submit" class="btn btn-info form-control">Add Product</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@if (session()->has('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert"></button>
        {{ session()->get('success') }}
    </div>
@endif
@endsection
@section('footer_script')
    <script>
        $(document).ready(function() {
        $('.category').select2();
        $('.subcategory').select2();
    });
    </script>
    <script>
        $('.category').change(function(){
            var category_id = $(this).val();
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '/getSubcategory',
                data: {'category_id': category_id},
                success:function(data){
                    $('.subcategory').html(data);
                    // alert(data);
                }

            });
        });
    </script>

    {{-- summer note  --}}
    <script>
$(document).ready(function() {
    $('#summernote').summernote();
    $('#summernote2').summernote();
});
    </script>
    {{-- dropify  --}}
    <script>
        $('.dropify').dropify();
        $('.dropify2').dropify();
    </script>
            {{-- Tags Srcipt  --}}
    <script>
    $("#input-tags").selectize({
      delimiter: ",",
      persist: false,
      create: function (input) {
        return {
            value: input,
            text: input,
        };
      },
    });
    </script>

@endsection
