@extends('layouts.main')
@section('body')
    <div>
        <a class="btn btn-primary" href="{{ route('admin.post.create') }}">Create</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Conten</th>
            <th scope="col">Image</th>
            <th scope="col">Likes</th>
            <th scope="col">Show</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <div>

            </div>
            <tr>
                <th scope="row">{{$post->title}}</th>
                <td>{{$post->content}}</td>
                <td>{{$post->image}}</td>
                <td>{{$post->likes}}</td>
                <td><a href="{{route('admin.post.show', $post->id)}}">Show</a></td>
                <td><a href="{{route('admin.post.edit', $post->id)}}">Edit</a></td>
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
        {{$posts->withQueryString()->links()}}
    </div>
@endsection
