@extends('layouts.app')
@section('content')

    <h1>Create New Post</h1>
    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <label class="col-sm-2 col-form-label" for="title">Title:</label>
        <input class="form-control" type="text" name="title" id="title" required>
        <br>
        <label class="col-sm-2 col-form-label" for="content">Content:</label>
        <textarea class="form-control" name="content" id="content" required></textarea>
        <br>
        <button class="btn btn-primary" type="submit">Create Post</button>
    </form>


@endsection