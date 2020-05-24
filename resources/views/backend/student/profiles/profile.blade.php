@extends('backend.master.master')

@section('mainContent')

    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
            <div class="col-12 pl-0 pr-0">
                @include('backend.parcials.message')
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">{{ $students[0]->student_name }}`s profile</h4>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="table-responsive p-1">
                    <table class="table table-striped table-bordered dt-responsive  text-center" style="width: 100%;">
                        <tr>
                            <td>Your Profile</td>
                        </tr>
                        <tr>
                            <td><img style="width: 250px; height: 300px" src="{{ asset( $students[0]->student_photo ?? 'backend/images/avatar.jpeg') }}" alt=""></td>
                        </tr>
                        <tr>
                            <td><button class="btn btn-primary btn-sm" onclick="showEditProfileModal()">Edit profile</button></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="col-sm-9">
                <div class="table-responsive p-1">
                    <table class="table table-striped table-bordered dt-responsive" style="width: 100%;">
                        <tr>
                            <th>Name</th>
                            <td>{{ $students[0]->student_name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $students[0]->email_address }}</td>
                        </tr>
                        <tr>
                            <th>Class</th>
                            <td>{{ $students[0]->class_name }}</td>
                        </tr>
                        <tr>
                            <th>School</th>
                            <td>{{ $students[0]->school_name }}</td>
                        </tr>
                        <tr>
                            <th>Father`s name</th>
                            <td>{{ $students[0]->father_name }}</td>
                        </tr>
                        <tr>
                            <th>Father`s Profession</th>
                            <td>{{ $students[0]->father_profession }}</td>
                        </tr>
                        <tr>
                            <th>Father`s Mobile</th>
                            <td>{{ $students[0]->father_mobile }}</td>
                        </tr>
                        <tr>
                            <th>Mother`s name</th>
                            <td>{{ $students[0]->mother_name }}</td>
                        </tr>
                        <tr>
                            <th>Mother`s Profession</th>
                            <td>{{ $students[0]->mother_profession }}</td>
                        </tr>
                        <tr>
                            <th>SMS Mobile</th>
                            <td>{{ $students[0]->sms_mobile }}</td>
                        </tr>
                        <tr>
                            <th>Date Of Admission</th>
                            <td>{{ $students[0]->date_of_admission }}</td>
                        </tr>
                        <tr>
                            <th>Password</th>
                            <td>{{ $students[0]->password }}</td>
                        </tr>
                        <tr>
                            <th>Roll No</th>
                            <td>{{ $students[0]->roll_no }}</td>
                        </tr>
                        <tr>
                            <th>Batches</th>
                            <td>
                                @foreach($students as $student)
                                    <span><b>Batch Name: </b> {{ $student->batch_name }}, <b>Student Type:</b> {{ $student->student_type }}, <b>Roll No:</b> {{ $student->roll_no }}</span><br>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $students[0]->address }}</td>
                        </tr>

                    </table>
                </div>
            </div>

        </div>
    </section>
    <!--Content End-->
@include('backend.student.profiles.edit.modal.edit')
@endsection

@push('script')
    <script>
        function showEditProfileModal() {
            $("#StudentEditModal").modal('show')
        }

    </script>
@endpush
