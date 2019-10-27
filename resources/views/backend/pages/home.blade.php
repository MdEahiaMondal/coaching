@extends('backend.master.master')

@section('mainContent')
    <!--Slider Start-->
    <section class="container-fluid">

        @include('backend.parcials.message')

        <div class="row">
            <div class="col-12 pl-0 pr-0">
                <div class="owl-carousel">
                    @foreach($sliders as $slider)
                        <div class="item">
                            <img src="{{ asset('backend/slider-images/'.$slider->image) }}" alt="">
                            <div class="slide-caption">
                                <h2>{{ $slider->title }}</h2>
                                <p>{{ $slider->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--Slider End-->
    @endsection
