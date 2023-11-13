@extends('layouts.app')

@section('admin_content')
<div class="row">
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <span class="text-info"><b><i>Update Main Logo</i></b></span>
        </div>
        <form action="{{ route('update.logo') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="card-body">
                <div class="mb-3">
                    <label for=""><b>Update Logo:</b></label>
                    <input type="file" name="logo" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                </div>

                <div class="mb-3">
                    <img width="100" src="{{ asset('uploads/logo') }}/{{ $main_logo->first()->logo }}" alt="" id="blah">
                </div>

                <input type="hidden" name="logo_id" value="{{ $main_logo->first()->id }}">
        </div>
        <div class="card-footer">
            <style>
                .card-footer button{
                    background-color: blue;
                }
            </style>
            <button type="submit" class="btn btn-primary form-control">Update Logo</button>
        </div>
    </form>
    </div>
</div>
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <span class="text-info"><b><i>Update Footer Logo</i></b></span>
        </div>
        <form action="{{ route('update.footer.logo') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="card-body">
                <div class="mb-3">
                    <label for=""><b>Update Footer Logo:</b></label>
                    <input type="file" name="logo" class="form-control" onchange="document.getElementById('footer').src = window.URL.createObjectURL(this.files[0])">
                </div>

                <div class="mb-3">
                    <img width="100" src="{{ asset('uploads/logo') }}/{{ $footer_logo->first()->logo }}" alt="" id="footer">
                </div>

                <input type="hidden" name="logo_id" value="{{ $footer_logo->first()->id }}">
        </div>
        <div class="card-footer">
            <style>
                .card-footer button{
                    background-color: blue;
                }
            </style>
            <button type="submit" class="btn btn-primary form-control">Update Footer Logo</button>
        </div>
    </form>
    </div>
</div>
</div>
@endsection
