@extends('layouts.app')
@section('admin_content')
<div class="row">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header">
                <span class="text-info"><b><i>New Year Offer List</i></b></span>
            </div>
            <div class="card-body">
                <table class="table table-stripe">
                    <thead>
                       <tr>
                        <th>Image:</th>
                        <th>Ttilt:</th>
                        <th>Sub Ttile:</th>
                        <th>Persentage:</th>
                        <th>Action</th>
                       </tr>
                    </thead>
                    <tbody>
                        @foreach ($newyearoffer as  $offer)
                            <tr>
                                <td><img width="150" src="{{ asset('uploads/newyear_image') }}/{{ $offer->image }}" alt=""></td>
                                <td>{{ $offer->title }}</td>
                                <td>{{ $offer->sub_title }}</td>
                                <td>{{ $offer->persentage }}</td>

                                <td>
                                    <a href="" class="btn btn-danger shadow btn-sm" id="delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
<div class="col-lg-5">
    <div class="card">
        <div class="card-header text-center d-block">
            <h4 class="text-primary"><i >Add New Year Offer</i></h4>
        </div>
        <form action="{{ route('newyear.offer.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label for="" style="color: #000;">Title:</label>
                    <input type="text" name="title" class="form-control" placeholder="Place a Ttile" value="{{ old('title') }}">
                </div>
                <div class="mb-3">
                    <label for="" style="color: #000;">Sub Title:</label>
                    <input type="text" name="sub_title" class="form-control" placeholder="Place Sub Title" value="{{ old('sub_title') }}">
                </div>
                <div class="mb-3">
                    <label for="" style="color: #000;">Product Disscount:</label>
                    <input type="number" name="persentage" class="form-control" value="{{ old('persentage') }}">
                </div>

                <div class="mb-3">
                    <label for="" style="color: #000;">Image:</label>
                    <input type="file" name="image" class="form-control dropify" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                </div>
                <div class="mb-3">
                    <img width="100" src="" alt="" id="blah">
                </div>
            </div>
            <div class="card-footer">
                        <style>
                        .card-footer button{
                            background-color: blue;
                            color: #fff;
                        }
                        </style>
                        <button type="submit" class="form-control">Add Offer</button>
            </div>
        </form>
    </div>
</div>
</div>
@endsection

@section('footer_script')
<script>
    $('.dropify').dropify();
</script>
@endsection
