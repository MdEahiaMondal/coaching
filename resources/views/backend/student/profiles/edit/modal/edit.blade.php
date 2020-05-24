<div class="modal fade bd-example-modal-xl" id="StudentEditModal" tabindex="-1" role="dialog" aria-labelledby="StudentEditModal" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="StudentEditModal">Edit profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('studentregister.update', $students[0]->id) }}" method="post" enctype="multipart/form-data" class="form-inline">
                    @method('put')
                    @csrf
                    <div class="form-group col-md-6 mb-3">
                        <label for="studentName" class="col-sm-4 text-right">Student Name</label>
                        <input type="text" name="student_name" class="form-control col-sm-8 @error('student_name') is-invalid @enderror" placeholder="Student Name" value="{{ $students[0]->student_name }}" id="studentName" >
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="schoolId" class="col-sm-4 col-form-label text-right">School Name</label>
                        <select name="school_id" class="form-control col-sm-8 @error('school_id') is-invalid @enderror" id="schoolId">
                            <option value="">Select School</option>
                            @foreach($schools as $school)
                                <option {{ $students[0]->school_id == $school->id ? 'selected' : '' }} value="{{ $school->id }}">{{ $school->school_name }}</option>
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
                        <input type="text" name="father_name" class="form-control col-sm-8 @error('student_name') is-invalid @enderror" placeholder="Father's Name" value="{{ $students[0]->father_name }}" id="fatherName" >
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="fatherMobile" class="col-sm-4 col-form-label text-right">Father's Mobile No.</label>
                        <input type="text" name="father_mobile" class="form-control col-sm-8 @error('father_mobile') is-invalid @enderror" id="fatherMobile" placeholder="8801XXXXXXXXX" value="{{  $students[0]->father_mobile }}" minlength="13" maxlength="13" >
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="fatherProfession" class="col-sm-4 col-form-label text-right">Father's Profession</label>
                        <input type="text" name="father_profession" class="form-control col-sm-8 @error('father_profession') is-invalid @enderror" id="fatherProfession" placeholder="Father's Profession" value="{{ $students[0]->father_profession }}" >
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="motherName" class="col-sm-4 col-form-label text-right">Mother's Name</label>
                        <input type="text" name="mother_name" class="form-control col-sm-8 @error('mother_name') is-invalid @enderror" placeholder="Mother's Name" value="{{ $students[0]->mother_name }}" id="motherName" >
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="motherMobile" class="col-sm-4 col-form-label text-right">Mother's Mobile No.</label>
                        <input type="text" name="mother_mobile" class="form-control col-sm-8 @error('mother_mobile') is-invalid @enderror" id="motherMobile" placeholder="8801XXXXXXXXX" value="{{ $students[0]->mother_mobile }}" minlength="13" maxlength="13" >
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="motherProfession" class="col-sm-4 col-form-label text-right">Mother's Profession</label>
                        <input type="text" name="mother_profession" class="form-control col-sm-8 @error('mother_profession') is-invalid @enderror" id="motherProfession" placeholder="Mother's Profession" value="{{ $students[0]->mother_profession }}" >
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="emailAddress" class="col-sm-4 col-form-label text-right">Email Address</label>
                        <input type="email" name="email_address" class="form-control col-sm-8 @error('email_address') is-invalid @enderror" id="emailAddress" placeholder="example@example.com" value="{{ $students[0]->email_address }}">
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="smsMobile" class="col-sm-4 col-form-label text-right">SMS Mobile No.</label>
                        <input type="text" name="sms_mobile" class="form-control col-sm-8 @error('sms_mobile') is-invalid @enderror" id="smsMobile" placeholder="8801XXXXXXXXX" value="{{ $students[0]->sms_mobile }}" minlength="13" maxlength="13" >
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="dateOfAdmission" class="col-sm-4 col-form-label text-right">Admission Date</label>
                        <input type="date" name="date_of_admission" value="{{ $students[0]->date_of_admission }}" class="form-control col-sm-8 @error('date_of_admission') is-invalid @enderror" id="dateOfAdmission" >
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="address" class="col-sm-4 col-form-label text-right">Address</label>
                        <textarea name="address" id="address" class="form-control col-sm-8">{{ $students[0]->address }}</textarea>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="photo" class="col-sm-4 col-form-label text-right">Student Photo</label>
                        <input type="file" name="student_photo" class="form-control col-sm-8 @error('student_photo') is-invalid @enderror" id="photo">
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <img src="{{ asset($students[0]->student_photo) ?? asset('backend/images/avatar.jpeg') }}" alt="">
                    </div>

                 {{--   <div class="col-12">
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
--}}
                    <input type="hidden" name="status" value="1"/>

                    <div class="form-group col-md-12 mb-3">
                        <button type="submit" class="btn btn-block my-btn-submit">Save Student</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
