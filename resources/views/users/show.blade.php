@extends('layouts.app')
@section('title', 'Blog Post')

@section('content')

    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline my-2">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="avatar profile-user-img img-fluid img-circle img-thumbnail"
                            src="https://placehold.co/128x128" alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center my-1">{{ $user->name }}</h3>

                    <p class="text-muted text-center">Software Engineer</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Followers</b> <a class="float-right">1,322</a>
                        </li>
                        <li class="list-group-item">
                            <b>Following</b> <a class="float-right">543</a>
                        </li>
                        <li class="list-group-item">
                            <b>Friends</b> <a class="float-right">13,287</a>
                        </li>
                    </ul>

                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary my-2">
                <div class="card-header">
                    <h5 class="card-title">Upload a diffrent photo</h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <p class="text-muted">

                    </p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h3>{{ $user->name }}</h3>
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->


@endsection
