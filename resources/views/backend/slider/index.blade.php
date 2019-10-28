@extends('backend.master.master')

@section('mainContent')

    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
            <div class="col-12 pl-0 pr-0">
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Slider List</h4>
                    </div>
                </div>

                @include('backend.parcials.message')

                <div class="table-responsive p-1">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Sl.</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th style="width: 100px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach($sliders as $slider)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td><img width="100" src="{{ asset('backend/slider-images/'.$slider->image) }}" alt=""></td>
                                    <td>{{ $slider->description }}</td>
                                    <td>{{ $slider->status == 1 ? 'publish' : 'Unpublish' }}</td>
                                    <td>
                                        @if($slider->status == 1)
                                            <a href="{{ route('slider-unpublish',['slider'=>$slider->id]) }}" title="press to unpublish" class="btn btn-sm btn-success"><span class="fa fa-arrow-alt-circle-down"></span></a>
                                        @else
                                            <a href="{{ route('slider-publish',['slider'=>$slider->id]) }}" class="btn btn-sm btn-warning"><span title="press to publish" class="fa fa-arrow-alt-circle-up"></span></a>
                                        @endif

                                        <a href="{{ route('slider-edit', ['slider'=>$slider->id]) }}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span></a>
                                        <a href="{{ route('slider-delete', ['slider'=>$slider->id]) }}" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--Content End-->

@endsection
