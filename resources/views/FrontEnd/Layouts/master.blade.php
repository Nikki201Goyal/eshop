<!DOCTYPE html>

<html lang="eng">

<head>
    @include('FrontEnd.Layouts.Partial.head')
</head>

<body>
    <div>
        @include('FrontEnd.Layouts.Partial.colorPicker')
        @include('FrontEnd.Layouts.Partial.header')

    <div>
        @yield('content')

    </div>
    @include('FrontEnd.Layouts.Partial.footer')

    </div>

    <div class="modal fade" id="quickview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Quick view</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="page-content">
                    <div class="container">
                        <div class="product-details-top">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="product-gallery product-gallery-vertical">
                                        <div class="row">
                                            <figure class="product-main-image">
                                                <img id="product-zoom" class="product-image" src=""  alt="product image">

                                                <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                    <i class="icon-arrows"></i>
                                                </a>
                                            </figure><!-- End .product-main-image -->

                                        </div><!-- End .row -->
                                    </div><!-- End .product-gallery -->
                                </div><!-- End .col-md-6 -->

                                <div class="col-md-4">
                                    <div class="product-details">
                                        <h1 class="product-title">nikki</h1><!-- End .product-title -->

                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: "></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <a class="ratings-text" href="#product-accordion" id="review-link">( 2 Reviews )</a>
                                        </div><!-- End .rating-container -->

                                        <div class="product-price">
                                            <h5 class="product-money">Rs. 40</h5><!-- End .product-money -->

                                        </div><!-- End .product-price -->
                                    </div>

                                    <div class="product-details-action">
                                        <a href="#" class="btn-product btn-cart" ><span color="white">add to cart</span></a>
                                    </div><!-- End .product-details-action -->
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
      </div>
    </div>
    

    @include('FrontEnd.Layouts.Partial.script')
    @yield('page-scripts')
    <script>
        $('#quickview').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var name = button.data('name') // Extract info from data-* attributes
      var image = button.data('image') // Extract info from data-* attributes
      var price = button.data('price') // Extract info from data-* attributes
      var id = button.data('id') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.product-image').attr('src', image)
      modal.find('.product-title').html(name)
      modal.find('.product-money').html(price)
    //   modal.find('#contact_edit').val(contact)
    //   modal.find('#postcode_edit').val(postcode)
    //   modal.find('#id_edit').val(id)
    //   modal.find('.modal-body input').val(recipient)
    })
    </script>
</body>

</html>
