<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoSetting;
use Illuminate\Http\Request;

class SeoSettingController extends Controller
{
    public function index()
    {
        $seoSettings = SeoSetting::all();
        return view('admin.seo.index', compact('seoSettings'));
    }

    public function update(Request $request, $id)
    {
        $seoSetting = SeoSetting::findOrFail($id);

        $request->validate([
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string',
        ]);

        $seoSetting->update([
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
        ]);

        return redirect()->back()->with('success', 'SEO settings for ' . $seoSetting->page_name . ' updated successfully!');
    }
}
