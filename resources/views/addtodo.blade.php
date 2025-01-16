@extends('layouts.navbar')

@section('content')

<div class="container">
        <div class="row mt-2">
          <div class="col-6 m-auto">
            <div class="card">
              <h5 class="card-header">Add Todo</h5>

              @if (session('success')) 
                  <div class="alert alert-success">{{session('success')}}</div>
              @endif
              <div class="card-body">
                <form action="{{route('insert')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input name="title" type="text" class="form-control my-3  @error('title') is-invalid @enderror" placeholder="Inter Your Title">
                  @error('title')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <input name="details" type="text" class="form-control my-3  @error('title') is-invalid @enderror" placeholder="Inter Your details">
                  @error('title')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <input name="image" type="file" class="form-control my-2  @error('title') is-invalid @enderror" >
                  @error('title')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <input type="submit" class="btn btn-primary">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection