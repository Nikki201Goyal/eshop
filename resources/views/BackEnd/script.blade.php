<script src="{{asset('Backend/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('Backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
{{--<script src="{{ asset('Backend/js/demo.js')}}"></script>--}}

{{-- <script src="{{asset('BackeBackEnd/plugins/jquery/jquery.min.js')}}"></script> --}}
<!-- Bootstrap 4 -->
<script src="{{asset('Backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('Backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('Backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('Backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

{{-- <script src="{{asset('Backend/plugins/chart.js/Chart.css')}}"></script>--}}
{{-- <script src="{{asset('Backend/plugins/chart.js/Chart.js')}}"></script>--}}
{{-- <script src="{{asset('Backend/plugins/chart.js/Chart.min.css')}}"></script>--}}
{{--<script src="{{asset('Backend/plugins/chart.js/Chart.min.js')}}"></script>--}}
{{-- <script src="{{asset('Backend/plugins/chart.js/Chart.bundle.js')}}"></script> --}}
{{-- <script src="{{asset('Backend/plugins/chart.js/Chart.bundle.min.js')}}"></script> --}}
<script src="{{asset('Backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('Backend/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
<!-- sweet alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset('Backend/js/adminlte.min.js')}}"></script>
<script src="{{ asset('Backend/js/pages/dashboard.js')}}"></script>

<script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);

    $(".datatable").DataTable({ //table search ko
      "responsive": true,
       "autoWidth": false,
    });

    $('.sa-delete').on('click',function(){ //delete
        let form_id =$(this).data('form-id');
        swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    $('#'+form_id).submit();
  }
});
    })
</script>

<script>

  $(function() {

    $('.toggle-class').change(function() {

        var status = $(this).prop('checked') == true ? 1 : 0;

        var user_id = $(this).data('id');



        $.ajax({

            type: "GET",

            dataType: "json",

            url: '/changeStatus',

            data: {'status': status, 'user_id': user_id},

            success: function(data){

              console.log(data.success)

            }

        });

    })

  })
</script>



@stack('scripts')
@yield('admin-scripts')
