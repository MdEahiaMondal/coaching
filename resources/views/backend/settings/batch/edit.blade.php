@extends('backend.master.master')

@section('title', '')

@push('css')


@endpush


@section('mainContent')

    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
            <div class="col-md-8 offset-md-2 pl-0 pr-0">
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Edit Batch Form</h4>
                    </div>
                </div>

                @include('backend.parcials.message')

                <form action="{{ route('batch.update',$batch->id) }}" method="post" >
                    @csrf
                    @method("PUT")
                    <div class="table-responsive p-1">
                        <table id="" class="table table-bordered dt-responsive nowrap text-center" style="width: 100%;">

                            <tr>
                                <td>
                                    <div class="form-group row mb-0">
                                        <label for="className" class="col-form-label col-sm-3 text-right">Class Name</label>
                                        <div class="col-sm-9">

                                            <select name="class_id" class="form-control @error('class_id') is-invalid @enderror" id="className" required autofocus>
                                                <option value="">---Select Class---</option>
                                                @foreach($classes as $class)
                                                    <option {{ $class->id == $batch->class_id ? 'selected' : ''}}  value="{{ $class->id }}">{{ $class->class_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('class_id')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="form-group row mb-0">
                                        <label for="studentType" class="col-form-label col-sm-3 text-right">Student Type </label>
                                        <div class="col-sm-9">
                                            <select name="student_type_id" class="form-control @error('student_type_id') is-invalid @enderror" id="studentType" required autofocus>
                                                <option value="">---Select Type---</option>
                                                @foreach($student_types as $type)
                                                    <option {{ $batch->student_type_id == $type->id ? 'selected' : '' }} value="{{ $type->id }}">{{ $type->student_type }}</option>
                                                @endforeach
                                            </select>
                                            @error('student_type_id')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="form-group row mb-0">
                                        <label for="BatchName" class="col-form-label col-sm-3 text-right">Batch Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('batch_name') is-invalid @enderror" name="batch_name" value="{{ $batch->batch_name }}" id="BatchName" placeholder="Write Batch Name here" required>
                                            @error('batch_name')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="form-group row mb-0">
                                        <label for="student_capacity" class="col-form-label col-sm-3 text-right">Student Capacity </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('student_capacity') is-invalid @enderror" name="student_capacity" value="{{ $batch->student_capacity }}" id="student_capacity" placeholder="Student Capacity" required>
                                            @error('student_capacity')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <button type="submit" class="btn btn-block my-btn-submit">Update</button>
                                </td>
                            </tr>

                        </table>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--Content End-->

@endsection



@push('script')
    <script>
        $("#className").change(function () {
            var class_id = $(this).val();
            if (class_id)
            {
                $("#overlay .loader").show();
                $.post('{{ route('class.wise.student-type') }}', {class_id: class_id}, function(res) {
                    $("#studentType").html(res);
                    $("#overlay .loader").hide();
                })
            }else{
                $("#batchList").html('')
                $("#studentType").html('<option value="">---Select Type---</option>');
            }
        })
    </script>
@endpush
