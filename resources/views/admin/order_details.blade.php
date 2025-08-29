<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
<style>
    .order-card {
        background: #1e1e2d; /* dark card */
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.5);
        padding: 20px;
        color: #f5f5f5; /* light text */
        margin-bottom: 20px;
    }

    .order-card h4 {
        margin-bottom: 15px;
        border-bottom: 1px solid #333;
        padding-bottom: 8px;
        font-size: 18px;
        font-weight: 600;
        color: #ffffff;
    }

    .product-item {
        display: flex;
        align-items: center;
        gap: 15px;
        background: #2a2a3d; /* slightly lighter than card */
        border-radius: 6px;
        padding: 12px;
        border: 1px solid #333;
    }

    .product-item img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 6px;
        border: 1px solid #444;
    }

    .product-info h5 {
        margin: 0 0 5px 0;
        font-size: 15px;
        font-weight: 600;
        color: #ffffff;
    }

    .product-info p {
        margin: 2px 0;
        font-size: 13px;
        color: #cfcfcf;
    }

    .price-table {
        width: 100%;
        border-collapse: collapse;
    }

    .price-table th, 
    .price-table td {
        padding: 8px;
        font-size: 14px;
        border-bottom: 1px solid #333;
    }

    .price-table th {
        background: #2a2a3d;
        color: #fff;
        font-weight: 600;
    }

    .price-table td {
        color: #ddd;
    }

    .total-row td {
        font-weight: bold;
        font-size: 15px;
        color: #fff;
    }

    /* Badges */
    .badge-status {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 500;
    }
    .badge-success {
        background: rgba(40,167,69,0.2);
        color: #28a745;
    }
    .badge-pending {
        background: rgba(255,193,7,0.2);
        color: #ffc107;
    }
</style>

</head>

<body>
<div class="container-scroller">
    @include('admin.sidebar')
    @include('admin.navbar')

    <div class="main-panel">
       <div class="content-wrapper">

    <h2 class="text-white mb-4">Order Details</h2>

    <!-- Top Summary -->
    <div class="row">
        <!-- Order Info -->
        <div class="col-md-6">
            <div class="order-card">
                <h4>Order Information</h4>
                <p><strong>Order ID:</strong> #{{ $order->id }}</p>
                <p><strong>Order Date:</strong> {{ $order->created_at->format('d M Y') }}</p>
                <p><strong>Status:</strong> 
                    <span class="badge-status {{ $order->status ? 'badge-success' : 'badge-pending' }}">
                        {{ $order->status ? 'Success' : 'Pending' }}
                    </span>
                </p>
                <p><strong>Total Price:</strong> ₹{{ $order->total_price }}</p>
            </div>
        </div>

        <!-- Customer Info -->
        <div class="col-md-6">
            <div class="order-card">
                <h4>Customer Information</h4>
                <p><strong>Name:</strong> {{ $order->name }}</p>
                <p><strong>Email:</strong> {{ $order->email }}</p>
                <p><strong>Phone:</strong> {{ $order->phone }}</p>
                <p><strong>Address:</strong> {{ $order->address }}, {{ $order->city }}, {{ $order->state }}</p>
            </div>
        </div>
    </div>

    <!-- Products -->
    <div class="order-card mt-4">
        <h4>Ordered Products</h4>
        <div class="product-list">
            @foreach ($order->orderItems as $item)
                <div class="product-item">
                    <img src="{{ asset('images/products/'.$item->product->image) }}" alt="{{ $item->product->name }}">
                    <div class="product-info">
                        <h5>{{ $item->product->name }}</h5>
                        <p>Qty: {{ $item->qty }}</p>
                        <p>Unit Price: ₹{{ $item->price }}</p>
                        <p>Subtotal: ₹{{ $item->price * $item->qty }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Price Summary -->
    <div class="order-card mt-4">
        <h4>Price Summary</h4>
        <table class="price-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php $grandTotal = 0; @endphp
                @foreach ($order->orderItems as $item)
                    @php $subtotal = $item->qty * $item->price; $grandTotal += $subtotal; @endphp
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>₹{{ $item->price }}</td>
                        <td>₹{{ $subtotal }}</td>
                    </tr>
                @endforeach
                <tr class="total-row">
                    <td colspan="3" class="text-right">Total Amount</td>
                    <td>₹{{ $grandTotal }}</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

    </div>
</div>

@include('admin.script')
</body>
</html>
