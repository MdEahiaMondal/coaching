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
                        <tbody>
                        @if($studentTypes->count() > 0)

                            @php($i = 1)
                            @foreach($studentTypes as $studentType)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $studentType->name }}</td>
                                    <td>{{ $studentType->student_type }}</td>
                                    <td class="{{ $studentType->status == 1 ? 'text-success' : 'text-warning' }}">{{ $studentType->status == 1 ? 'publish' : 'Unpublish' }}</td>
                                    <td>
                                        @if($studentType->status == 1)
                                            <a href="{{ route('class-unpublish',['class'=>$studentType->id]) }}" title="press to unpublish" class="btn btn-sm btn-success"><span class="fa fa-arrow-alt-circle-down"></span></a>
                                        @else
                                            <a href="{{ route('class-publish',['class'=>$studentType->id]) }}" class="btn btn-sm btn-warning"><span title="press to publish" class="fa fa-arrow-alt-circle-up"></span></a>
                                        @endif

                                        <a href="{{ route('class-edit', ['class'=>$studentType->id]) }}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span></a>
                                        <a href="{{ route('class-delete', ['class'=>$studentType->id]) }}" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                                @else
                            <tr class="text-danger">
                                <td colspan="5">Student Type Not Found !!</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--Content End-->


@endsection



@push('script')

@endpush
