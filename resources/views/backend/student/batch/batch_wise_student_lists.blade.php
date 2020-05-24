<div class="table-responsive p-1">
    <table id="class_wise_student_lists" class="table table-striped table-bordered dt-responsive  text-center" style="width: 100%;">
        <thead>
        <tr>
            <th>Sl.</th>
            <th>Student</th>
            <th>School</th>
            <th>Roll No</th>
            <th>Father`s name</th>
            <th>Father`s Mobile</th>
            <th>Mother`s name</th>
            <th>Mother`s Mobile</th>
            <th>SMS Mobile</th>
            <th>Address</th>
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
                <td>{{ $student->father_name }}</td>
                <td>{{ $student->father_mobile }}</td>
                <td>{{ $student->mother_name }}</td>
                <td>{{ $student->mother_mobile }}</td>
                <td>{{ $student->sms_mobile }}</td>
                <td>{{ $student->address }}</td>
                <td>
                    {{-- @if($student->student_register_status == 1)
                         <a href="{{ route('slider-unpublish',['slider'=>$student->id]) }}" title="press to unpublish" class="btn btn-sm btn-success"><span class="fa fa-arrow-alt-circle-down"></span></a>
                     @else
                         <a href="{{ route('slider-publish',['slider'=>$student->id]) }}" class="btn btn-sm btn-warning"><span title="press to publish" class="fa fa-arrow-alt-circle-up"></span></a>
                     @endif
 --}}
                    <a href="{{ route('studentregister.show', $student->id) }}" target="_blank" class="btn btn-sm btn-info"><span class="fa fa-eye"></span></a>
                    <a href="{{ route('slider-edit', ['slider'=>$student->id]) }}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span></a>
                    <a href="{{ route('slider-delete', ['slider'=>$student->id]) }}" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script>
    //Data Table Start
    $(document).ready(function() {
        $('#class_wise_student_lists').DataTable({
            fixedHeader:true
        });
    } );
    //Data Table End
</script>
