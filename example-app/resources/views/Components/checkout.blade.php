<x-header/>
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
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Form wrapping the Billing Address and other inputs -->
            <div class="col-lg-8">
                <form action="{{ route('submit-order') }}" method="post">
                    @csrf
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="first_name">First Name</label>
                                <input class="form-control" type="text" placeholder="John" name="first_name" id="first_name" required pattern="[A-Za-z\s]+" title="First name should only contain letters.">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="last_name">Last Name</label>
                                <input class="form-control" type="text" placeholder="Doe" name="last_name" id="last_name" required pattern="[A-Za-z\s]+" title="Last name should only contain letters.">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="email">E-mail</label>
                                <input class="form-control" type="email" placeholder="example@email.com" name="email" id="email" required value="{{ auth()->user()->email }}" readonly>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="mobile">Phone Number</label>
                                <input class="form-control" type="tel" placeholder="+123 456 789" name="mobile" id="mobile" required pattern="\+[0-9\s]{3,20}" title="Phone number must start with a + and include 3 to 20 numeric digits.">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="address1">Address Line 1</label>
                                <input class="form-control" type="text" placeholder="123 Street" name="address1" id="address1" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="address2">Address Line 2</label>
                                <input class="form-control" type="text" placeholder="(optional)" name="address2" id="address2">
                            </div>
                            <div class="col-md-6 form-group">   
                                <label for="city">City</label>
                                <input class="form-control" type="text"  placeholder="Casablanca" name="city" id="city" pattern="[A-Za-z\s]+" title="City should only contain letters." required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="zip">ZIP Code</label>
                                <input class="form-control" type="text" placeholder="123" name="zip" id="zip" pattern="[0-9]{3,10}" title="ZIP code should be between 3 to 10 numbers." required>
                            </div>
                            <div class="col-12">
                                <div class="row justify-content-center">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Separate column for Order Total -->
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Products</h6>
                        @php $total = 0; @endphp
                        @foreach(session('cart', []) as $id => $details)
                            <div class="d-flex justify-content-between">
                                <p>{{ $details['name'] }}</p>
                                <p>${{ number_format($details['price'], 2) }}</p>
                            </div>
                            @php $total += $details['price'] * $details['quantity']; @endphp
                        @endforeach
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>${{ number_format($total, 2) }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->

    <x-footer/>

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <x-scripts/>
    <script>
        @if(session()->has('cart') && count(session('cart')) > 0)
            {{-- Display Cart Contents --}}
        @else
            <p>Your cart is empty.</p>
            <a href="{{ route('shop') }}" class="btn btn-primary">Return to Shop</a>
        @endif
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        // Check if the order has been successfully processed (you can adjust this condition based on your backend logic)
        @if(session()->has('order_success'))
            // Display a SweetAlert success message
            Swal.fire({
                icon: 'success',
                title: 'Order Placed Successfully!',
                text: 'Thank you for your purchase!',
                showConfirmButton: false,
                timer: 3000 // Automatically close after 3 seconds
            });
        @endif
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const products = document.querySelectorAll('.d-flex.justify-content-between p');
            const placeOrderButton = document.querySelector('button[type="submit"]');

            // Check if there are any products listed
            if (products.length === 0) {
                // If no products are listed, disable the Place Order button
                placeOrderButton.disabled = true;
            }
        });
    </script>
</body>
