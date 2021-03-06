
<!--Footer Start-->
<footer class="container-fluid">
    <div class="row footer">
        <div class="col-12">
            <p class="pt-2 mb-2 text-center">Copyright &copy; <a class="footer-link" href="">  @if(isset($footer)) {{ $footer->copyRight }} @else Owner  @endif </a> || Developed  by:
                <a class="footer-link" href="http://www.fzitsolution.net">FZIT Solution</a></p>
        </div>
    </div>
</footer>
<!--Footer End-->

<!--    jQuery-->

<script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>

{{--
<script src="{{ asset('backend/js/jquery-3.3.1.slim.min.js') }}"></script>
--}}
<!--    magnific popup-->
<script src="{{ asset('backend/plugins/magnific-popup/js/jquery.magnific-popup.min.js') }}"></script>
<!--    Carousel-->
<script src="{{ asset('backend/plugins/owl-carosel/js/owl.carousel.min.js') }}"></script>
<!--    Bootstrap-4.3-->
<script src="{{ asset('backend/js/popper.min.js') }}"></script>
<script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/js/sub-dropdown.js') }}"></script>
<!--Data table-->
<script src="{{ asset('backend/plugins/data-table/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/plugins/data-table/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/plugins/data-table/js/dataTables.fixedHeader.min.js') }}"></script>
<!--    Theme Script-->
<script src="{{ asset('backend/js/live-image-show.js') }}"></script> {{--live image show--}}
<script src="{{ asset('backend/js/script.js') }}"></script>


{{--// for toaster message--}}
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

</body>
</html>
