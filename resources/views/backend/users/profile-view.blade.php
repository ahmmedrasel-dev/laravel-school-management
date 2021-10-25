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
        <div class="row">
          <div class="col-md-12">
            <div class="box box-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-black">
                <h3 class="widget-user-username">{{ $user->name }}</h3>
                <a href="{{ route('users.profile.edit', $user->id) }}" class="btn btn-primary float-right">Edit</a>
                <h6 class="widget-user-desc">{{ $user->user_type }}</h6>
                <h6 class="widget-user-desc">{{ $user->email }}</h6>
                
              </div>
              <div class="widget-user-image">
                <img class="rounded-circle" src="{{ !empty( $user->images ) ? asset( $user->images ) : asset('default_images/default.jpg') }}" alt="User Avatar">
              </div>
              <div class="box-footer">
                <div class="row">
                <div class="col-sm-4">
                  <div class="description-block">
                  <h5 class="description-header">12K</h5>
                  <span class="description-text">FOLLOWERS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 br-1 bl-1">
                  <div class="description-block">
                  <h5 class="description-header">550</h5>
                  <span class="description-text">FOLLOWERS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                  <h5 class="description-header">158</h5>
                  <span class="description-text">TWEETS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection