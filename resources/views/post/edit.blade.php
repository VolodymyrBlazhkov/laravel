@extends('layouts.main')
@section('body')
    <div>
        <a class="btn btn-primary" href="{{ route('post.index') }}">Back</a>
    </div>
    <form method="post" action="{{route('post.update', $post->id)}}">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{$post->title}}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <input type="text"  name="content" class="form-control" id="content" value="{{$post->content}}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text"  name="image" class="form-control" id="image" value="{{$post->image}}">
        </div>
        <div class="mb-3">
            <label for="likes" class="form-label">Likes</label>
            <input type="text"  name="likes" class="form-control" id="likes" value="{{$post->likes}}">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Categoty</label>
            <select name="category_id" class="form-select" id="category">
                @foreach($categories as $category)
                    <option {{ $category->id === $post->category_id ? ' selected' : '' }} value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <select multiple name="tags[]" class="form-select" id="tags">
                @foreach($tags as $tag)
                    <option
                        @foreach($post->tags as $tagPost)
                            {{ $tagPost->id === $tag->id ? ' selected' : '' }}
                        @endforeach
                        value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
