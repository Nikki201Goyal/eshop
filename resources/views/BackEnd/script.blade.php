<script src="{{asset('BackEnd/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('BackEnd/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('BackEnd/js/adminlte.min.js')}}"></script>
<script src="{{asset('BackEnd/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('BackEnd/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('BackEnd/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('BackEnd/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- sweet alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
  text: "Once deleted, you will not be able to recover this category!",
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
