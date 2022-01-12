@extends('layout')
@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table">
    <div class="col-md-12">
        <a href="{{ route('students.create')}}" class="btn btn-success my-4">Add Student</a>
    </div>
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Name</td>
          <td>Details</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 0;
        @endphp
        @foreach ($std as $stds)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $stds->name }}</td>
            <td>{{ $stds->detail }}</td>
            <td class="text-center">
                <a href="{{ route('students.edit', $stds->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                <a href="{{ route('students.show', $stds->id)}}" class="btn btn-primary btn-sm"">Show</a>
                <form action="{{ route('students.destroy', $stds->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>

  @endsection