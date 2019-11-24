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



        <div class="modal fade" id="StudentTypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
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
                                            <option  value="{{ $class->id }}">{{ $class->name }}</option>
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

    </script>


@endpush
