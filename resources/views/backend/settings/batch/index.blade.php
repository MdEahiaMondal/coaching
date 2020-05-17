@extends('backend.master.master')

@section('title', '')

@push('css')


@endpush


@section('mainContent')

    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
            <div class="col-md-8 offset-md-2 pl-0 pr-0">
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Class wise  Batch </h4>
                    </div>
                </div>

                @include('backend.parcials.message')



                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row mb-0">
                            <label for="className" class="col-form-label col-sm-3 text-right">Class Name</label>
                            <div class="col-sm-9">
                                <select name="class_id" class="form-control" id="className" required autofocus>
                                    <option value="">---Select Class---</option>
                                    @foreach($classes as $class)
                                        <option  value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row mb-0">
                            <label for="studentType" class="col-form-label col-sm-3 text-right">Student Type </label>
                            <div class="col-sm-9">
                                <select name="student_type_id" class="form-control @error('student_type_id') is-invalid @enderror" id="studentType" required autofocus>
                                    <option value="">---Select Type---</option>
                                </select>
                                @error('student_type_id')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>




                    <div class="table-responsive p-1 mt-5">
                        <table id="batchList" class="table table-bordered dt-responsive nowrap text-center"  style="width: 100%;">

                        </table>
                    </div>

            </div>
        </div>
    </section>
    <!--Content End-->

@endsection

<style>
    #overlay .loader{
        display: none;
    }
</style>
@include('backend.parcials.loader')


@push('script')
    <script>
       $("#className").change(function () {
           var class_id = $(this).val();
           if (class_id)
           {
               $("#overlay .loader").show();
               $.post('{{ route('class.wise.student-type') }}', {class_id: class_id}, function(res) {
                   $("#studentType").html(res);
                   $("#overlay .loader").hide();
               })
           }else{
               $("#batchList").html('')
               $("#studentType").html('<option value="">---Select Type---</option>');
           }
       })

       $("#studentType").change(function () {
           var student_type_id = $(this).val();
           var class_id = $("#className").val();
           if(class_id && student_type_id){
               $.get("{{ route('get.batch.data') }}", {class_id:class_id, student_type_id: student_type_id}, function (feedBackResult) {
                   $("#batchList").html(feedBackResult)
               })
           }

       })

    </script>
@endpush
