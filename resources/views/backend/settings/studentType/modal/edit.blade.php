<div class="modal fade" id="StudentTypeEditModal" tabindex="-1" role="dialog" aria-labelledby="StudentTypeEditModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="StudentTypeEditModal">Edit  Student type list</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="StudentTypeEditform">
                    @csrf
                    <div class="form-group">
                        <label for="student_type" class="col-form-label">Student Type</label>
                        <input type="text" id="student_type"  class="form-control" name="student_type">
                        <input type="hidden" id="student_type_id">
                    </div>
                    <div class="form-group float-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
