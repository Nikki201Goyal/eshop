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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css"></script>

<script>
    $(document).ready(function() {
    $('#datatable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            'print'
        ]
    } );
} );
</script>
@stack('scripts')
@yield('admin-scripts')
