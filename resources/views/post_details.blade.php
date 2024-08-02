<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Laravel Blog</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
</head>

<body>

      <!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/" class="logo d-flex align-items-center">
        <img src="{{ asset('assets/img/logo.png')}}" alt="">
        <span class="d-none d-lg-block">{{ config('app.name'); }}</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
  
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        
        @if (Route::has('login'))
          @auth
            <li class="nav-item dropdown pe-3">
  
              <a class="nav-link nav-profile d-flex align-items-center pe-0" href="{{ url('/home') }}">
                Dashboard
              </a><!-- End Profile Iamge Icon -->
  
            </li><!-- End Profile Nav -->
          @else
            <li class="nav-item dropdown pe-3">
  
              <a class="nav-link nav-profile d-flex align-items-center pe-0" href="{{ route('login') }}">
                Log In
              </a><!-- End Profile Iamge Icon -->
              
            </li><!-- End Profile Nav -->
            @if (Route::has('register'))
              <li class="nav-item dropdown pe-3">
  
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="{{ route('register') }}">
                  Register
                </a><!-- End Profile Iamge Icon -->
                
              </li><!-- End Profile Nav -->
            @endif
          @endauth
        @endif
  
      </ul>
    </nav><!-- End Icons Navigation -->
  
  </header><!-- End Header -->

<main id="main" class="main">

    <section class="section">
        <div class="row">


    <h1>Title : {{ $post->title }}</h1>
    <p>Discriptions : {{ $post->content }}</p>
    <hr>
    <h2>Comments</h2>
    <ul>
        @foreach($post->comments as $comment)
            <p>"{{ $comment->comment }}" by {{ $comment->user->name }}</p>
        @endforeach
    </ul>
    <hr>
    <h2>Add a Comment</h2>
    <form action="{{ route('comments.store', $post) }}" method="POST">
        @csrf
        <input type="hidden" class="form-control" name="post_id" value="{{ $post->id }}">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <label for="body" class="col-sm-2 col-form-label">Comment:</label>
        <textarea class="form-control" name="comment" id="body" required></textarea>
        <br>
        <button class="btn btn-primary" type="submit">Add Comment</button>
    </form>
    <a href="{{ route('posts.index') }}">Back to Posts</a>

</div>
</section>


</main><!-- End #main -->

<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>
