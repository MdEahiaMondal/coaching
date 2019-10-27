@extends('backend.master.master')

@section('mainContent')
    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
            <div class="col-10 offset-md-1 pl-0 pr-0">
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Header Footer Edit Form</h4>
                    </div>
                </div>
                <form method="POST" action="{{ route('header-footer-update', ['id'=>$headerFooter->id]) }}"  autocomplete="off" class="form-inline">
                    @csrf

                    <input type="hidden" name="status" value="1">
                    <div class="form-group col-12 mb-3">
                        <label for="name" class="col-sm-3 col-form-label text-right">Coaching Name</label>
                        <input id="name" type="text" class="col-sm-9 form-control @error('name') is-invalid @enderror" name="name" value="{{ $headerFooter->name }}" placeholder="Coaching Name" required autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group col-12 mb-3">
                        <label for="subTitle" class="col-sm-3 col-form-label text-right">Coaching Sub Title</label>
                        <input id="subTitle" type="text" class="col-sm-9 form-control @error('subTitle') is-invalid @enderror" name="subTitle" value="{{ $headerFooter->subTitle }}" placeholder="Sub Title" required autofocus>
                        @error('subTitle')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group col-12 mb-3">
                        <label for="address" class="col-sm-3 col-form-label text-right">Address</label>
                        <input id="address" type="text" class="col-sm-9 form-control @error('address') is-invalid @enderror" name="address" value="{{ $headerFooter->address }}" placeholder="Address" required autofocus>
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group col-12 mb-3">
                        <label for="mobile" class="col-sm-3 col-form-label text-right">Mobile</label>
                        <input id="mobile" type="text" class="col-sm-9 form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ $headerFooter->mobile }}" placeholder="8801yyyyyy" required autofocus>
                        @error('mobile')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-12 mb-3">
                        <label for="copyRight" class="col-sm-3 col-form-label text-right">Copy Right</label>
                        <input id="copyRight" type="text" class="col-sm-9 form-control @error('copyRight') is-invalid @enderror" name="copyRight" value="{{ $headerFooter->copyRight }}" placeholder="Copy Right" required autofocus>
                        @error('copyRight')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-12 mb-3">
                        <label class="col-sm-3"></label>
                        <button type="submit" class="col-sm-9 btn btn-block my-btn-submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--Content End-->
@endsection
