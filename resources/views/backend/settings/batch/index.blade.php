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



                <div class="form-group row mb-0">
                    <label for="className" class="col-form-label col-sm-3 text-right">Choose Name</label>
                    <div class="col-sm-9">
                        <select name="class_id" class="form-control" id="className" required autofocus>
                            <option value="">---Select Class---</option>
                            @foreach($classes as $class)
                                <option  value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
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



@push('script')
    <script>
        $("#className").change(function () {
            var id = $(this).val();
            if(id){
                $.get("{{ route('get.batch.data') }}", {id:id}, function (feedBackResult) {
                    $("#batchList").html(feedBackResult)
                })
            }

        })

    </script>
@endpush
