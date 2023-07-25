@extends('templates.layout')
@section('content')
@include('templates.error')
    <form action="{{ route('login') }}" method="POST">
     @csrf
    <div class="mb-3">
        <label  class="form-label">Email address</label>
        <input type="email" name="email" class="form-control"  >
    </div>
    <div class="mb-3">
        <label  class="form-label">Password </label>
        <input type="password" name="password" class="form-control" >
    </div>
        <button type="submit" class="btn btn-primary">Đăng nhập</button>
    </form>
@endsection