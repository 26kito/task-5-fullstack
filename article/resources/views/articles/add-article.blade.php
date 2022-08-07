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
<div class="col-6 align-items-center">
    <div class="card card-info">
        <div class="card-header">
            <h3 classimaged-Image">Add Article</h3>
        </div>
        <form action="{{url('/add-article')}}" method="POST">
            @csrf
            <div class="card-body"> <!-- Card Body -->
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class ="form-control">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="text" name="image" id="image" class ="form-control">
                </div>
                <div class="form-group"> <!-- Category -->
                    <label for="user_id">Category:</label>
                    <div class="input-group">
                        <select name="category_id" class="form-control">
                            @foreach ($category as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> <!-- End of Category -->
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection