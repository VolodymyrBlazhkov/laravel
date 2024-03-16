@extends('layouts.main')
@section('body')
    <div>
        <a class="btn btn-primary" href="{{ route('admin.post.index') }}">Back</a>
    </div>
    <form method="post" action="{{route('admin.post.store')}}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ old('title')}}">
            @error('title')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <input type="text"  name="content" class="form-control" id="content" value="{{ old('content')}}">
            @error('content')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text"  name="image" class="form-control" id="image" value="{{ old('image')}}">
            @error('image')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="likes" class="form-label">Likes</label>
            <input type="text"  name="likes" class="form-control" id="likes" value="{{ old('likes')}}">
            @error('likes')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Categoty</label>
            <select name="category_id" class="form-select" id="category">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <select multiple name="tags[]" class="form-select" id="tags">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
