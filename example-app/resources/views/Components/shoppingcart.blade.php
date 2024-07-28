<!DOCTYPE html>
<html lang="en">

<x-header/>
<meta name="csrf-token" content="{{ csrf_token() }}">

<body>

<x-topbar/>

<x-navbar/>


<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <span class="breadcrumb-item active">Shopping Cart</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Remove</th>
                    </tr>
                </thead>



                <tbody class="align-middle">
                    @foreach(session('cart', []) as $id => $details)
                        <tr>
                            <td class="align-middle"><img src="{{ $details['image'] }}" alt="" style="width: 50px;"> {{ $details['name'] }}</td>
                            <td class="align-middle">${{ $details['price'] }}</td>
                            <td class="align-middle"> <button class="btn btn-sm btn-danger remove-item" data-id="{{ $id }}"><i class="fa fa-times"></i></button></td>
                        </tr>
                    @endforeach
                </tbody>
                




            </table>
        </div>
        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="pt-2">
                                @php
                                $total = 0;
                                foreach(session('cart', []) as $id => $details) {
                                $total += $details['price'];
                                }
                                @endphp

                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5 id="cart-total">${{ number_format($total, 2) }}</h5>

                    </div>

                    
                    <div class="checkout-container">
                        @auth
                            <a href="{{ route('checkout') }}" class="btn btn-primary">Proceed to Checkout</a>
                        @endauth
                    
                        @guest
                            <p>You must be logged in to proceed to checkout.</p>
                            <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                        @endguest
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->


<!-- Footer Start -->
<x-footer/>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

<x-scripts/>
<script>
    $(document).ready(function() {
        $('.remove-item').click(function() {
    const productId = $(this).data('id');

    $.ajax({
        url: '/cart/remove/' + productId,
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function(result) {
            // Assume result contains the updated total, which should be returned from the server
            if(result.newTotal !== undefined) {
                $('#cart-total').text('$' + result.newTotal.toFixed(2));
            }
            location.reload(); // Optional: Consider removing this to not refresh the page
        },
        error: function(xhr, status, error) {
            alert('Error removing product from cart.');
        }
    });
});

    });
    </script>
    
</body>

</html>