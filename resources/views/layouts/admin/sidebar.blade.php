<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      @if(Auth::user()->role=="admin")
        <li class="nav-item">
          <a class="nav-link " href="{{ route('admin.dashboard') }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li><!-- End Dashboard Nav -->
      @else
        <li class="nav-item">
          <a class="nav-link " href="{{ route('user.dashboard') }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li><!-- End Dashboard Nav -->
      @endif

      @if(Auth::user()->role=="admin")
        <li class="nav-item">
          <a class="nav-link " href="{{route('admin.posts.panel')}}">
            <i class="bi bi-grid"></i>
            <span>Post</span>
          </a>
        </li>
      @else
      <li class="nav-item">
        <a class="nav-link " href="{{route('user.posts.panel')}}">
          <i class="bi bi-grid"></i>
          <span>Post</span>
        </a>
      </li>
      @endif

      @if(Auth::user()->role=="admin")
        <li class="nav-item">
          <a class="nav-link " href="{{route('admin.comments.index')}}">
            <i class="bi bi-grid"></i>
            <span>Comments</span>
          </a>
        </li>
      @else
        <li class="nav-item">
          <a class="nav-link " href="{{route('user.comments.index')}}">
            <i class="bi bi-grid"></i>
            <span>Comments</span>
          </a>
        </li>
      @endif

      @if(Auth::user()->role=="admin")
        <li class="nav-item">
          <a class="nav-link " href="{{route('admin.logs.index')}}">
            <i class="bi bi-grid"></i>
            <span>Logs</span>
          </a>
        </li>
      @endif

    </ul>

  </aside><!-- End Sidebar-->