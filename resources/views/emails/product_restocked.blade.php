<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Back in Stock - Gadget & Glow</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f6f9; margin: 0; padding: 0; color: #333333; }
        .email-container { max-width: 600px; margin: 30px auto; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.08); }
        .header { background: linear-gradient(135deg, #10b981, #059669); color: #ffffff; padding: 30px 20px; text-align: center; }
        .header h1 { margin: 0; font-size: 24px; font-weight: 800; letter-spacing: 0.5px; }
        .header p { margin: 5px 0 0 0; opacity: 0.95; font-size: 14px; }
        .content { padding: 30px 25px; }
        .alert-box { background-color: #ecfdf5; border-left: 4px solid #10b981; padding: 15px 20px; border-radius: 6px; margin-bottom: 25px; font-size: 14px; color: #065f46; line-height: 1.6; }
        .product-card { border: 1px solid #e2e8f0; border-radius: 10px; padding: 20px; text-align: center; margin-bottom: 25px; background-color: #fafafa; }
        .product-img { max-width: 180px; max-height: 180px; object-fit: contain; border-radius: 8px; margin-bottom: 15px; border: 1px solid #e2e8f0; }
        .product-name { font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 10px 0; }
        .product-price { font-size: 22px; font-weight: 800; color: #2563eb; margin: 0 0 15px 0; }
        .btn-order { display: inline-block; background: linear-gradient(135deg, #2563eb, #1d4ed8); color: #ffffff !important; font-weight: 700; text-decoration: none; padding: 14px 32px; border-radius: 30px; font-size: 16px; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25); }
        .footer { background-color: #f8fafc; padding: 20px; text-align: center; font-size: 13px; color: #64748b; border-top: 1px solid #e2e8f0; }
        .footer a { color: #2563eb; text-decoration: none; }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>Gadget & Glow</h1>
            <p>🎉 সুখবর! আপনার পছন্দের প্রডাক্ট স্টকে আবার যুক্ত হয়েছে!</p>
        </div>

        <div class="content">
            <p style="font-size: 16px; font-weight: 700; color: #0f172a;">প্রিয় {{ $customerName }},</p>
            
            <div class="alert-box">
                <i style="font-style: normal; font-size: 18px; margin-right: 5px;">🔔</i>
                আপনি যে প্রডাক্টটি আপনার উইশলিস্ট বা কার্টে যুক্ত করেছিলেন, যেটি পূর্বে স্টকে পাওয়া যাচ্ছিল না— সেই প্রডাক্টটি এখন আবার আমাদের স্টকে রিফিল করা হয়েছে!
            </div>

            <div class="product-card">
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="product-img">
                <h3 class="product-name">{{ $product->name }}</h3>
                <div class="product-price">৳{{ number_format($product->price, 0) }}</div>
                <div style="margin-top: 15px;">
                    <a href="{{ route('shop.show', $product->slug) }}" class="btn-order">
                        🛒 এখনি অর্ডার করুন (Buy Now)
                    </a>
                </div>
            </div>

            <p style="font-size: 14px; color: #64748b; line-height: 1.6; text-align: center;">
                সীমিত স্টক শেষ হওয়ার আগেই আপনার পছন্দের প্রডাক্টটি সরাসরি অর্ডার করুন।
            </p>
        </div>

        <div class="footer">
            <p>Gadget & Glow - Premium Tech & Luxury Cosmetics</p>
            <p>যেকোনো প্রয়োজনে আমাদের সাথে যোগাযোগ করুন: <a href="mailto:support@gadgetglow.com">support@gadgetglow.com</a></p>
        </div>
    </div>
</body>
</html>
