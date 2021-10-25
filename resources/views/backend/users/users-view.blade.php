@extends('backend.master')
@section('user_active')
  active
@endsection
@section('content')
    <div class="content-wrapper">
      <div class="container-full">

        <div class="content-header">
          <div class="d-flex align-items-center">
            <div class="mr-auto">
              <h3 class="page-title">All Users</h3>
              <div class="d-inline-block align-items-center">
                <nav>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                    <li class="breadcrumb-item" aria-current="page">Users</li>
                    <li class="breadcrumb-item active" aria-current="page">Users View</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title float-left">All Users List View</h3>
                  <a href="{{ route('users.create') }}" class="btn btn-primary float-right">Create User</a>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Sl</th>
                          <th>Name</th>
                          <th>Role</th>
                          <th>Email</th>
                          <th width="150px" class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ( $users as $key => $item)
                          <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->user_type ?? '' }}</td>
                            <td>{{ $item->email }}</td>
                            <td class="text-center">
                              <a href="{{ route('users.edit', $item->id ) }}" class="btn btn-info">Eid</a>
                              <a href="{{ route('users.delete', $item->id ) }}" class="btn btn-danger" id="delete">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>  
            </div>
          </div>
        </section>
        <!-- /.content -->
      </div>
    </div>
@endsection