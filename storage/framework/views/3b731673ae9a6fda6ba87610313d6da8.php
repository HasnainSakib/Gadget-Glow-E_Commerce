<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation - Gadget & Glow</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f6f9; margin: 0; padding: 0; color: #333333; }
        .email-container { max-width: 600px; margin: 30px auto; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.08); }
        .header { background: linear-gradient(135deg, #2563eb, #1d4ed8); color: #ffffff; padding: 30px 20px; text-align: center; }
        .header h1 { margin: 0; font-size: 24px; font-weight: 800; letter-spacing: 0.5px; }
        .header p { margin: 5px 0 0 0; opacity: 0.9; font-size: 14px; }
        .content { padding: 30px 25px; }
        .alert-box { background-color: #eff6ff; border-left: 4px solid #2563eb; padding: 15px 20px; border-radius: 6px; margin-bottom: 25px; font-size: 14px; color: #1e3a8a; line-height: 1.6; }
        .alert-box strong { color: #1d4ed8; }
        .info-table { width: 100%; border-collapse: collapse; margin-bottom: 25px; }
        .info-table td { padding: 8px 0; font-size: 14px; border-bottom: 1px dashed #e2e8f0; }
        .info-table td.label { color: #64748b; font-weight: 600; width: 40%; }
        .info-table td.value { color: #0f172a; font-weight: 700; text-align: right; }
        .badge-ref { display: inline-block; background-color: #fef3c7; color: #b45309; padding: 4px 10px; border-radius: 20px; font-family: monospace; font-size: 15px; letter-spacing: 1px; }
        .items-table { width: 100%; border-collapse: collapse; margin-top: 15px; margin-bottom: 25px; }
        .items-table th { background-color: #f8fafc; color: #475569; text-align: left; padding: 10px; font-size: 13px; text-transform: uppercase; border-bottom: 2px solid #e2e8f0; }
        .items-table td { padding: 12px 10px; font-size: 14px; border-bottom: 1px solid #f1f5f9; }
        .total-row td { font-weight: 800; font-size: 16px; color: #2563eb; border-top: 2px solid #e2e8f0; }
        .footer { background-color: #f8fafc; padding: 20px; text-align: center; font-size: 13px; color: #64748b; border-top: 1px solid #e2e8f0; }
        .footer a { color: #2563eb; text-decoration: none; }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>Gadget & Glow</h1>
            <p>অর্ডার কনফার্মেশন ও রিসিপ্ট</p>
        </div>

        <div class="content">
            <p style="font-size: 16px; font-weight: 700; color: #0f172a;">প্রিয় <?php echo e($order->customer_name); ?>,</p>
            <p style="font-size: 14px; color: #475569; line-height: 1.6;">
                Gadget & Glow-এ অর্ডার করার জন্য আপনাকে ধন্যবাদ! আপনার অর্ডারটি সফলভাবে গৃহীত হয়েছে।
            </p>

            <div class="alert-box">
                <i style="font-style: normal; font-size: 18px; margin-right: 5px;">📞</i>
                <strong>গুরুত্বপূর্ণ তথ্য:</strong> আমাদের কোম্পানি (Gadget & Glow) থেকে আপনাকে ফোন করে অর্ডারটি কনফার্ম করা হবে। অনুগ্রহ করে ফোন কলটি রিসিভ করার জন্য সচেষ্ট থাকুন।
            </div>

            <table class="info-table">
                <tr>
                    <td class="label">অর্ডার নম্বর (Order #):</td>
                    <td class="value"><?php echo e($order->order_number); ?></td>
                </tr>
                <tr>
                    <td class="label">তারিখ (Date):</td>
                    <td class="value"><?php echo e($order->created_at->format('d M Y, h:i A')); ?></td>
                </tr>
                <tr>
                    <td class="label">পেমেন্ট মেথড (Payment):</td>
                    <td class="value">
                        <?php if($order->payment_method == 'bkash'): ?>
                            bKash (বিকাশ)
                        <?php elseif($order->payment_method == 'nagad'): ?>
                            Nagad (নগদ)
                        <?php elseif($order->payment_method == 'rocket'): ?>
                            Rocket (রকেট)
                        <?php else: ?>
                            Cash on Delivery (ক্যাশ অন ডেলিভারি)
                        <?php endif; ?>
                    </td>
                </tr>
                <?php if($order->payment_ref_code): ?>
                <tr>
                    <td class="label">রেফারেন্স কোড (Ref Code):</td>
                    <td class="value"><span class="badge-ref"><?php echo e($order->payment_ref_code); ?></span></td>
                </tr>
                <?php endif; ?>
                <tr>
                    <td class="label">ডেলিভারি ঠিকানা:</td>
                    <td class="value" style="font-weight: 500;"><?php echo e($order->shipping_address); ?></td>
                </tr>
            </table>

            <h3 style="font-size: 15px; color: #0f172a; margin-bottom: 10px; border-bottom: 2px solid #2563eb; display: inline-block; padding-bottom: 3px;">অর্ডারকৃত প্রডাক্ট সমূহের তালিকা</h3>

            <table class="items-table">
                <thead>
                    <tr>
                        <th>প্রডাক্ট</th>
                        <th style="text-align: center;">পরিমাণ</th>
                        <th style="text-align: right;">মূল্য</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->product->name ?? 'Product'); ?></td>
                        <td style="text-align: center;"><?php echo e($item->quantity); ?></td>
                        <td style="text-align: right;">৳<?php echo e(number_format($item->price * $item->quantity, 0)); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr class="total-row">
                        <td colspan="2">সর্বমোট (Total Amount):</td>
                        <td style="text-align: right;">৳<?php echo e(number_format($order->total_amount, 0)); ?></td>
                    </tr>
                </tbody>
            </table>

            <?php if(in_array($order->payment_method, ['bkash', 'nagad', 'rocket'])): ?>
            <div style="background-color: #fffbeb; border: 1px solid #fef3c7; padding: 12px 15px; border-radius: 8px; font-size: 13px; color: #92400e;">
                💡 <strong>সেন্ড মানি করার পার্সোনাল নম্বর:</strong> 
                <?php if($order->payment_method == 'bkash'): ?>
                    bKash: <strong>01791806727</strong> (Personal)
                <?php elseif($order->payment_method == 'nagad'): ?>
                    Nagad: <strong>01791806727</strong> (Personal)
                <?php elseif($order->payment_method == 'rocket'): ?>
                    Rocket: <strong>017918067270</strong> (Personal - 12 Digits)
                <?php endif; ?>
                <br>
                তথা লেনদেনের সময় <code><?php echo e($order->payment_ref_code); ?></code> কোডটি রেফারেন্স হিসেবে ব্যবহার করার জন্য অনুরোধ করা হলো।
            </div>
            <?php endif; ?>
        </div>

        <div class="footer">
            <p>Gadget & Glow - Premium Tech & Luxury Cosmetics</p>
            <p>যেকোনো প্রয়োজনে আমাদের সাথে যোগাযোগ করুন: <a href="mailto:support@gadgetglow.com">support@gadgetglow.com</a></p>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Users\monom\Downloads\gadget-glow-store\resources\views/emails/order_confirmation.blade.php ENDPATH**/ ?>