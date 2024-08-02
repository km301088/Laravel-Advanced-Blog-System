@extends('layouts.app')
@section('content')

    <h1>Update Post</h1>
    <form action="{{ route('post.update') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="id" value="{{ $post->id }}">
        <label class="col-sm-2 col-form-label" for="title">Title:</label>
        <input class="form-control" type="text" name="title" id="title" value="{{ $post->title }}" required>
        <br>
        <label class="col-sm-2 col-form-label" for="content">Content:</label>
        <textarea class="form-control" name="content" id="content" required>{{ $post->content }}</textarea>
        <br>
        <button class="btn btn-primary" type="submit">update Post</button>
    </form>


@endsection