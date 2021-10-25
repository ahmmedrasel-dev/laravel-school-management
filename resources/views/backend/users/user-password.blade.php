@extends('backend.master')

@section('profile_active')
  active
@endsection

@section('subpassword_active')
  active
@endsection

@section('content')
  <div class="content-wrapper">
    <div class="container-full">

      <div class="content-header">
        <div class="d-flex align-items-center">
          <div class="mr-auto">
            <h3 class="page-title">Users Password Change</h3>
            <div class="d-inline-block align-items-center">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                  <li class="breadcrumb-item" aria-current="page">Users</li>
                  <li class="breadcrumb-item active" aria-current="page">Password Change</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>

      <section class="content">
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Change Password</h4>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                <form action="{{ route('users.password.update') }}" method="POST">
                  @csrf

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <h5>User Current Password <span class="text-danger">*</span></h5>
                        <div class="controls">
                          <input type="password" id="current_password" name="current_password" class="form-control" placeholder="User Current Password"> 
                        </div>

                        <span class="text-danger">
                          @error('current_password')
                            {{ $message }}
                          @enderror
                        </span>
                      </div>

                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <h5>User New Password <span class="text-danger">*</span></h5>
                        <div class="controls">
                          <input name="password" id="password" type="password" class="form-control" placeholder="User New Password"> 
                        </div>

                        <span class="text-danger">
                          @error('password')
                            {{ $message }}
                          @enderror
                        </span>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <h5>Confirmation Password <span class="text-danger">*</span></h5>
                        <div class="controls">
                          <input name="password_confirmation" id="password_confirmation" type="password" class="form-control" placeholder="User Password"> 
                        </div>

                          <span class="text-danger">
                            @error('password_confirmation')
                              {{ $message }}
                            @enderror
                          </span>

                      </div>
                    </div>

                  </div>

                  <div class="text-xs-right">
                    <input type="submit" class="btn btn-rounded btn-info" value="Save Change">
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
