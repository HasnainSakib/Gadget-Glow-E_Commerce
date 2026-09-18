<?php

namespace Database\Seeders;

use App\Models\AboutSetting;
use App\Models\Category;
use App\Models\ContactSetting;
use App\Models\Post;
use App\Models\Product;
use App\Models\SeoSetting;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed SEO Settings
        SeoSetting::create([
            'page_key' => 'home',
            'page_name' => 'Home Page',
            'meta_title' => 'Gadget & Glow - Premium Tech Gadgets & Beauty Collection Bangladesh',
            'meta_description' => "Shop the latest noise canceling earbuds, smart fitness watches, mechanical keyboards, and luxury women's makeup & skincare products in Bangladesh.",
        ]);

        SeoSetting::create([
            'page_key' => 'shop',
            'page_name' => 'Shop Storefront Page',
            'meta_title' => 'Shop All Products - Gadget & Glow Store',
            'meta_description' => "Explore our curated selection of high-tech gadgets and premium women's cosmetics with fast delivery across Bangladesh.",
        ]);

        SeoSetting::create([
            'page_key' => 'blog',
            'page_name' => 'Tech & Beauty Blog Page',
            'meta_title' => 'Latest News & Guides - Gadget & Glow Blog',
            'meta_description' => 'Read expert reviews, tech guides, skincare routines, and beauty tips from Gadget & Glow.',
        ]);

        SeoSetting::create([
            'page_key' => 'about',
            'page_name' => 'About Us Page',
            'meta_title' => 'About Us - Gadget & Glow Store',
            'meta_description' => 'Learn more about Gadget & Glow mission, authentic products commitment, and fast nationwide delivery.',
        ]);

        SeoSetting::create([
            'page_key' => 'contact',
            'page_name' => 'Contact Us Page',
            'meta_title' => 'Contact Us - Customer Support Gadget & Glow',
            'meta_description' => 'Get in touch with Gadget & Glow team for customer inquiries, order updates, and support.',
        ]);

        SeoSetting::create([
            'page_key' => 'cart',
            'page_name' => 'Shopping Cart Page',
            'meta_title' => 'Shopping Cart - Gadget & Glow',
            'meta_description' => 'View items in your cart, update quantities, and proceed to secure cash on delivery checkout.',
        ]);

        SeoSetting::create([
            'page_key' => 'checkout',
            'page_name' => 'Checkout Page',
            'meta_title' => 'Checkout & Order Confirmation - Gadget & Glow',
            'meta_description' => 'Complete your order with Cash on Delivery shipping inside Bangladesh.',
        ]);

        // Seed Site Settings
        SiteSetting::set('favicon', 'favicon.svg');
        SiteSetting::set('site_name', 'Gadget & Glow');
        SiteSetting::set('site_email', 'support@gadgetandglow.com');

        // Seed About Settings
        AboutSetting::create([
            'hero_title' => 'About Gadget & Glow',
            'hero_subtitle' => "Your trusted online destination for 100% authentic smart tech gadgets and luxury women's cosmetics in Bangladesh.",
            'hero_image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=80',
            'story_title' => 'Redefining Modern Tech & Beauty Shopping',
            'story_content' => "<p>Gadget & Glow was established with a clear vision: to bring top-notch technology products and premium beauty cosmetics under one reliable e-commerce roof.</p><p>Whether you are seeking state-of-the-art wireless earbuds, high-performance mechanical gaming keyboards, or nourishing vitamin C face serums and vibrant lipstick trios, we handpick every item to ensure absolute authenticity and unmatched performance.</p>",
            'mission' => 'To deliver 100% genuine gadgets and luxury skincare products right to customer doorsteps across all 64 districts in Bangladesh with uncompromised quality and customer satisfaction.',
            'vision' => 'To be Bangladesh’s most loved e-commerce brand recognized for product authenticity, rapid delivery, and transparent customer service.',
            'stat_1_number' => '50,000+',
            'stat_1_label' => 'Happy Customers',
            'stat_2_number' => '100%',
            'stat_2_label' => 'Authentic Products',
            'stat_3_number' => '64',
            'stat_3_label' => 'Districts Covered',
            'stat_4_number' => '24/7',
            'stat_4_label' => 'Customer Care',
        ]);

        // Seed Contact Settings
        ContactSetting::create([
            'page_title' => 'Get in Touch with Gadget & Glow',
            'hero_text' => 'Have questions regarding your order, product specifications, or warranty? Our dedicated support team is available to help you.',
            'address' => 'Level 5, Gadget & Glow Tower, Gulshan 2, Dhaka-1212, Bangladesh',
            'phone' => '+880 1700-000000',
            'email' => 'support@gadgetandglow.com',
            'support_hours' => 'Saturday – Thursday: 9:00 AM – 9:00 PM (Friday Closed)',
            'map_iframe' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.047805175402!2d90.4132890760465!3d23.781329888194454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7a0f70deb73%3A0x30c3642c3d329864!2sGulshan%202%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1700000000000!5m2!1sen!2sbd',
        ]);

        // Seed Sample Blog Posts
        Post::create([
            'title' => 'Top 5 Must-Have Smart Tech Gadgets for 2026',
            'slug' => 'top-5-must-have-smart-tech-gadgets-for-2026',
            'excerpt' => 'From active noise canceling earbuds to 65W fast chargers, discover the latest gadgets boosting productivity and entertainment.',
            'content' => '<p>Tech innovation is moving faster than ever. In this article, we highlight five groundbreaking gadgets that every tech enthusiast in Bangladesh should consider adding to their daily setup.</p><h3>1. Active Noise Cancellation Earbuds</h3><p>Enjoy uninterrupted audio and immersive bass whether commuting in Dhaka or working from home.</p><h3>2. High-Precision Smartwatches</h3><p>Monitor your health metrics, heart rate, and steps effortlessly while looking stylish.</p>',
            'image' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=800&q=80',
            'author' => 'Tech Insights Team',
            'is_published' => true,
            'views' => 142,
        ]);

        Post::create([
            'title' => 'The Ultimate Daily Skincare & Glow Routine',
            'slug' => 'the-ultimate-daily-skincare-glow-routine',
            'excerpt' => 'Achieve healthy, glowing skin with our step-by-step serum, hydration, and facial care recommendations.',
            'content' => '<p>Caring for your skin requires consistency and authentic products. Learn how Vitamin C serums and Hyaluronic moisturizers transform your skin barrier.</p><h3>Morning Glow Routine</h3><p>Cleanse gently, apply Vitamin C serum for antioxidants, and lock in hydration with a lightweight gel moisturizer.</p>',
            'image' => 'https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?auto=format&fit=crop&w=800&q=80',
            'author' => 'Beauty Editor',
            'is_published' => true,
            'views' => 98,
        ]);

        // Seed Categories
        $tech = Category::create([
            'name' => 'Tech & Gadgets',
            'slug' => 'tech-gadgets',
            'description' => 'Latest smart devices, audio gear, and premium electronic accessories.',
            'image' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=600&q=80',
        ]);

        $beauty = Category::create([
            'name' => "Women's Beauty & Makeup",
            'slug' => 'beauty-makeup',
            'description' => 'Premium cosmetics, luxury skincare serums, and beauty essentials.',
            'image' => 'https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?auto=format&fit=crop&w=600&q=80',
        ]);

        // Tech Gadgets Products
        $techProducts = [
            [
                'name' => 'Pro ANC Wireless Noise Canceling Earbuds',
                'description' => 'Experience crystal-clear audio with active noise cancellation, touch controls, and 30-hour total battery life.',
                'price' => 2490,
                'stock' => 25,
                'is_featured' => true,
                'image' => 'https://images.unsplash.com/photo-1590658268037-6bf12165a8df?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'name' => 'Ultra Smart Fitness Watch Series 9',
                'description' => 'Track your workouts, heart rate, sleep quality, and receive instant smartphone notifications on a vibrant HD AMOLED display.',
                'price' => 4500,
                'stock' => 15,
                'is_featured' => true,
                'image' => 'https://images.unsplash.com/photo-1508685096489-7aacd43bd3b1?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'name' => 'RGB Mechanical Wireless Gaming Keyboard',
                'description' => 'Hot-swappable tactile switches, customizable per-key RGB backlighting, and dual Bluetooth/2.4G connectivity.',
                'price' => 3200,
                'stock' => 30,
                'is_featured' => false,
                'image' => 'https://images.unsplash.com/photo-1587829741301-dc798b83add3?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'name' => 'PD 65W Fast Charging 20000mAh Power Bank',
                'description' => 'Ultra-high capacity portable charger capable of powering smartphones, tablets, and USB-C laptops on the go.',
                'price' => 1850,
                'stock' => 40,
                'is_featured' => true,
                'image' => 'https://images.unsplash.com/photo-1617788138017-80ad40651399?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'name' => 'Magnetic 3-in-1 Foldable Wireless Charging Station',
                'description' => 'Simultaneously charge your smartphone, smartwatch, and wireless earbuds with sleek space-saving design.',
                'price' => 1650,
                'stock' => 20,
                'is_featured' => false,
                'image' => 'https://images.unsplash.com/photo-1622445268465-8438465b0f5b?auto=format&fit=crop&w=800&q=80',
            ],
        ];

        foreach ($techProducts as $item) {
            Product::create(array_merge($item, [
                'category_id' => $tech->id,
                'slug' => Str::slug($item['name']),
            ]));
        }

        // Beauty Products
        $beautyProducts = [
            [
                'name' => 'Velvet Matte Long-Wear Red Lipstick Trio',
                'description' => 'Richly pigmented hydrating formula that glides smoothly for a velvety matte finish that lasts all day without drying.',
                'price' => 1250,
                'stock' => 50,
                'is_featured' => true,
                'image' => 'https://images.unsplash.com/photo-1586495777744-4413f21062fa?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'name' => 'Radiant Vitamin C Glow Face Serum (30ml)',
                'description' => 'Potent antioxidant serum infused with hyaluronic acid to brighten skin tone, reduce fine lines, and boost elasticity.',
                'price' => 1450,
                'stock' => 35,
                'is_featured' => true,
                'image' => 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'name' => 'Luxurious Rose Gold 18-Color Eyeshadow Palette',
                'description' => 'Blendable matte and shimmer shades inspired by warm sunset tones, perfect for versatile day-to-night eye looks.',
                'price' => 1800,
                'stock' => 20,
                'is_featured' => false,
                'image' => 'https://images.unsplash.com/photo-1512496015851-a90fb38ba796?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'name' => 'Deep Hydration Hyaluronic Facial Moisturizer',
                'description' => 'Lightweight gel-cream formulation providing 72 hours of intense hydration for a smooth, glowing complexion.',
                'price' => 1600,
                'stock' => 45,
                'is_featured' => true,
                'image' => 'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'name' => 'Elegance Rose & Vanilla Fine Fragrance Perfume',
                'description' => 'An alluring blend of fresh Damask rose, warm vanilla, and subtle amber notes in a handcrafted glass spray bottle.',
                'price' => 2800,
                'stock' => 18,
                'is_featured' => false,
                'image' => 'https://images.unsplash.com/photo-1541643600914-78b084683601?auto=format&fit=crop&w=800&q=80',
            ],
        ];

        foreach ($beautyProducts as $item) {
            Product::create(array_merge($item, [
                'category_id' => $beauty->id,
                'slug' => Str::slug($item['name']),
            ]));
        }
    }
}
