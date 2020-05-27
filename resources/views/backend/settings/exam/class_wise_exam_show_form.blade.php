@extends('backend.master.master')

@section('title', '')

@push('css')


@endpush


@section('mainContent')

    <!--Content Start-->
    <section class="container-fluid">
        <form action="{{ route('attendance.store') }}" method="post">
            @csrf
            <div class="row content">
                <div class="col-md-8 offset-md-2 pl-0 pr-0">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <h4 class="text-center font-weight-bold font-italic mt-3">Class wise exam list</h4>
                        </div>
                    </div>

                    @include('backend.parcials.message')


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row mr-2">
                                <select name="class_id" class="form-control" id="className" required autofocus>
                                    <option value="">---Select Class---</option>
                                    @foreach($classes as $class)
                                        <option  value="{{ $class->id }}">{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row mr-2">
                                <select name="student_type_id" class="form-control @error('student_type_id') is-invalid @enderror" id="studentType" required autofocus>
                                    <option value="">---Select Course---</option>
                                </select>
                                @error('student_type_id')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 pl-0 pr-0 mt-5">
                    <div class="exam_list">

                    </div>
                </div>
            </div>
        </form>

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
                $.post('{{ route('exam.class.wise.student-type') }}', {class_id: class_id}, function(res) {
                    $("#studentType").html(res);
                    $("#overlay .loader").hide();
                })
            }else{
                $("#studentType").html('<option value="">---Select Type---</option>');
            }
        })

        $("#studentType").change(function () {
            var student_type_id = $(this).val();
            var class_id = $("#className").val();
            if(class_id && student_type_id){
                $.post("{{ route('exam.class-wise-exam-lists') }}", {
                    class_id:class_id,
                    student_type_id: student_type_id,
                }, function (feedBackResult) {
                    if(feedBackResult)
                    {
                        $(".exam_list").html(feedBackResult)
                    }else{
                        toastr.warning('This Batch\'s attendance already created ')
                    }
                })
            }
        })

        // publish status
        function publishedUnpublished(exam_id, status) {
            event.preventDefault();
            var check =  confirm("Are you sure to change status ? Press Ok");
            if(check){
                $.post("{{ route('exam.status-published-unpublished') }}", {exam_id: exam_id,status:status } , function (feedBackResult) {
                    toastr.success('Publication status Change Successfully');

                    $(".exam_list").html(feedBackResult)
                })
            }
        }

        // delete batch
        function examDelete(exam_id) {
            var check =  confirm("Are you sure want to delete it ? Press Ok");
            if(check){
                $.ajax({
                    url: "{{ route('exam.destroy', '') }}/"+exam_id,
                    method: "DELETE",
                    success:function (feedBackResult) {
                        console.log(feedBackResult)
                        toastr.success('Exam Deleted Successfull');
                        $(".exam_list").html(feedBackResult)
                    }
                });
            }
        }

    </script>
@endpush
