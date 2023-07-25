@extends('tempages.layout')
@section('conten')
{{-- <form action="{{ route('st') }}" method="post">
    @csrf
    <input type="text" name="sr" id="">
    <input type="submit" value="Tim kiem" name="btn">
</form> --}}
<table class="table">
    <tr>
        <td>*</td>
        <td>Name</td>
        {{-- <td>birthday</td>
        <td>address</td> --}}
        <td ><a class="btn btn-primary" href="/add">ADD</a></td>
    </tr>
    @foreach ( $all_student as $a)
    <tr>
        <td>{{ $a -> id }}</td>
        <td>{{ $a -> name }}</td>
        {{-- <td>{{ $a -> birthday }}</td> --}}
        {{-- <td>{{ $a -> address }}</td> --}}
        <td><a class="btn btn-warning" href="">Update</a>||<a class="btn btn-danger" href="">Delete</a></td>
    </tr>
    @endforeach
</table>
@endsection