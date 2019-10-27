@extends('backend.master.master')

@section('mainContent')
    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content login-form">
            <div class="col-12 pl-0 pr-0">
                <div class="form-group">

                    @include('backend.parcials.message')

                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">User Password Update Form</h4>
                    </div>
                </div>
                <form method="POST" action="{{ route('user-password-update', ['user'=>$user->id]) }}" autocomplete="off" class="form-inline">
                    @csrf

                    <div class="form-group col-12 mb-3">
                        <label for="currentPassword" class="col-sm-3 col-form-label text-right">Current Password</label>
                        <input id="currentPassword" type="password" class="col-sm-9 form-control @error('currentPassword') is-invalid @enderror" name="currentPassword" placeholder="Password" required autofocus>
                        @error('currentPassword')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group col-12 mb-3">
                        <label for="newPassword" class="col-sm-3 col-form-label text-right">New Password</label>
                        <input id="newPassword" type="password" class="col-sm-9 form-control @error('new_password') is-invalid @enderror" name="new_password" placeholder="New Password" required autofocus>
                        @error('new_password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group col-12 mb-3">
                        <label class="col-sm-3"></label>
                        <button type="submit" class="col-sm-9 btn btn-block my-btn-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--Content End-->
@endsection
