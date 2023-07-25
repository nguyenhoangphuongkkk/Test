@extends('templates.layout')
@section('content')
<form action="{{ route('st') }}" method="post">
    @csrf
    <input type="text" name="sr" id="">
    <input type="submit" value="Tim kiem" name="btn">
</form>
    <h1>{{ $name }}</h1>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Hình ảnh</td>
            <td>++</td>
        </tr>

        @foreach($students as $st)
        <tr>
            <td>{{ $st->id }}</td>
            <td>{{ $st->name }}</td>
            {{-- <td><img src="{{ $st->image?''.Storage::url($st->image):''}}" style="width: 100px" /></td> --}}
            <td>
                <img src="{{ asset('storage/'.$st->image) }}" style="width: 100px" alt="">
            </td>
            <td><a href="{{ route('route_student_delete', ['id'=> $st->id]) }}">xoas</a></td>
        </tr>
        @endforeach
    </table>
@endsection