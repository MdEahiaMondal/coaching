<div class="form-group col-md-6 mb-3">
    <label for="className" class="col-sm-4 col-form-label text-right"> Batch Name [{{ $student_type->student_type }}]</label>
    <select name="batch_id['{{ $student_type->id }}']" class="form-control col-sm-8" id="BatchName" required>
        <option value="">Select Batch</option>
        @foreach($batches as $batch)
            <option value="{{ $batch->id }}">{{ $batch->name }}</option>
        @endforeach
    </select>
    <span class="text-danger"></span>
</div>

<div class="form-group col-md-6 mb-3">
    <label for="studentRoll" class="col-sm-4 col-form-label text-right">Roll Number</label>
    <input type="text" name="student_roll['{{ $student_type->id }}']" class="form-control col-sm-8" id="studentRoll" placeholder="Roll Number" value="" required/>
    <span class="text-danger"></span>
</div>



