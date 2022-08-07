@extends('template.template')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Articles</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Articles</li>
        </ol>
    </div>
</div>
@endsection


@section('content')
<div class="col-12">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Articles List</h3>
        </div>
        <div class="card-body">
            <a href="{{url('add-article')}}" class="btn btn-success">Insert</a>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class='text-center'>Title</th>
                    <th class='text-center'>Image</th>
                    <th class='text-center'>User_id</th>
                    <th class='text-center'>Category_id</th>
                    <th class='text-center' colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($articles as $row)
                <tr>
                    <td>{{ $row->title }}</td>
                    <td>{{ $row->image }}</td>
                    <td>{{ $row->category_id }}</td>
                    <td>{{ $row->user_id }}</td>
                    <td><a href="{{ url('edit-article/'.$row->id) }}" class="btn btn-outline-info">Edit</a></td>
                    <td><a href="{{ url('delete-article/'.$row->id) }}" class="btn btn-outline-danger">Delete</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{ $articles->links() }}
        </div>
    </div>
</div>
@endsection