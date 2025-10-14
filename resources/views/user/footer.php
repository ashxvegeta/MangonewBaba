<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <style>
        .footer {
            background-color: #000;
            color: #fff;
            padding: 20px 0;
            font-family: Arial, sans-serif;
        }
        .footer-container {
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            flex-wrap: wrap;
        }
        .footer-section {
            flex: 1;
            margin: 10px;
            min-width: 200px;
        }
        .footer-section h3 {
            font-size: 18px;
            margin-bottom: 15px;
        }
        .logo-section p {
            font-size: 14px;
            line-height: 1.4;
        }
        .contact-info p {
            font-size: 14px;
            margin: 5px 0;
        }
        .quick-links ul, .mission p {
            font-size: 14px;
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .quick-links ul li {
            margin: 5px 0;
        }
        .quick-links ul li a {
            color: #fff;
            text-decoration: none;
        }
        .quick-links ul li a:hover {
            text-decoration: underline;
        }
        .mission p {
            line-height: 1.6;
        }
        .social-icons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .social-icons a {
            color: #fff;
            margin: 0 10px;
            font-size: 20px;
        }
        .copyright {
            text-align: center;
            font-size: 12px;
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #333;
        }
        @media (max-width: 768px) {
            .footer-container {
                flex-direction: column;
                text-align: center;
            }
            .footer-section {
                margin: 15px 0;
            }
            .social-icons {
                margin-top: 15px;
            }
        }
    </style>
</head>
<body>
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section logo-section">
                <img src="https://mangobaba.in/img/applogouu.png" alt="MangoBaba Logo" style="width: 100px; margin-bottom: 10px;">
                <p>*मंगोबाबा को क्या चुनें?*</p>
                <p>1. *गुणवत्ता की गारंटी!*</p>
                <p>2. *हैंडपिक्ड रसभरी का आनंद*</p>
                <p>नहीं</p>
                <p>3. *उद्वित मूल्य*</p>
                <p>4. *किसानी का सम्मान!* *</p>
            </div>
            <div class="footer-section contact-info">
                <h3>Address</h3>
                <p>☎ +91 7007022169</p>
                <p>📍 Rehmanhera, P.O. Karorri, Uttar Pradesh Lucknow 226101</p>
                <p>✉ mangobabalucknow@gmail.com</p>
            </div>
            <div class="footer-section quick-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Login</a></li>
                </ul>
            </div>
            <div class="footer-section mission">
                <h3>Our Mission</h3>
                <p>At Mangobaba, our mission is to provide the freshest and most delicious mangoes directly from our farms to your table. We are committed to quality, sustainability, and customer satisfaction.</p>
            </div>
        </div>
        <div class="social-icons">
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
        <div class="copyright">
            <p>© mangobaba.in, All Right Reserved.</p>
        </div>
    </footer>
</body>
</html>