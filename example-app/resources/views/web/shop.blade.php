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
        <span class="breadcrumb-item active">Shop List</span>
    </nav>
</div>
</div>
</div>  
<!-- Breadcrumb End -->


<!-- Shop Start -->
<div class="container-fluid">
<div class="row px-xl-5">
<!-- Shop Sidebar Start -->
<div class="col-lg-3 col-md-4">
    <!-- Price Start -->
    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by price</span></h5>
    <div class="bg-light p-4 mb-30">
        <form>
            <!-- All Prices Checkbox -->
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="price-all" value="all">
                <label class="custom-control-label" for="price-all">All Prices</label>
                <span class="badge border font-weight-normal">1000</span>
            </div>
            
            <!-- Price Range $0 - $100 -->
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input price-checkbox" id="price-1" value="0-100">
                <label class="custom-control-label" for="price-1">$0 - $100</label>
                <span class="badge border font-weight-normal">150</span>
            </div>
            
            <!-- Price Range $100 - $200 -->
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input price-checkbox" id="price-2" value="100-200">
                <label class="custom-control-label" for="price-2">$100 - $200</label>
                <span class="badge border font-weight-normal">295</span>
            </div>
            
            <!-- Price Range $200 - $300 -->
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input price-checkbox" id="price-3" value="200-300">
                <label class="custom-control-label" for="price-3">$200 - $300</label>
                <span class="badge border font-weight-normal">246</span>
            </div>
            
            <!-- Price Range $300 - $400 -->
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input price-checkbox" id="price-4" value="300-400">
                <label class="custom-control-label" for="price-4">$300 - $400</label>
                <span class="badge border font-weight-normal">145</span>
            </div>
            
            <!-- Price Range $400 - $500 -->
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                <input type="checkbox" class="custom-control-input price-checkbox" id="price-5" value="400-500">
                <label class="custom-control-label" for="price-5">$400 - $500</label>
                <span class="badge border font-weight-normal">168</span>
            </div>

        </form>
    </div>
    <!-- Price End -->
    
    <!-- Color Start -->
    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by color</span></h5>
    <div class="bg-light p-4 mb-30">
        <form>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" checked id="color-all">
                <label class="custom-control-label" for="price-all">All Color</label>
                <span class="badge border font-weight-normal">1000</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="color-1">
                <label class="custom-control-label" for="color-1">Black</label>
                <span class="badge border font-weight-normal">150</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="color-2">
                <label class="custom-control-label" for="color-2">White</label>
                <span class="badge border font-weight-normal">295</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="color-3">
                <label class="custom-control-label" for="color-3">Red</label>
                <span class="badge border font-weight-normal">246</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="color-4">
                <label class="custom-control-label" for="color-4">Blue</label>
                <span class="badge border font-weight-normal">145</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                <input type="checkbox" class="custom-control-input" id="color-5">
                <label class="custom-control-label" for="color-5">Green</label>
                <span class="badge border font-weight-normal">168</span>
            </div>
        </form>
    </div>
    <!-- Color End -->

    <!-- Size Start -->
    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by size</span></h5>
    <div class="bg-light p-4 mb-30">
        <form>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" checked id="size-all">
                <label class="custom-control-label" for="size-all">All Size</label>
                <span class="badge border font-weight-normal">1000</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="size-1">
                <label class="custom-control-label" for="size-1">XS</label>
                <span class="badge border font-weight-normal">150</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="size-2">
                <label class="custom-control-label" for="size-2">S</label>
                <span class="badge border font-weight-normal">295</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="size-3">
                <label class="custom-control-label" for="size-3">M</label>
                <span class="badge border font-weight-normal">246</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="size-4">
                <label class="custom-control-label" for="size-4">L</label>
                <span class="badge border font-weight-normal">145</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                <input type="checkbox" class="custom-control-input" id="size-5">
                <label class="custom-control-label" for="size-5">XL</label>
                <span class="badge border font-weight-normal">168</span>
            </div>
        </form>
    </div>
    <!-- Size End -->







</div>
<!-- Shop Sidebar End -->




<!-- Shop Product Start -->
<div class="col-lg-9 col-md-8">
    <div class="row pb-3">
        <div class="col-12 pb-1">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                    <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                </div>
                <div class="ml-2">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Sorting</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Latest</a>
                            <a class="dropdown-item" href="#">Popularity</a>
                            <a class="dropdown-item" href="#">Best Rating</a>
                        </div>
                    </div>
                    <div class="btn-group ml-2">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Showing</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">10</a>
                            <a class="dropdown-item" href="#">20</a>
                            <a class="dropdown-item" href="#">30</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        @foreach($products as $product)
        <div class="col-lg-4 col-md-6 col-sm-6 pb-1 product-item" data-price="{{ $product->price }}">
            <div class="bg-light mb-4 position-relative">
                <div class="product-img position-relative overflow-hidden">
                <img class="img-fluid w-100" src="{{ asset('web/img/' . basename($product->path)) }}" alt="Product Image">
                    @if ($product->quantity === 0)
                    <div class="out-of-stock-overlay">
                        <span class="out-of-stock-text">Out of Stock</span>
                    </div>
                    @endif
                    <div class="product-action">
                        <button type="button" class="btn btn-outline-dark btn-square" data-product-id="{{ $product->id }}" {{ $product->stock === 0 ? 'disabled' : '' }}>
                            <i class="fa fa-shopping-cart"></i>
                        </button>
                    </div>
                </div>
                <div class="text-center py-4">
                    <a class="h6 text-decoration-none text-truncate" href="#">{{ $product->name }}</a>
                    <div class="d-flex align-items-center justify-content-center mt-2">
                        <h5>${{ $product->price }}</h5><h6 class="text-muted ml-2"><del>${{ $product->previous_price }}</del></h6>
                    </div>
                    <div class="d-flex align-items-center justify-content-center mb-1">
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star-half-alt text-primary mr-1"></small>
                        <small>(99)</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <style>
            .out-of-stock-overlay {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(255, 0, 0, 0.5);
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 1.5rem;
                font-weight: bold;
                z-index: 2;
            }
            .out-of-stock-text {
                background: rgba(0, 0, 0, 0.7);
                padding: 5px 10px;
                border-radius: 5px;
            }
            </style>
                    







        


        <div class="col-12">
            <nav>
                <ul class="pagination justify-content-center">
                <li class="page-item disabled"><a class="page-link" href="#">Previous</span></a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
    

</div>
<!-- Shop Product End -->
</div>
</div>
<!-- Shop End -->


<x-footer/>


<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<x-scripts/>

<script>
    $(document).on('click', '.btn-outline-dark.btn-square', function(e) {
        e.preventDefault();
        var productId = $(this).data('product-id');  // Ensure data-product-id attribute is set correctly in your HTML

        $.ajax({
            url: '/cart/add/' + productId,
            type: 'POST',
            success: function(result) {
                // Display SweetAlert success message
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Product added to cart!',
                    showConfirmButton: false,
                    timer: 1500 // Automatically close after 1.5 seconds
                });
            },
            error: function(xhr, status, error) {
                // Display SweetAlert error message
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong! Please try again later.',
                    showConfirmButton: false,
                    timer: 1500 // Automatically close after 1.5 seconds
                });
            }
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>





<script>
    // Get all checkboxes with class 'price-checkbox'
    const checkboxes = document.querySelectorAll('.price-checkbox');
    
    // Add event listener to each checkbox
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            // If the current checkbox is checked
            if (this.checked) {
                // Uncheck all other checkboxes
                checkboxes.forEach(function(otherCheckbox) {
                    if (otherCheckbox !== checkbox) {
                        otherCheckbox.checked = false;
                    }
                });
            }
        });
    });
</script>




<script>
document.getElementById('filter-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const formData = new FormData(this);

    fetch('{{ route('products.filter') }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.text())
    .then(html => {
        document.getElementById('product-list').innerHTML = html;
    });
});
</script>




<script>
document.addEventListener('DOMContentLoaded', function () {
const checkboxes = document.querySelectorAll('.custom-control-input');
const products = document.querySelectorAll('.product-item');

checkboxes.forEach(function(checkbox) {
checkbox.addEventListener('change', function() {
const checkedBoxes = Array.from(checkboxes)
    .filter(i => i.checked && i.id !== 'price-all')
    .map(i => i.value.split('-').map(Number));

products.forEach(product => {
    const price = parseFloat(product.dataset.price);
    let isVisible = checkedBoxes.some(([min, max]) => price >= min && price <= max);
    product.style.display = isVisible ? '' : 'none';
});

if (document.getElementById('price-all').checked || checkedBoxes.length === 0) {
    products.forEach(product => product.style.display = '');
}
});
});
});
</script>
    




    
</body>

</html>