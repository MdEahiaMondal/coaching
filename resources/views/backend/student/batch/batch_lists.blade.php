@if($batches->count() > 0)
    <option value="">---Select Batch---</option>
    @foreach($batches as $batch)
        <option value="{{ $batch->id }}">{{ $batch->batch_name }}</option>
    @endforeach
@else
    <option value="">---Select Batch---</option>
@endif
