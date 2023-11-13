@extends('layouts.app')
@section('admin_content')
<div class="row">
    <div class="col-lg-6">
        <table class="table table-striped table-bordered table-hover shadow">
            <thead>
                <tr>
                    <th>Icon</th>
                    <th>Link</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($social as $social)
                <tr>
                    <td>
                        <i style="font-family:fontawesome; font-style:normal; color:red;" class="{{ $social->icon }}"></i>
                    </td>
                    <td><a href="{{ $social->link }}">{{ $social->link }}</a></td>
                    <td>
                        <a href="{{ route('delete.scoial',$social->id) }}" class="btn btn-danger shadow btn-xs" id="delete"><i class="fa fa-trash"></i></a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header ">
                 <span class="text-info"><b><i>Add Social Media</i></b></span>
            </div>
            @php
                $fonts = array (
                    'fa-facebook',
                    'fa-facebook-square',
                    'fa-instagram',
                    'fa-twitter',
                    'fa-twitter-square',
                    'fa-youtube',
                    'fa-youtube-play',
                    'fa-youtube-square',
                )
            @endphp
            <form action="{{ route('store.scoial') }}" method="POST">
                @csrf
            <div class="card-body">
              <div class="mb-3">
                @foreach ($fonts as $icon)
                    <i data-icon="{{ $icon }}" class=" abc {{ $icon }}" style="font-family: fontawesome;font-size:24px; padding:5px;"></i>
                @endforeach
              </div>

                    <div class="mb-3">
                        <label for=""><b>Add Icon:</b></label>
                        <input type="text" id="icon" name="icon" class="form-control">
                    </div>
                    @error('icon')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="mb-3">
                        <label for=""><b>Add Link:</b></label>
                        <input type="text" name="link" class="form-control">
                    </div>
                    @error('link')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div>
            <div class="card-footer">
                <style>
                    .card-footer button{
                        background-color: blue;
                    }
                </style>
                <button type="submit" class="btn btn-primary form-control">Add Social</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
@section('footer_script')
<script>
    $('.abc').click(function() {
       var icon = $(this).attr('data-icon')
       $('#icon').attr('value', icon);
    });
</script>
@endsection
