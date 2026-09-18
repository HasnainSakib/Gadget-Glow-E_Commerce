<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSetting;
use Illuminate\Http\Request;

class AboutSettingController extends Controller
{
    public function index()
    {
        $about = AboutSetting::first();

        if (!$about) {
            $about = AboutSetting::create([
                'hero_title' => 'About Gadget & Glow',
                'hero_subtitle' => "Your trusted online hub for authentic tech gadgets and luxury women's beauty products in Bangladesh.",
                'hero_image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=80',
                'story_title' => 'Redefine Tech & Beauty Shopping',
                'story_content' => "Gadget & Glow was established with a singular vision: to bridge the gap between cutting-edge smart gadgets and premium women's beauty cosmetics under one seamless platform.",
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

        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $about = AboutSetting::firstOrFail();

        $request->validate([
            'hero_title' => 'required|string|max:255',
            'hero_subtitle' => 'nullable|string',
            'hero_image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:4096',
            'hero_image_url' => 'nullable|string',
            'story_title' => 'required|string|max:255',
            'story_content' => 'required|string',
            'mission' => 'nullable|string',
            'vision' => 'nullable|string',
            'stat_1_number' => 'required|string|max:50',
            'stat_1_label' => 'required|string|max:100',
            'stat_2_number' => 'required|string|max:50',
            'stat_2_label' => 'required|string|max:100',
            'stat_3_number' => 'required|string|max:50',
            'stat_3_label' => 'required|string|max:100',
            'stat_4_number' => 'required|string|max:50',
            'stat_4_label' => 'required|string|max:100',
        ]);

        $heroImage = $about->hero_image;

        if ($request->hasFile('hero_image_file')) {
            $file = $request->file('hero_image_file');
            $filename = 'about_hero_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/settings'), $filename);
            $heroImage = 'uploads/settings/' . $filename;
        } elseif (!empty($request->hero_image_url)) {
            $heroImage = $request->hero_image_url;
        }

        $about->update([
            'hero_title' => $request->hero_title,
            'hero_subtitle' => $request->hero_subtitle,
            'hero_image' => $heroImage,
            'story_title' => $request->story_title,
            'story_content' => $request->story_content,
            'mission' => $request->mission,
            'vision' => $request->vision,
            'stat_1_number' => $request->stat_1_number,
            'stat_1_label' => $request->stat_1_label,
            'stat_2_number' => $request->stat_2_number,
            'stat_2_label' => $request->stat_2_label,
            'stat_3_number' => $request->stat_3_number,
            'stat_3_label' => $request->stat_3_label,
            'stat_4_number' => $request->stat_4_number,
            'stat_4_label' => $request->stat_4_label,
        ]);

        return redirect()->back()->with('success', 'About Us page content updated successfully!');
    }
}
