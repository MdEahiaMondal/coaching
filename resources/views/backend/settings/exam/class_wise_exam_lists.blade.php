<div class="table-responsive p-1">
    <table id="class_wise_student_lists" class="table table-striped table-bordered dt-responsive  text-center" style="width: 100%;">
        <thead>
    <tr>
        <th>SI</th>
        <th>Exam Name</th>
        <th>Exam Type</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>

    <tbody>

    @if(count($exams) > 0)
        @foreach($exams as $key => $exam)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $exam->exam_name }}</td>
                <td>{{ $exam->exam_type }}</td>
                <td>{{ $exam->exam_status == 1 ? 'publish' : 'Unpublish' }}</td>
                <td>
                    <button onclick="publishedUnpublished('{{ $exam->id }}', '{{ $exam->exam_status == 1 ? 0 : 1 }}')" class="btn btn-sm {{ $exam->exam_status == 1 ? 'btn-success' : 'btn-warning'}} "><span title="press to {{ $exam->exam_status == 1 ? 'Deactivate' : 'Active'}}" class="fa {{ $exam->exam_status == 1 ? 'fa-arrow-alt-circle-down' : 'fa-arrow-alt-circle-up'}}"></span></button>
                    <a href="{{ route('exam.edit', $exam->id) }}" target="_blank" class="btn btn-sm btn-info"><span class="fa fa-edit"></span></a>
                    <a href="#0" onclick="examDelete('{{ $exam->id }}')" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="5">
                <p class="text-center alert alert-danger">There is a no Exam</p>
            </td>
        </tr>
    @endif


    </tbody>

</table>
</div>
