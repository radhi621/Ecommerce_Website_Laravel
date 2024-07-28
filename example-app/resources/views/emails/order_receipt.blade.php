<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
</head>
<body>
    <h1>Order Confirmation</h1>
    <p>Thank you for your order, {{ $order->first_name }}!</p>
    <p>Here are the details of your order:</p>
    <ul>
        <li>Last Name: {{ $order->last_name }}</li>
        <li>Email: {{ $order->email }}</li>
        <li>Phone: {{ $order->mobile }}</li>
        <li>Address 1: {{ $order->address1 }}</li>
        <li>Address 2: {{ $order->address2 }}</li>
        <li>City: {{ $order->city }}</li>
        <li>ZIP Code: {{ $order->zip }}</li>
    </ul>

    <h2>Products Ordered:</h2>
    <ul>
        @foreach ($productsDetails as $product)
            <li>{{ $product['name'] }} - Quantity: {{ $product['quantity'] }} at ${{ number_format($product['price'], 2) }} each</li>
        @endforeach
    </ul>
</body>
</html>
