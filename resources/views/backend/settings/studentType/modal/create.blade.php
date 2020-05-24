<div class="modal fade" id="StudentTypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Student type list</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('student_types.store') }}" method="post" id="StudentTypeform">
                    @csrf
                    <div class="form-group">
                        <label for="className" class="col-form-label text-right">Class Name</label>
                        <select name="class_id" class="form-control @error('class_id') is-invalid @enderror" id="className" required autofocus>
                            <option value="">---Select Class---</option>
                            @foreach($classes as $class)
                                <option  value="{{ $class->id }}">{{ $class->class_name }}</option>
                            @endforeach
                        </select>
                        @error('class_id')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="student_type" class="col-form-label">Student Type</label>
                        <input type="text" id="student_type"  value="{{ old('student_type') }}" class="form-control" name="student_type">
                    </div>

                    <div class="form-group float-right">
                        <button type="reset" id="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
