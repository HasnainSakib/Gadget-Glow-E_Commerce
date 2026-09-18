<?php

namespace App\Http\Controllers;

use App\Models\AboutSetting;

class AboutController extends Controller
{
    public function index()
    {
        $about = AboutSetting::first();

        // Default fallback if database record doesn't exist yet
        if (!$about) {
            $about = new AboutSetting([
                'hero_title' => 'About Gadget & Glow',
                'hero_subtitle' => "Your trusted online hub for authentic tech gadgets and luxury women's beauty products in Bangladesh.",
                'hero_image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=80',
                'story_title' => 'Redefine Tech & Beauty Shopping',
                'story_content' => "Gadget & Glow was established with a singular vision: to bridge the gap between cutting-edge smart gadgets and premium women's beauty cosmetics under one seamless platform. We believe technology and elegance complement each other.",
                'mission' => 'To deliver 100% original gadgets and genuine skincare products right to customer doorsteps across all 64 districts in Bangladesh with uncompromised quality.',
                'vision' => 'To become Bangladesh’s leading lifestyle e-commerce destination renowned for product authenticity, rapid shipping, and stellar customer support.',
                'stat_1_number' => '50,000+',
                'stat_1_label' => 'Happy Customers',
                'stat_2_number' => '100%',
                'stat_2_label' => 'Genuine Products',
                'stat_3_number' => '64',
                'stat_3_label' => 'Districts Covered',
                'stat_4_number' => '24/7',
                'stat_4_label' => 'Customer Care',
            ]);
        }

        return view('about.index', compact('about'));
    }
}
