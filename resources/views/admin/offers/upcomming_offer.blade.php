@extends('layouts.app')
@section('admin_content')
<div class="row">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header">
                <span class="text-info"><b><i>Category List</i></b></span>
            </div>
            <div class="card-body">
                <table class="table table-stripe">
                    <thead>
                       <tr>
                        <th>Product Image:</th>
                        <th>Product Name:</th>
                        <th>Product Price:</th>
                        <th>Discount %</th>
                        <th>After Discount:</th>
                        <th>Action</th>
                       </tr>
                    </thead>
                    <tbody>
                        @foreach ($upcommingOffers as  $offer)
                            <tr>
                                <td><img width="150" src="{{ asset('uploads/offer_image') }}/{{ $offer->image }}" alt=""></td>
                                <td>{{ $offer->product_name }}</td>
                                <td>{{ $offer->product_price }}</td>
                                <td>{{ $offer->disscount }}</td>
                                <td>{{ $offer->after_disscount }}</td>
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
            <h4 class="text-primary"><i >Add New Upcomming Offer</i></h4>
        </div>
        <form action="{{ route('upcomming.offer.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label for="" style="color: #000;">Product Name:</label>
                    <input type="text" name="product_name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" style="color: #000;">Product Price:</label>
                    <input type="number" name="product_price" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" style="color: #000;">Product Disscount:</label>
                    <input type="number" name="disscount" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" style="color: #000;">Upcomming Date:</label>
                    <input type="date" name="date" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" style="color: #000;">Product Image:</label>
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
