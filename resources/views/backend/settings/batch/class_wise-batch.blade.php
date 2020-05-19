<thead>
    <tr>
        <th>SI</th>
        <th>Batch Name</th>
        <th>Student Capacity</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
</thead>

<tbody>

@if(count($batchs) > 0)
    @foreach($batchs as $key => $batch)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $batch->batch_name }}</td>
            <td>{{ $batch->student_capacity }}</td>
            <td>{{ $batch->status == 1 ? 'publish' : 'Unpublish' }}</td>
            <td>
                @if($batch->status == 1)
                    <a href="#0" onclick="unpublish('{{$batch->id}}', '{{ $batch->class_id }}', '{{ $batch->student_type_id }}')" title="press to unpublish" class="btn btn-sm btn-success"><span class="fa fa-arrow-alt-circle-down"></span></a>
                @else
                    <a href="#0"  onclick="published('{{ $batch->id}}' , '{{  $batch->class_id }}', '{{ $batch->student_type_id }}')" class="btn btn-sm btn-warning"><span title="press to publish" class="fa fa-arrow-alt-circle-up"></span></a>
                @endif
                <a href="{{ route('batch.edit', ['batch'=>$batch->id]) }}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span></a>
                <a href="#0" onclick="BatchDelete('{{ $batch->id }}', '{{ $batch->class_id }}')" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
            </td>
        </tr>
    @endforeach


@else
    <tr>
        <td colspan="4">
            <p>There is a no Batch</p>
        </td>
    </tr>

@endif


</tbody>


<script>


    $.ajaxSetup({
        headers: {'X-CSRF-Token': '{{ csrf_token() }}'}
    });

    // unpublish status
    function unpublish(batch_id, class_id, student_type_id) {
       var check =  confirm("Are you sure to unpublish it ? Press Ok");

      if(check){
          $.get("{{ route('batch.unpublished') }}", {batch_id: batch_id, class_id: class_id, student_type_id: student_type_id } , function (feedBackResult) {
              toastr.success('Publication status Change Successfully');
              $("#batchList").html(feedBackResult)
          })
      }

    }

    // publish status
    function published(batch_id, class_id, student_type_id) {
        var check =  confirm("Are you sure to publish it ? Press Ok");
        if(check){
            $.get("{{ route('batch.published') }}", {batch_id: batch_id, class_id: class_id,student_type_id:student_type_id } , function (feedBackResult) {
                toastr.success('Publication status Change Successfully');
                $("#batchList").html(feedBackResult);
            })
        }
    }


    // delete batch
    function BatchDelete(batch_id, class_id) {
        var check =  confirm("Are you sure want to delete it ? Press Ok");
        if(check){
            $.ajax({
                url: "{{ route('batch.destroy', '') }}/"+batch_id,
                method: "DELETE",
                data: {
                    batch_id: batch_id,
                    class_id: class_id,
                },
                success:function (feedBackResult) {
                    toastr.success('Batch Deleted Successfull');
                    $("#batchList").html(feedBackResult);
                }

            });
        }
    }

</script>
