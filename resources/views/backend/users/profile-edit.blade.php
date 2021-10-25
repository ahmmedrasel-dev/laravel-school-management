@extends('backend.master')

@section('profile_active')
  active
@endsection

@section('subprofile_active')
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
                  <li class="breadcrumb-item active" aria-current="page">Users Create</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>

      <section class="content">
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Users Profile Edit</h4>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                <form action="{{ route('users.profile.update') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
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
                          <input type="email" name="email" class="form-control" value="{{ $users->email }}"> 
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
                        <h5>User Phone <span class="text-danger">*</span></h5>
                        <div class="controls">
                          <input type="text" name="mobile" class="form-control" value="{{ $users->mobile }}"> 
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
                        <h5>User Address <span class="text-danger">*</span></h5>
                        <div class="controls">
                          <input type="text" name="address" class="form-control" value="{{ $users->address }}"> 
                        </div>

                        <span class="text-danger">
                          @error('address')
                            {{ $message }}
                          @enderror
                        </span>
                      </div>

                    </div>

                    <div class="col-6">
                      <div class="form-group ">
                        <h5>Gender <span class="text-danger">*</span></h5>
                        <div class="controls">
                          <select name="gender" id="role" required class="form-control">
                            <option value>Select Gender</option>
                            <option value="male" {{ ($users->gender == 'male') ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $users->gender== 'female' ? 'selected' : '' }}>Female</option>
                          </select>
                        </div>
                      </div>					
                      
                    </div>
                    

                    <div class="col-6">
                      <div class="form-group">
                        <h5>User Photo <span class="text-danger">*</span></h5>
                        <div class="controls">
                          <input class="form-control" type="file" name="images" id="profile_photo" onchange="document.getElementById('thumbnail_id').src = window.URL.createObjectURL(this.files[0])">
                        </div>

                        <span class="text-danger">
                          @error('email')
                            {{ $message }}
                          @enderror
                        </span>
                      </div>

                      <div class="controls">
                          <img width="100px" id="thumbnail_id" src="{{ !empty( $users->images) ? asset($users->images) : asset('default_images/default.jpg') }}" alt="profile_photo">
                      </div>

                    </div>

                  </div>

                  <div class="text-xs-right">
                    <input type="submit" class="btn btn-rounded btn-info" value="Save Changes">
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

