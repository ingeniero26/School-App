@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Sub Category</h1>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{ url('admin/sub_category/list') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <form method="post" action="">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach($getCategories as $category)
                                            <option value="{{ $category->id }}" {{ ($category->id == $getRecord->category_id) ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Sub Category Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $getRecord->name }}" required placeholder="Sub Category Name">
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" class="form-control" value="{{ $getRecord->slug }}" disabled placeholder="Slug">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="0" {{ ($getRecord->status == 0) ? 'selected' : '' }}>Active</option>
                                        <option value="1" {{ ($getRecord->status == 1) ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Meta Title</label>
                                    <input type="text" class="form-control" name="meta_title" value="{{ $getRecord->meta_title }}" placeholder="Meta Title">
                                </div>
                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <textarea class="form-control" name="meta_description" placeholder="Meta Description">{{ $getRecord->meta_description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Meta Keywords</label>
                                    <input type="text" class="form-control" name="meta_keywords" value="{{ $getRecord->meta_keywords }}" placeholder="Meta Keywords">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
<script>
    $(function() {
        // Add any necessary JavaScript here
    });
</script>
@endsection
