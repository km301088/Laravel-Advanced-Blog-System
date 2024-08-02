@extends('layouts.app')
@section('content')

    <div class="pagetitle">
        <h1>Logs</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">Logs</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
    
      <section class="section">
        <div class="row">
          <div class="col-lg-12">
    
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Logs</h5>
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                        <th>User</th>
                        <th>Path</th>
                        <th>Method</th>
                        <th>IP Address</th>
                        <th>Timestamp</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($logs as $log)
                        <tr>
                            <td>{{ $log->user->name }}</td>
                            <td>{{ $log->path }}</td>
                            <td>{{ $log->method }}</td>
                            <td>{{ $log->ip_address }}</td>
                            <td>{{ $log->created_at }}</td>
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
