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
        @foreach($students as $student)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $student->student_name }}</td>
                <td>{{ $student->school_name }}</td>
                <td>{{ $student->roll_no }}</td>
                <td>{{ $student->sms_mobile }}</td>
                <td>
                    Present <input type="radio" name="attendance[{{ $student->id  }}]" value="1">
                    Absent <input type="radio" checked name="attendance[{{ $student->id }}]" value="0">
                </td>
            </tr>
        @endforeach
        @if($students->count() > 0)
            <tr>
                <td colspan="6"><button type="submit" class="btn my-btn-submit btn-block">Submit Attendance </button></td>
            </tr>
        @endif
        </tbody>
    </table>
</div>

<script>
</script>
