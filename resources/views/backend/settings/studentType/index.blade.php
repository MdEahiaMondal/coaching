@extends('backend.master.master')

@section('title', '')

@push('css')


@endpush


@section('mainContent')

    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
            <div class="col-12 pl-0 pr-0">
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Student Type List</h4>
                        <span data-toggle="modal" data-target="#StudentTypeModal" data-whatever="@mdo" class="btn btn-success" >Add new</span>
                    </div>
                </div>

                @include('backend.parcials.message')

                <div class="table-responsive p-1">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                        <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Class Name</th>
                            <th>Student type</th>
                            <th>Status</th>
                            <th style="width: 100px;">Action</th>
                        </tr>
                        </thead>
                        <tbody id="studentTypeList">
                            @include('backend.settings.studentType.studentTypeList')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @include('backend.settings.studentType.modal.create')
        @include('backend.settings.studentType.modal.edit')

    </section>
    <!--Content End-->


@endsection



@push('script')


    <script>
        $("#StudentTypeform").submit(function (e) {
            e.preventDefault();

            var url = $(this).attr('action');
            var method = $(this).attr('method');
            var data = $(this).serialize();
             $("#StudentTypeModal #reset").click();
             $("#StudentTypeModal").modal('hide');
            $.ajax({
               url:url,
               type:method,
                data:data,

                success:function (feedBackResult) {
                    $.get("{{ route('student.type.list') }}", function (data) {
                        $("#studentTypeList").empty().html(data);
                        toastr.success('Data Insert successfully Done');
                    })
                }
            });
        })

        // studen type status publish unpublish
        function studentTypePublishUnPublish(studentTypeId, status) {
            $.post('{{ route('student.type.status-publish-un-publish') }}', {studentTypeId :studentTypeId, status: status}, function (res) {
                $("#studentTypeList").empty().html(res);
            })
        }
      // studen type status publish unpublish
        function studentTypeEdit(studentTypeId, student_type) {
            $("#StudentTypeEditModal").modal('show')
            $("#StudentTypeEditform").find('#student_type').val(student_type)
            $("#StudentTypeEditform").find('#student_type_id').val(studentTypeId)
        }

        $("#StudentTypeEditform").submit(function (e) {
            e.preventDefault();
            var studentTypeId =  $("#StudentTypeEditform").find('#student_type_id').val()
            var student_type =  $("#StudentTypeEditform").find('#student_type').val()
            var url = '{{ route("student_types.update", ":id") }}';
            url = url.replace(':id', studentTypeId);
            var _method = 'put';
            $.post(url, {student_type: student_type, _method:_method}, function (res) {
                $("#studentTypeList").empty().html(res);
                $("#StudentTypeEditModal #reset").click();
                $("#StudentTypeEditModal").modal('hide');
            })
        })

        function deletedstudentTye(id) {
            var url = '{{ route("student_types.destroy", ":id") }}';
            url = url.replace(':id', id);
            var _method = 'delete';
            $.post(url, {_method:_method}, function (res) {
                $("#studentTypeList").empty().html(res);
            })
        }


    </script>


@endpush
