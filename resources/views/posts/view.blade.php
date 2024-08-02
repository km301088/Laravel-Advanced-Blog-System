@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Posts</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Posts</li>
        <li class="breadcrumb-item active">View</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Posts</h5>

            <a href="{{route('post.create')}}"><button type="button" class="btn btn-primary">Create Post</button></a>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>Sl No</th>
                  <th>Title</th>
                  <th>content</th>
                  <th>Author</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($posts as $key => $post)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>

                      <a href="{{ route('post.edit', $post['id']) }}"
                                class="edit-btn"><i class="bi bi-pen"></i></a>
                      <a href="{{ route('post.delete', $post['id']) }}"
                                class="del-btn" onclick="return confirm('Are you sure to delete?')"><i style="color: red" class="bi bi-archive-fill"></i></a>
                    </td>
                </tr>  
                @endforeach
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>
  
  @endsection