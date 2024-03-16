@extends('layouts.main')
@section('body')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Conten</th>
            <th scope="col">Image</th>
            <th scope="col">Likes</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{$post->title}}</th>
                <td>{{$post->content}}</td>
                <td>{{$post->image}}</td>
                <td>{{$post->likes}}</td>
                <td>
                    <a href="{{route('admin.post.edit', $post->id)}}">Edit</a>
                </td>
                <td>
                    <form method="post" action="{{route('admin.post.delete', $post->id)}}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        <a class="btn btn-primary" href="{{ route('admin.post.index') }}">Back</a>

    </div>
@endsection
