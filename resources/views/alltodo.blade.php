@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row mt-2">
        <div class="col-12 m-auto">
            <div class="card">
                <h5 class="card-header"></h5>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Details</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>

                        @foreach ($alltodos as $key=>$alltodo)
                        <tr>
                            <th>{{$alltodos->firstItem()+$key}}</th>
                            <td>{{$alltodo->title}}</td>
                            <td>{{Str::length($alltodo->details)>20 ? Str::substr($alltodo->details, 0, 20)."...." : $alltodo->details}}</td>
                            <td>
                                <img src="{{asset('storage/image/'.$alltodo->image)}}" alt="image" height="80px" width="80">
                            </td>
                            <td>

                                <div class="btn-group" role="group">

                                    <a href="{{route('edit',$alltodo->id)}}" class="btn btn-warning">Edit</a>

                                    <form action="{{route('delete',$alltodo->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <input class="btn btn-danger" type="submit" value="Delete">
                                    </form>


                                    {{-- <a href="" class="btn btn-danger">Delete</a> --}}
                                </div> 
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{$alltodos->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection