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
                        <h4 class="text-center font-weight-bold font-italic mt-3">Add Exam Form</h4>
                    </div>
                </div>

                @include('backend.parcials.message')

                <form action="{{ route('exam.store') }}" method="post" >
                    @csrf
                    <div class="table-responsive p-1">
                        <table id="" class="table table-bordered dt-responsive nowrap text-center" style="width: 100%;">

                            <tr>
                                <td>
                                    <div class="form-group row mb-0">
                                        <label for="className" class="col-form-label col-sm-3 text-right">Class Name</label>
                                        <div class="col-sm-9">

                                            <select  name="class_id" class="form-control @error('class_id') is-invalid @enderror" id="className" required autofocus>
                                                <option value="">---Select Class---</option>
                                                @foreach($classes as $class)
                                                    <option  value="{{ $class->id }}">{{ $class->class_name }}</option>
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
                                        <label for="studentType" class="col-form-label col-sm-3 text-right">Student Type/Course </label>
                                        <div class="col-sm-9">
                                            <select name="student_type_id" class="form-control @error('student_type_id') is-invalid @enderror" id="studentType" required autofocus>
                                                <option value="">---Select Course---</option>
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
                                        <label for="examName" class="col-form-label col-sm-3 text-right">Exam Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('exam_name') is-invalid @enderror" name="exam_name" value="{{ old('exam_name') }}" id="examName" placeholder="Write Exam Name here" required>
                                            @error('exam_name')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="form-group row mb-0">
                                        <label for="examType" class="col-form-label col-sm-3 text-right">Exam Type </label>
                                        <div class="col-sm-9">
                                            <select name="exam_type" class="form-control @error('exam_type') is-invalid @enderror" id="examType" required autofocus>
                                                <option value="normal">Normal Result</option>
                                                <option value="weighted">Weighted Result</option>
                                            </select>
                                            @error('exam_type')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <button type="submit" class="btn btn-block my-btn-submit">Create</button>
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
    </script>

@endpush
