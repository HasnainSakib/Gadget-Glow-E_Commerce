<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $favicon = SiteSetting::get('favicon', 'favicon.svg');
        $siteName = SiteSetting::get('site_name', 'Gadget & Glow');
        $siteLogo = SiteSetting::get('site_logo', null);
        $bkashLogo = SiteSetting::get('bkash_logo', 'images/payments/bkash.svg');
        $nagadLogo = SiteSetting::get('nagad_logo', 'images/payments/nagad.svg');
        $rocketLogo = SiteSetting::get('rocket_logo', 'images/payments/rocket.svg');

        // Helper closures for URLs
        $getLogoUrl = function ($settingVal, $defaultRelative) {
            if (!$settingVal) {
                return asset($defaultRelative);
            }
            if (filter_var($settingVal, FILTER_VALIDATE_URL)) {
                return $settingVal;
            }
            return asset($settingVal);
        };

        $faviconUrl = $getLogoUrl($favicon, 'favicon.svg');
        $siteLogoUrl = $siteLogo ? $getLogoUrl($siteLogo, '') : null;
        $bkashLogoUrl = $getLogoUrl($bkashLogo, 'images/payments/bkash.svg');
        $nagadLogoUrl = $getLogoUrl($nagadLogo, 'images/payments/nagad.svg');
        $rocketLogoUrl = $getLogoUrl($rocketLogo, 'images/payments/rocket.svg');

        return view('admin.settings.index', compact(
            'favicon',
            'faviconUrl',
            'siteName',
            'siteLogo',
            'siteLogoUrl',
            'bkashLogo',
            'bkashLogoUrl',
            'nagadLogo',
            'nagadLogoUrl',
            'rocketLogo',
            'rocketLogoUrl'
        ));
    }

    public function updateSiteInfo(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'site_logo_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
            'site_logo_url' => 'nullable|string',
        ]);

        SiteSetting::set('site_name', $request->site_name);

        if ($request->hasFile('site_logo_file')) {
            $file = $request->file('site_logo_file');
            $filename = 'site_logo_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/settings'), $filename);
            SiteSetting::set('site_logo', 'uploads/settings/' . $filename);
        } elseif (!empty($request->site_logo_url)) {
            SiteSetting::set('site_logo', $request->site_logo_url);
        }

        return redirect()->back()->with('success', 'Store name and logo updated successfully!');
    }

    public function updatePaymentLogos(Request $request)
    {
        $request->validate([
            'bkash_logo_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
            'bkash_logo_url' => 'nullable|string',
            'nagad_logo_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
            'nagad_logo_url' => 'nullable|string',
            'rocket_logo_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
            'rocket_logo_url' => 'nullable|string',
        ]);

        // bKash Logo
        if ($request->hasFile('bkash_logo_file')) {
            $file = $request->file('bkash_logo_file');
            $filename = 'bkash_logo_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/settings'), $filename);
            SiteSetting::set('bkash_logo', 'uploads/settings/' . $filename);
        } elseif (!empty($request->bkash_logo_url)) {
            SiteSetting::set('bkash_logo', $request->bkash_logo_url);
        }

        // Nagad Logo
        if ($request->hasFile('nagad_logo_file')) {
            $file = $request->file('nagad_logo_file');
            $filename = 'nagad_logo_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/settings'), $filename);
            SiteSetting::set('nagad_logo', 'uploads/settings/' . $filename);
        } elseif (!empty($request->nagad_logo_url)) {
            SiteSetting::set('nagad_logo', $request->nagad_logo_url);
        }

        // Rocket Logo
        if ($request->hasFile('rocket_logo_file')) {
            $file = $request->file('rocket_logo_file');
            $filename = 'rocket_logo_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/settings'), $filename);
            SiteSetting::set('rocket_logo', 'uploads/settings/' . $filename);
        } elseif (!empty($request->rocket_logo_url)) {
            SiteSetting::set('rocket_logo', $request->rocket_logo_url);
        }

        return redirect()->back()->with('success', 'Mobile banking payment logos updated successfully!');
    }

    public function resetLogo(Request $request, $type)
    {
        if ($type === 'site') {
            SiteSetting::set('site_logo', null);
        } elseif ($type === 'bkash') {
            SiteSetting::set('bkash_logo', 'images/payments/bkash.svg');
        } elseif ($type === 'nagad') {
            SiteSetting::set('nagad_logo', 'images/payments/nagad.svg');
        } elseif ($type === 'rocket') {
            SiteSetting::set('rocket_logo', 'images/payments/rocket.svg');
        }

        return redirect()->back()->with('success', ucfirst($type) . ' logo reset to default!');
    }

    public function updateFavicon(Request $request)
    {
        $request->validate([
            'favicon_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,ico,webp|max:2048',
            'favicon_url' => 'nullable|string',
        ]);

        if ($request->hasFile('favicon_file')) {
            $file = $request->file('favicon_file');
            $filename = 'favicon_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/settings'), $filename);
            
            $path = 'uploads/settings/' . $filename;
            SiteSetting::set('favicon', $path);

            return redirect()->back()->with('success', 'Favicon updated successfully via file upload!');
        } elseif (!empty($request->favicon_url)) {
            SiteSetting::set('favicon', $request->favicon_url);

            return redirect()->back()->with('success', 'Favicon updated successfully via URL!');
        }

        return redirect()->back()->with('error', 'Please upload a favicon image file or provide a valid image URL.');
    }

    public function resetFavicon()
    {
        SiteSetting::set('favicon', 'favicon.svg');
        return redirect()->back()->with('success', 'Favicon reset to default!');
    }
}
