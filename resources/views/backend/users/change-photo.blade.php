@extends('backend.master.master')

@section('mainContent')

    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
            <div class="col-md-8 offset-md-2 pl-0 pr-0">
                <div class="form-group">
                    <div class="col-sm-12">

                        @if(Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success</strong> {{ Session::get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif


                        <h4 class="text-center font-weight-bold font-italic mt-3"> <b>{{auth()->user()->name}}'s</b>  Profile </h4>
                    </div>
                </div>

                <div class="table-responsive p-1">
                    <table  class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                        <form action="{{ route('user-photo-update',['user'=>$user->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <tr> <td colspan="2"><img src=" @if($user->avatar) {{ asset('backend/profile-image/'.$user->avatar) }} @else {{ asset('backend/images/avatar.png') }} @endif " id="profile_photo" style="max-width: 400px;" alt=""> </td> </tr>
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input"  name="avatar" id="avatar" onchange="showImage(this, 'profile_photo')" value="">
                                            <label class="custom-file-label" for="inputGroupFile02" id="fileLabel"></label>
                                        </div>

                                    </div>
                                </td>
                            </tr>

                            <tr><td><input type="submit" class="btn btn-block my-btn-submit"> </td></tr>

                        </form>

                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--Content End-->

@endsection
