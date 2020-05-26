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
                            <h4 class="text-center font-weight-bold font-italic mt-3">Batch Wise Students Attendance View</h4>
                        </div>
                    </div>

                    @include('backend.parcials.message')

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group row mr-2">
                                <select name="class_id" class="form-control" id="className" required autofocus>
                                    <option value="">---Select Class---</option>
                                    @foreach($classes as $class)
                                        <option  value="{{ $class->id }}">{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group row mr-2">
                                <select name="student_type_id" class="form-control @error('student_type_id') is-invalid @enderror" id="studentType" required autofocus>
                                    <option value="">---Select Type---</option>
                                </select>
                                @error('student_type_id')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group row mr-3">
                                <select name="batch_id" class="form-control @error('batch_id') is-invalid @enderror" id="batchId" required autofocus>
                                    <option value="">---Select Batch---</option>
                                </select>
                                @error('batch_id')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group row mb-0">
                                <input type="date" class="form-control" id="date">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 pl-0 pr-0 mt-5">
                    <div class="student_list">

                    </div>
                </div>
            </div>
    </section>
    <!--Content End-->


@endsection

<style>
    #overlay .loader{
        display: none;
    }
</style>
@include('backend.parcials.loader')


@push('script')
    <script>
        $("#className").change(function () {
            var class_id = $(this).val();
            if (class_id)
            {
                $("#overlay .loader").show();
                $.post('{{ route('student.registration.class-wise-student-type-show-for-student') }}', {class_id: class_id}, function(res) {
                    $("#studentType").html(res);
                    $("#overlay .loader").hide();
                })
            }else{
                $("#batchList").html('')
                $("#studentType").html('<option value="">---Select Type---</option>');
            }
        })

        $("#studentType").change(function () {
            var student_type_id = $(this).val();
            var class_id = $("#className").val();
            if(class_id && student_type_id){
                $.post("{{ route('student.registration.batch-wise-students-batch-list') }}", {class_id:class_id, student_type_id: student_type_id}, function (feedBackResult) {
                    $("#batchId").html(feedBackResult)
                    /*$(".student_list").html(feedBackResult)*/
                })
            }
        })

        $("#date").change(function () {
            var student_type_id = $("#studentType").val();
            var class_id = $("#className").val();
            var batch_id = $('#batchId').val();
            var date = $(this).val();
            if(class_id && student_type_id && batch_id && date){
                $.post("{{ route('attendance.batch-wise-student-attendance-view') }}", {
                    class_id:class_id,
                    student_type_id: student_type_id,
                    batch_id:batch_id,
                    date:date,
                }, function (feedBackResult) {
                    console.log(feedBackResult)
                    $(".student_list").html(feedBackResult)
                    /*if(feedBackResult)
                    {
                        $(".student_list").html(feedBackResult)
                    }else{
                        toastr.warning('This Batch\'s attendance already created ')
                    }*/

                })
            }
        })
        /*
        $("#batchId").change(function () {
            var student_type_id = $("#studentType").val();
            var class_id = $("#className").val();
            var academic_session = $("#academicSession").val();
            var batch_id = $(this).val();
            if(class_id && student_type_id && batch_id && academic_session){
                $.post("{{ route('attendance.student-lists') }}", {
                    class_id:class_id,
                    student_type_id: student_type_id,
                    batch_id:batch_id,
                    academic_session:academic_session,
                }, function (feedBackResult) {
                    console.log(feedBackResult)
                    if(feedBackResult)
                    {
                        $(".student_list").html(feedBackResult)
                    }else{
                        toastr.warning('This Batch\'s attendance already created ')
                    }

                })
            }
        })*/

    </script>
@endpush
