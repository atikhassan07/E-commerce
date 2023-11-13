@extends('layouts.app')
@section('admin_content')
    {{-- <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-header">
                    <span class="text-info"><b><i>All User List</i></b></span>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                           <tr>
                            <th>SL NO:</th>
                            <th>User Email:</th>
                            <th>Date:</th>
                            <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                            @foreach ($newsletter as $key=> $newsletter)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $newsletter->email }}</td>
                                    <td>{{\Carbon\Carbon::parse($newsletter->created_at)->diffForHumans() }}</td>
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

    </div> --}}
    <div class="row">
        <div class="col-lg-8">
            <div class="mb-3">
                <a href="{{ route('all.subscriber') }}" class="btn btn-info btn-sm">All Subscriber</a>
            </div>
            @php
                $subscriber = App\Models\Subscriber::all();
            @endphp
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subscriber as $subscribe)
                        <tr>
                            <td>{{ Str::limit($subscribe->title, 25) }}</td>
                            <td>
                                <img width="100" src="{{ asset('uploads/subcribe') }}/{{ $subscribe->image }}" alt="">
                            </td>
                            <td>
                                <a href="" class="btn btn-danger shadow btn-xs" id="delete"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                 <span class="text-info"><b><i>Update Subsciber Part</i></b></span>
                </div>
                <form action="{{ route('update.subscriber') }}" method="post" enctype="multipart/form-data">
                  @csrf
                 <div class="card-body">
                    <div class="mb-3">
                        <label for="">Title:</label>
                        <input type="text" name="title" class="form-control" value="{{ $subs->first()->title }}">
                    </div>

                    <div class="mb-3">
                        <label for="">Image:</label>
                        <input type="file" name="image" class="form-control dropify" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    </div>

                    <div class="mb-3">
                        <img width="300" src="{{ asset('uploads/subcribe') }}/{{ $subs->first()->image }}" alt="" id="blah">
                    </div>
                    <input type="hidden" name="sub_id" value="{{ $subs->first()->id }}">
                 </div>
                 <div class="card-footer">
                    <style>
                        .card-footer button{
                            background-color: blue;
                        }
                    </style>
                    <button type="submit" class="btn btn-primary form-control">Update</button>
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
