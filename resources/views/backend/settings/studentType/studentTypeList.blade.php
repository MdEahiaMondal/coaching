@if($studentTypes->count() > 0)

    @php($i = 1)
    @foreach($studentTypes as $studentType)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $studentType->name }}</td>
            <td>{{ $studentType->student_type }}</td>
            <td class="{{ $studentType->status == 1 ? 'text-success' : 'text-warning' }}">{{ $studentType->status == 1 ? 'publish' : 'Unpublish' }}</td>
            <td>
                <button onclick="studentTypePublishUnPublish('{{ $studentType->id }}', '{{ $studentType->status == 1 ? 0 : 1 }}' )" title="press to unpublish" class="{{ $studentType->status == 1? 'btn btn-sm  btn-success' : 'btn btn-sm  btn-warning' }}"><span class="{{ $studentType->status == 1? 'fa fa-arrow-alt-circle-down' : 'fa fa-arrow-alt-circle-up' }}"></span></button>
                <button onclick="studentTypeEdit('{{ $studentType->id }}', '{{ $studentType->student_type }}')"  class="btn btn-sm btn-info"><span class="fa fa-edit"></span></button>
                <button onclick="deletedstudentTye('{{ $studentType->id }}')" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></button>
            </td>
        </tr>
    @endforeach
@else
    <tr class="text-danger">
        <td colspan="5">Student Type Not Found !!</td>
    </tr>
@endif

