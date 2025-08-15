<!DOCTYPE html>
<html lang="en">
<head>
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BigBasket Checkout UI</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        background-color: #f8f8f8;
    }

    /* Header */
    .checkout-header {
        background-color: #5ba829;
        color: white;
        padding: 10px;
        display: flex;
        align-items: center;
        flex-wrap: wrap;
    }
    .checkout-header img {
        height: 40px;
        margin-right: 15px;
    }
    .checkout-steps {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        font-size: 14px;
    }
    .checkout-steps span {
        display: flex;
        align-items: center;
    }
    .checkout-steps span::before {
        content: "✔";
        margin-right: 5px;
        color: white;
    }

    /* Main container */
    .container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        padding: 20px;
    }
    .delivery-options, .order-summary {
        background-color: white;
        border-radius: 6px;
        padding: 20px;
    }
    .delivery-options {
        flex: 2;
    }
    .order-summary {
        flex: 1;
        min-width: 250px;
        border: 1px solid #ddd;
    }

    /* Delivery Options */
    .delivery-options h3 {
        margin-top: 0;
    }
    .product-list {
        display: flex;
        align-items: center;
        gap: 5px;
        margin-bottom: 15px;
    }
    .product-list img {
        width: 40px;
        height: 40px;
        border-radius: 4px;
    }
    .product-list button {
        background-color: #f1f1f1;
        border: none;
        padding: 5px 10px;
        border-radius: 4px;
        cursor: pointer;
    }

    /* Form styles */
    form label {
        display: block;
        margin-top: 10px;
        font-size: 14px;
        font-weight: bold;
    }
    form input, form textarea, form select {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }
    textarea {
        resize: vertical;
    }
    .proceed-btn {
        margin-top: 20px;
        background-color: red;
        color: white;
        padding: 12px;
        border: none;
        width: 100%;
        font-size: 16px;
        border-radius: 4px;
        cursor: pointer;
    }
    .proceed-btn:hover {
        background-color: darkred;
    }

    /* Order Summary */
    .order-summary h3 {
        margin-top: 0;
    }
    .summary-item {
        display: flex;
        justify-content: space-between;
        padding: 5px 0;
        font-size: 16px;
    }
    .total-savings {
        background-color: #e6f5d6;
        padding: 10px;
        border-radius: 4px;
        margin-top: 10px;
        font-weight: bold;
        color: #5ba829;
        display: flex;
        justify-content: space-between;
    }
    .note {
        background-color: #fff5db;
        padding: 10px;
        border: 1px solid #ffd66b;
        border-radius: 4px;
        font-size: 13px;
        margin-top: 10px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .container {
            flex-direction: column;
        }
    }
</style>
</head>
<body>

<!-- Header -->
<div class="checkout-header">
    <img src="https://www.bbassets.com/static/v2596/custPage/build/content/img/bb_logo.png" alt="BigBasket">
    <div class="checkout-steps">
        <span>Delivery Address</span>
        <span>Delivery Options</span>
        <span>Payment Options</span>
    </div>
</div>

<!-- Main Content -->
<div class="container">
    <!-- Delivery Options -->
    <div class="delivery-options">
        <h3><i class="fas fa-shopping-basket me-2 text-warning"></i> Order Confirmation</h3>

        <!-- Form -->
        <form>
            <label for="address">Delivery Address</label>
            <textarea id="address" name="address" rows="3" placeholder="Enter your delivery address"></textarea>

            <label for="contact">Contact Number</label>
            <input type="tel" id="contact" name="contact" placeholder="Enter your phone number">

            <label for="slot">Delivery Slot</label>
            <select id="slot" name="slot">
                <option>13 Aug, Wed, Between 6:30 AM - 7:30 AM</option>
                <option>13 Aug, Wed, Between 10:00 AM - 11:00 AM</option>
                <option>13 Aug, Wed, Between 4:00 PM - 5:00 PM</option>
            </select>

            <label for="notes">Additional Notes</label>
            <textarea id="notes" name="notes" rows="2" placeholder="Any specific instructions?"></textarea>

            <button type="submit" class="proceed-btn">Proceed to payment</button>
        </form>
    </div>

    <!-- Order Summary -->
  <!-- Order Summary -->
<div class="order-summary">
    <h3>Order Summary</h3>

    <!-- Product List -->
    <div style="margin-bottom: 15px;">
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px;">
            <div style="display: flex; align-items: center; gap: 8px;">
                <img src="https://mangobaba.in/product_images/1749062015.png" alt="Product 1" style="border-radius: 4px; width: 32px; height: 32px;">
                <div>
                    <div style="font-weight: bold; font-size: 14px;">Organic Apples</div>
                    <div style="font-size: 12px; color: gray;">1kg</div>
                </div>
            </div>
            <div style="font-weight: bold; font-size: 14px;">₹120</div>
        </div>

        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px;">
            <div style="display: flex; align-items: center; gap: 8px;">
                <img src="https://mangobaba.in/product_images/1749062015.png" alt="Product 2" style="border-radius: 4px; width: 32px; height: 32px;">
                <div>
                    <div style="font-weight: bold; font-size: 14px;">Fresh Milk</div>
                    <div style="font-size: 12px; color: gray;">1L</div>
                </div>
            </div>
            <div style="font-weight: bold; font-size: 14px;">₹65</div>
        </div>

        <div style="display: flex; align-items: center; justify-content: space-between;">
            <div style="display: flex; align-items: center; gap: 8px;">
                <img src="https://mangobaba.in/product_images/1749062015.png" alt="Product 3" style="border-radius: 4px; width: 32px; height: 32px;">
                <div>
                    <div style="font-weight: bold; font-size: 14px;">Brown Bread</div>
                    <div style="font-size: 12px; color: gray;">400g</div>
                </div>
            </div>
            <div style="font-weight: bold; font-size: 14px;">₹72</div>
        </div>
    </div>

    <!-- Price Summary -->
    <div class="summary-item">
        <span>Total Amount Payable</span>
        <span>₹257</span>
    </div>
    <div class="total-savings">
        <span>Total Savings</span>
        <span>₹150</span>
    </div>
    <div class="note">
        Select your address and delivery slot to know accurate delivery charges.  
        You can save more by applying a voucher!
    </div>
</div>

</div>

</body>
</html>
