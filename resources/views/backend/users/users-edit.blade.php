@extends('backend.master')
@section('content')
  <div class="content-wrapper">
    <div class="container-full">

      <div class="content-header">
        <div class="d-flex align-items-center">
          <div class="mr-auto">
            <h3 class="page-title">Users Edit</h3>
            <div class="d-inline-block align-items-center">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                  <li class="breadcrumb-item" aria-current="page">Users</li>
                  <li class="breadcrumb-item active" aria-current="page">Users Edit</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>

      <section class="content">
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Users Edit</h4>
          </div>
        <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                <form action="{{ route('users.upate') }}" method="POST">
                  @csrf

                  <input type="hidden" name="user_id" value="{{ $users->id }}">

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group ">
                        <h5>User Role <span class="text-danger">*</span></h5>
                        <div class="controls">
                          <select name="role" id="role" required class="form-control">
                            <option value >Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="Editor">Editor</option>
                            <option value="Modarator">Modarator</option>
                          </select>
                        </div>
                      </div>					
                      
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <h5>User Name <span class="text-danger">*</span></h5>
                        <div class="controls">
                          <input type="text" name="name" class="form-control" value="{{ $users->name }}"> 
                        </div>

                        <span class="text-danger">
                          @error('name')
                            {{ $message }}
                          @enderror
                        </span>
                      </div>

                    </div>

                    <div class="col-6">
                      <div class="form-group">
                        <h5>User Email <span class="text-danger">*</span></h5>
                        <div class="controls">
                          <input name="email" type="email" class="form-control" value="{{ $users->email }}"> 
                        </div>

                        <span class="text-danger">
                          @error('email')
                            {{ $message }}
                          @enderror
                        </span>
                      </div>
                    </div>

                    <div class="col-6">
                      <div class="form-group">
                        <h5>User Password <span class="text-danger">*</span></h5>
                        <div class="controls">
                          <input name="password" type="password" class="form-control" value="{{ $users->password }}"> 
                        </div>

                         <span class="text-danger">
                            @error('password')
                              {{ $message }}
                            @enderror
                          </span>

                      </div>
                    </div>

                  </div>

                  <div class="text-xs-right">
                    <input type="submit" class="btn btn-rounded btn-info" value="Save">
                  </div>

                </form>

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
    </div>
  </div>
@endsection
