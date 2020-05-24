@extends('backend.master.master')

@section('title', '')

@push('css')


@endpush


@section('mainContent')

    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
            <div class="col-12 pl-0 pr-0">
                @include('backend.parcials.message')
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">New Student Registration Form</h4>
                    </div>
                </div>
                <form action="{{ route('studentregister.store') }}" method="post" enctype="multipart/form-data" class="form-inline">
                    @csrf
                    <div class="form-group col-md-6 mb-3">
                        <label for="studentName" class="col-sm-4 text-right">Student Name</label>
                        <input type="text" name="student_name" class="form-control col-sm-8 @error('student_name') is-invalid @enderror" placeholder="Student Name" value="{{ old('student_name') }}" id="studentName" >
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="schoolId" class="col-sm-4 col-form-label text-right">School Name</label>
                        <select name="school_id" class="form-control col-sm-8 @error('school_id') is-invalid @enderror" id="schoolId">
                            <option value="">Select School</option>
                            @foreach($schools as $school)
                                <option {{ old('school_id') == $school->id ? 'selected' : '' }} value="{{ $school->id }}">{{ $school->school_name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger"></span>
                    </div>


                   {{-- <div class="form-group col-md-6 mb-3">
                        <label for="batchId" class="col-sm-4 col-form-label text-right">Batch</label>
                        <select name="batch_id" class="form-control col-sm-8" id="batchId" >
                            <option value="{{ old('student_name') }}">Select Batch</option>
                        </select>
                    </div>--}}

                    <div class="form-group col-md-6 mb-3">
                        <label for="fatherName" class="col-sm-4 col-form-label text-right">Father's Name</label>
                        <input type="text" name="father_name" class="form-control col-sm-8 @error('student_name') is-invalid @enderror" placeholder="Father's Name" value="{{ old('father_name') }}" id="fatherName" >
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="fatherMobile" class="col-sm-4 col-form-label text-right">Father's Mobile No.</label>
                        <input type="text" name="father_mobile" class="form-control col-sm-8 @error('father_mobile') is-invalid @enderror" id="fatherMobile" placeholder="8801XXXXXXXXX" value="{{ old('father_mobile') }}" minlength="13" maxlength="13" >
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="fatherProfession" class="col-sm-4 col-form-label text-right">Father's Profession</label>
                        <input type="text" name="father_profession" class="form-control col-sm-8 @error('father_profession') is-invalid @enderror" id="fatherProfession" placeholder="Father's Profession" value="{{ old('father_profession') }}" >
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="motherName" class="col-sm-4 col-form-label text-right">Mother's Name</label>
                        <input type="text" name="mother_name" class="form-control col-sm-8 @error('mother_name') is-invalid @enderror" placeholder="Mother's Name" value="{{ old('mother_name') }}" id="motherName" >
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="motherMobile" class="col-sm-4 col-form-label text-right">Mother's Mobile No.</label>
                        <input type="text" name="mother_mobile" class="form-control col-sm-8 @error('mother_mobile') is-invalid @enderror" id="motherMobile" placeholder="8801XXXXXXXXX" value="{{ old('mother_mobile') }}" minlength="13" maxlength="13" >
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="motherProfession" class="col-sm-4 col-form-label text-right">Mother's Profession</label>
                        <input type="text" name="mother_profession" class="form-control col-sm-8 @error('mother_profession') is-invalid @enderror" id="motherProfession" placeholder="Mother's Profession" value="{{ old('mother_profession') }}" >
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="emailAddress" class="col-sm-4 col-form-label text-right">Email Address</label>
                        <input type="email" name="email_address" class="form-control col-sm-8 @error('email_address') is-invalid @enderror" id="emailAddress" placeholder="example@example.com" value="{{ old('email_address') }}">
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="smsMobile" class="col-sm-4 col-form-label text-right">SMS Mobile No.</label>
                        <input type="text" name="sms_mobile" class="form-control col-sm-8 @error('sms_mobile') is-invalid @enderror" id="smsMobile" placeholder="8801XXXXXXXXX" value="{{ old('sms_mobile') }}" minlength="13" maxlength="13" >
                        <span class="text-danger"></span>
                    </div>

                  {{--  <div class="form-group col-md-6 mb-3">
                        <label for="monthId" class="col-sm-4 col-form-label text-right">Starting Month</label>
                        <select name="starting_month_id" class="form-control col-sm-8" id="monthId" >
                            <option value="{{ old('student_name') }}">Select Month</option>
                        </select>
                        <span class="text-danger"></span>
                    </div>--}}
{{--
                    <div class="form-group col-md-6 mb-3">
                        <label for="yearId" class="col-sm-4 col-form-label text-right">Starting Year</label>
                        <select name="starting_year_id" class="form-control col-sm-8" id="yearId" >
                            <option value="{{ old('student_name') }}">Select Year</option>
                        </select>
                        <span class="text-danger"></span>
                    </div>--}}

                    <div class="form-group col-md-6 mb-3">
                        <label for="dateOfAdmission" class="col-sm-4 col-form-label text-right">Admission Date</label>
                        <input type="date" name="date_of_admission" value="{{ old('date_of_admission') }}" class="form-control col-sm-8 @error('date_of_admission') is-invalid @enderror" id="dateOfAdmission" >
                        <div class="col-md-8 text-right">
                            <span class="text-danger"></span>
                        </div>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="photo" class="col-sm-4 col-form-label text-right">Student Photo</label>
                        <input type="file" name="student_photo" class="form-control col-sm-8 @error('student_photo') is-invalid @enderror" id="photo">
                    </div>


                    <div class="col-12">
                        <div class="row" id="batchRoleFormInfo">
                            <div class="form-group col-md-6 mb-3">
                                <label for="className" class="col-sm-4 col-form-label text-right">Class Name</label>
                                <select name="class_id" class="form-control col-sm-8 @error('class_id') is-invalid @enderror" id="className" >
                                    <option value="">Select Class</option>
                                    @foreach($calsses as $class)
                                        <option {{ old('class_id') == $class->id ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>

                            <div class="form-group col-md-6 mb-3">
                                <label class="col-sm-4 col-form-label text-right">Student Type</label>
                                <div class="col-sm-8" id="studentType">
                                    <span class="text-info">first select class name</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-12 mb-3 pl-2">
                        <label for="address" class="col-sm-2 col-form-label text-right">Address</label>
                        <input type="text" name="address" class="form-control col-sm-10 @error('address') is-invalid @enderror" id="address" placeholder="Detail Address" value="{{ old('address') }}" />
                    </div>

                    <input type="hidden" name="status" value="1"/>

                    <div class="form-group col-md-12 mb-3">
                        <button type="submit" class="btn btn-block my-btn-submit">Save Student</button>
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

       $().ready(function () {

           // old class id
           @if(old('class_id') > 0)
           $("#className").val("{!! old('class_id') !!}");
           $("#className").trigger('change'); // autometic run
           updateDynamicClassWiseStudentType($("#className"));
           @endif

           $("#className").change(function () {
               updateDynamicClassWiseStudentType(this);
           });

           function updateDynamicClassWiseStudentType(element) {
               var class_id = $(element).val();
               console.log(class_id)
               if (class_id) {
                   $("#overlay .loader").show();
                   $.post('{{ route('student.registration.class.wise.student-type') }}', {class_id: class_id}, function(res) {
                       console.log(res)
                       $("#batchRoleFormInfo").html(res);
                       $("#overlay .loader").hide();
                   })
               }else{
                   console.log('sad')
                   $("#batchList").html('')
                   $("#studentType").html('<span class="text-info">first select class name</span>');
               }
           }

           $("#studentRoll").onkeyup(function () {
               console.log($(this).val())
           })
       })


        $("#studentType").change(function () {
            var student_type_id = $(this).val();
            var class_id = $("#className").val();
            if(class_id && student_type_id){
                $.get("{{ route('get.batch.data') }}", {class_id:class_id, student_type_id: student_type_id}, function (feedBackResult) {
                    $("#batchList").html(feedBackResult)
                })
            }

        })




    </script>
@endpush
