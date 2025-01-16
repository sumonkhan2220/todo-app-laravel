@extends('layouts.navbar')

@section('content')

<div class="container">
        <div class="row mt-2">
          <div class="col-6 m-auto">
            <div class="card">
              <h5 class="card-header">Edite Data</h5>

              @if (session('success')) 
                  <div class="alert alert-success">{{session('success')}}</div>
              @endif
              <div class="card-body">
                <form action="{{route('update', $singleData->id)}}" method="POST" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf
                  <input name="title" value="{{$singleData->title}}" type="text" class="form-control my-3  @error('title') is-invalid @enderror">
                  @error('title')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <input name="details" value="{{$singleData->details}}" type="text" class="form-control my-3  @error('title') is-invalid @enderror">
                  @error('title')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <input name="image" type="file" class="form-control my-2  @error('title') is-invalid @enderror" >
                  @error('title')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <input type="submit" value="Update" class="btn btn-primary">
                  {{-- <button type="update" value="update" class="btn btn-primary">Update</button> --}}
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection