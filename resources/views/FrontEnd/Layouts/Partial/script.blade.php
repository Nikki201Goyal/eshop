<script src="{{asset('FrontEnd/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('FrontEnd/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('FrontEnd/assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('FrontEnd/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('FrontEnd/assets/js/main.js')}}"></script>
    <script src="{{asset('FrontEnd/assets/js/Js.js')}}"></script>
    <script src="{{asset('FrontEnd/assets/js/styleswitcher.js')}}"></script>
    <script src="{{asset('FrontEnd/assets/js/jquery.sticky-kit.min.js')}}"></script>
    <script src="{{asset('FrontEnd/assets/js/nouisliderjs')}}"></script>

    <script>
        $('.btn-wishlist').click(function(e){
        e.preventDefault();
        $user = $(this).attr('user');
        $product = $(this).attr('product');

        $.post("{{ route('wishlists') }}", {_token:"{{ csrf_token() }}",user_id: $user, product_id: $product}, function(data){
            console.log(data);
            if(data.message == "login"){
                $('#signin-modal').modal('show');
            }
            else if(data.message == "exists"){
                alert('Product already on wishlist.');
            }
            else if(data.message == "success"){
                alert('Product added to wishlist');
            }
            else{
                console.log('oops');
            }
        });


    });

    </script>

     <script>
        $('.btn-cart').click(function(e){
        e.preventDefault();
        $user = $(this).attr('user');
        $product = $(this).attr('product');

        $.post("{{ route('carts') }}", {_token:"{{ csrf_token() }}",user_id: $user, product_id: $product}, function(info){
            console.log(info);
            if(info.message == "login"){
                $('#signin-modal').modal('show');
            }
            else if(info.message == "exists"){
                alert('Product already on cart.');
            }
            else if(info.message == "success"){
                alert('Product added to cart');
            }
            else{
                console.log('oops');
            }
        });


    });

    </script>
