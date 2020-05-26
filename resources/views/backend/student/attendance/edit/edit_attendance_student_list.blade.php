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
                    Present <input type="radio" name="attendance[{{ $attendance->id  }}]" {{ $attendance->attendance == 1 ? 'checked' : '' }} value="1">
                    Absent <input type="radio"  name="attendance[{{ $attendance->id }}]" {{ $attendance->attendance == 0 ? 'checked' : '' }} value="0">
                </td>
            </tr>
        @endforeach
        @if($attendances->count() > 0)
            <tr>
                <td colspan="6"><button type="submit" class="btn my-btn-submit btn-block">Update Attendance </button></td>
            </tr>
        @endif
        </tbody>
    </table>
</div>

<script>
</script>
