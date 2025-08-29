<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style>

        .order-card {
    background: #ffffff;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.08);
    padding: 20px;
    color: #333; /* ensure text is visible */
}

.order-card h4 {
    margin-bottom: 15px;
    border-bottom: 1px solid #ddd;
    padding-bottom: 8px;
    font-size: 18px;
    font-weight: 600;
    color: #222; /* darker heading */
}

.product-item {
    display: flex;
    align-items: center;
    gap: 15px;
    background: #f9f9f9; /* light gray instead of pure white */
    border-radius: 6px;
    padding: 12px;
    border: 1px solid #e0e0e0;
}

.product-info h5 {
    margin: 0 0 5px 0;
    font-size: 15px;
    font-weight: 600;
    color: #111; /* make product name visible */
}

.product-info p {
    margin: 2px 0;
    font-size: 14px;
    color: #555;
}

.price-table th {
    background: #f1f1f1;
    color: #333;
    font-weight: 600;
}

.price-table td {
    color: #444;
}

        .order-summary {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }
        .order-card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            padding: 20px;
        }
        .order-card h4 {
            margin-bottom: 15px;
            border-bottom: 1px solid #eee;
            padding-bottom: 8px;
            font-size: 18px;
            font-weight: 600;
        }
        .order-card p {
            margin: 5px 0;
            font-size: 14px;
        }
        .product-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .product-item {
            display: flex;
            align-items: center;
            gap: 15px;
            background: #fafafa;
            border-radius: 6px;
            padding: 10px;
            border: 1px solid #eee;
        }
        .product-item img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #ddd;
        }
        .product-info h5 {
            margin: 0;
            font-size: 15px;
            font-weight: 600;
        }
        .product-info p {
            margin: 2px 0;
            font-size: 13px;
            color: #555;
        }
        .price-table {
            width: 100%;
            border-collapse: collapse;
        }
        .price-table th, .price-table td {
            padding: 8px;
            font-size: 14px;
            border-bottom: 1px solid #eee;
        }
        .price-table th {
            background: #f7f7f7;
        }
        .total-row td {
            font-weight: bold;
            font-size: 15px;
        }
        .badge-status {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 500;
        }
        .badge-success {
            background: #d4f6e3;
            color: #1b7c3d;
        }
        .badge-pending {
            background: #fff3cd;
            color: #856404;
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
