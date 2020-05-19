
<div class="form-group col-md-6 mb-3">
    <label for="className" class="col-sm-4 col-form-label text-right">Class Name</label>
    <select name="class_id" class="form-control col-sm-8" id="className" required>
        <option value="">Select Class</option>
        @foreach($calsses as $class)
            <option {{ $class_id == $class->id ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
        @endforeach
    </select>
    <span class="text-danger"></span>
</div>

<div class="form-group col-md-6 mb-3">
    <label class="col-sm-4 col-form-label text-right">Student Type</label>
    <div class="col-sm-8" id="studentType">
        @if($student_types->count() > 0)
            @foreach($student_types as $type)
                <input type="checkbox" onclick="BatchRoleFrom('{{ $type->id }}', this)" name="student_type_id['{{ $type->id }}']" value="{{ $type->id }}" class="mr-2"/> {{ $type->student_type }}
            @endforeach
        @else
            <span class="text-danger">first create student type</span>
        @endif
    </div>
</div>


@foreach($student_types as $type)
<div class="col-12">
    <div class="row" id="BatchRollForm-{{$type->id}}">

    </div>
</div>
@endforeach


<script>
    function BatchRoleFrom(st_id, element) {
        var class_id =$("#className").val();

        if ($(element).prop('checked'))
        {
            if(st_id && class_id)
            {
                $.post('{{ route('student.registration.class-and-student-type-wise-batch') }}', {student_type_id: st_id, class_id: class_id}, function (res) {
                    $("#BatchRollForm-"+st_id).html(res)
                })
            }
        }else{
            $("#BatchRollForm-"+st_id).html('')
        }
    }

    $("#className").change(function () {
        var class_id = $(this).val();
        if (class_id)
        {
            $("#overlay .loader").show();
            $.post('{{ route('student.registration.class.wise.student-type') }}', {class_id: class_id}, function(res) {
                console.log(res)
                $("#batchRoleFormInfo").html(res);
                $("#overlay .loader").hide();
            })
        }else{
            $("#batchList").html('')
            $("#studentType").html('<span class="text-info">first select class name</span>');
        }
    })

</script>
