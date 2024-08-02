@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Comments</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Comments</li>
        <li class="breadcrumb-item active">View</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Comments</h5>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>Sl No</th>
                  <th>Comment</th>
                  <th>Post</th>
                  <th>User</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($comments as $key => $comment)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $comment->comment }}</td>
                    <td>{{ $comment->post->title }}</td>
                    <td>{{ $comment->user->name }}</td>
                    <td>
                      <a href="{{ route('comments.delete', $comment['id']) }}"
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