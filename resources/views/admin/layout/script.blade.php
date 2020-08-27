<!-- Jquery Core Js -->
<script src="{{ URL::asset('admin-assets/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{ URL::asset('admin-assets/plugins/bootstrap/js/bootstrap.js')}}"></script>


<!-- Select Plugin Js -->
<script src="{{ URL::asset('admin-assets/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

<!-- Select Plugin Js -->
<script src="{{ URL::asset('admin-assets/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{ URL::asset('admin-assets/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
<script src="{{ URL::asset('admin-assets/plugins/jquery-validation/jquery.validate.js')}}"></script>


<!-- Bootstrap Notify Plugin Js -->
<script src="{{ URL::asset('admin-assets/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>


<!-- Waves Effect Plugin Js -->
<script src="{{ URL::asset('admin-assets/plugins/node-waves/waves.js')}}"></script>
<script src="{{ URL::asset('admin-assets/plugins/jquery-countto/jquery.countTo.js')}}"></script>
<!-- Jquery DataTable Plugin Js -->
<script src="{{ URL::asset('admin-assets/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{ URL::asset('admin-assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>

<!-- Moment Plugin Js -->
<script src="{{ URL::asset('admin-assets/plugins/momentjs/moment.js')}}"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="{{ URL::asset('admin-assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
<!-- Custom Js -->

<script src="{{ URL::asset('admin-assets/js/admin.js')}}"></script>

{{--color-picker--}}
@stack('colour-picker')
<!-- Demo Js -->
<script src="{{ URL::asset('admin-assets/js/demo.js')}}"></script>
<script src="{{ URL::asset('admin-assets/js/sweetalert.min.js')}}"></script>
<script src="{{ URL::asset('admin-assets/js/script.js')}}"></script>

 <!-- Ckeditor -->
    <script src="{{URL::asset('admin-assets/plugins/ckeditor/ckeditor.js')}}"></script>
 @stack('scripts')
@stack('datatable-script')