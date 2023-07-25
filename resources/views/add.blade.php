@extends('tempages.layout')
@section('conten')

@include('tempages.errors')

<form action="{{ url('/add-student') }}" method="POST">
  @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">User name</label>
        <input type="name" name="name" class="form-control" >
      </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" name="email" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
  </form>

@endsection