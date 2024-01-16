@extends('layouts.app')
@section('title', 'Blog Post')

@section('content')

    <form action="{{ route('users.update', ['user' => $user->id]) }}" class="form-horizontal" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline my-2">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle img-thumbnail"
                                src="{{ $user->image ? $user->image->url() : 'https://placehold.co/128x128' }}"
                                alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center my-2">{{ $user->name ? $user->name : '' }}</h3>

                        <p class="text-muted text-center">{{ $user->email ? $user->email : '' }}</p>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-primary my-2 text-muted">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <p class="text-muted">
                        <div class="mb-3">
                            <label for="" class="form-label">{{ __('Upload a diffrent avatar') }}</label>
                            <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar"
                                id="avatar" placeholder="{{ __('avatar') }}" aria-describedby="fileHelpId" />
                            <div id="fileHelpId" class="form-text">The content field must be a file of type: jpg, jpeg, png,
                                gif, svg and size 128x128px.</div>
                            <small id="avatar">
                                @error('avatar')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </small>
                        </div>
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
                        {{-- Name --}}
                        <div class="form-floating mb-3">
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('Name') }}"
                                value="{{ old('name', optional($user ?? null)->name) }}" autocomplete="off" />
                            <label for="name">{{ __('Name') }}</label>
                            <small id="helpId">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </small>
                        </div>

                        <div class="mb-3">
                            <label for="locale" class="form-label">{{ __('Language') }}</label>
                            <select class="form-select form-control form-select-lg" name="locale" id="locale">
                                <option selected>{{ __('Select one') }}</option>
                                @foreach (App\Models\User::LOCALE as $locale => $label)
                                    <option value="{{ $locale }}" {{ $user->locale != $locale ?: 'selected' }}>
                                        {{ __($label) }}
                                    </option>
                                @endforeach
                            </select>
                            <small id="helpId">
                                @error('locale')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </small>
                        </div>



                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block">{{ __('Save Changes') }}</button>
                        </div>
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </form>

@endsection
