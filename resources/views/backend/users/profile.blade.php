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

                        <tr> <td colspan="2"><img src="{{ asset('backend/images/avatar.png') }}" alt=""> </td> </tr>
                        <tr> <th>Name</th>  <td>{{ $user->name }}</td> </tr>
                        <tr> <th>Role</th>  <td>{{ $user->role }}</td> </tr>
                        <tr> <th>Email</th>  <td>{{ $user->email }}</td> </tr>
                        <tr> <th>Mobile</th>  <td>{{ $user->mobile }}</td> </tr>
                        <tr> <th> Action </th>
                            <td>
                                <a href="{{ route('change-info',['user'=>$user->id]) }}" class="btn btn-sm btn-dark">Change Info</a>
                                <a href="#" class="btn btn-sm btn-info"> Change Photo </a>
                                <a href="#" class="btn btn-sm btn-danger"> Change Password </a>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--Content End-->

@endsection
