@extends('backend.master.master')

@section('mainContent')

    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
            <div class="col-md-8 offset-md-2 pl-0 pr-0">
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">School Edit Form</h4>
                    </div>
                </div>

                @include('backend.parcials.message')

                <form action="{{ route('school-update', ['school'=>$school->id]) }}" method="post" >
                    @csrf
                    <div class="table-responsive p-1">
                        <table id="" class="table table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                            <tr>
                                <td>
                                    <div class="form-group row mb-0">
                                        <label for="schoolName" class="col-form-label col-sm-3 text-right">School Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $school->school_name }}" id="schoolName" placeholder="Write School Name here" required>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr><td><button type="submit" class="btn btn-block my-btn-submit">update</button></td></tr>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--Content End-->
@endsection
