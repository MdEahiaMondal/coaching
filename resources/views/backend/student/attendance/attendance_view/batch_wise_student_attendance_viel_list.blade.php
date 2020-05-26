@if($attendances->count() > 0)
    <div class="table-responsive p-1">
        <table id="class_wise_student_lists" class="table table-striped table-bordered dt-responsive  text-center" style="width: 100%;">
            <thead>
            <tr>
                <th>Sl.</th>
                <th>Student</th>
                <th>School</th>
                <th>Roll No</th>
                <th>SMS Mobile</th>
                <th style="width: 100px;">Action</th>
            </tr>
            </thead>
            <tbody>
            @php($i = 1)
            @foreach($attendances as $attendance)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $attendance->student_name }}</td>
                    <td>{{ $attendance->school_name }}</td>
                    <td>{{ $attendance->roll_no }}</td>
                    <td>{{ $attendance->sms_mobile }}</td>
                    <td>
                        <span class="badge {{ $attendance->attendance == 1 ? 'badge-success' : 'badge-danger' }}">{{ $attendance->attendance == 1 ? 'Present' : 'Absent'  }}</span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@else
    <p class="alert alert-danger text-center">Not found</p>
@endif
