@extends('layouts.app')
@section('admin_content')
<div class="row">
    <div class="col-lg-10 m-auto">
        <div class="card">
            <div class="card-header">
                <span class="text-info"><b><i>All Subscriber List</i></b></span>
                <a href="{{ route('newsletter') }}" class="btn btn-danger btn-sm">Back</a>
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
                        @foreach ($susbscriber as $key=> $susbscribe)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $susbscribe->email }}</td>
                                <td>{{\Carbon\Carbon::parse($susbscribe->created_at)->diffForHumans() }}</td>
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

</div>
@endsection
