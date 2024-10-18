@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container">
        <h1>{{ $blog->title }}</h1>
        <p><strong>Category:</strong> {{ $blog->getCategory->name }}</p>
        <p><strong>Created By:</strong> {{ $blog->getCreatedBy->name }}</p>
        <p><strong>Description:</strong> {!! nl2br(e($blog->description)) !!}</p>
        <p><strong>Meta Description:</strong> {{ $blog->meta_description }}</p>
        <p><strong>Meta Keywords:</strong> {{ $blog->meta_keywords }}</p>
        @if($blog->image_file)
            <img src="{{ $blog->getImage() }}" alt="{{ $blog->title }}" class="img-fluid">
        @endif
        <p><strong>Status:</strong> {{ $blog->status == 0 ? 'Active' : 'Inactive' }}</p>
        <p><strong>Published:</strong> {{ $blog->is_publish ? 'Yes' : 'No' }}</p>
        <a href="{{ url('admin/blog/edit/'.$blog->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ url('admin/blog/delete/'.$blog->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <a href="{{ url('admin/blog/list') }}" class="btn btn-secondary">Back to List</a>
    </div>
    </div>

@endsection

