<thead>
    <tr>
        <th>SI</th>
        <th>Batch Name</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
</thead>

<tbody>

@if(count($batchs) > 0)
    @foreach($batchs as $key => $batch)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $batch->name }}</td>
            <td>{{ $batch->status == 1 ? 'publish' : 'Unpublish' }}</td>
            <td>
                @if($batch->status == 1)
                    <a href="{{ route('slider-unpublish',['slider'=>$batch->id]) }}" title="press to unpublish" class="btn btn-sm btn-success"><span class="fa fa-arrow-alt-circle-down"></span></a>
                @else
                    <a href="{{ route('slider-publish',['slider'=>$batch->id]) }}" class="btn btn-sm btn-warning"><span title="press to publish" class="fa fa-arrow-alt-circle-up"></span></a>
                @endif
                <a href="{{ route('batch.edit', ['batch'=>$batch->id]) }}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span></a>
                <a href="{{ route('batch.destroy', ['batch'=>$batch->id]) }}" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
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
