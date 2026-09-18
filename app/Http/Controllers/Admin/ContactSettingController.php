<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\ContactSetting;
use Illuminate\Http\Request;

class ContactSettingController extends Controller
{
    public function index()
    {
        $contact = ContactSetting::first();

        if (!$contact) {
            $contact = ContactSetting::create([
                'page_title' => 'Get in Touch with Gadget & Glow',
                'hero_text' => 'Have questions regarding your order, product specifications, or warranty? Our support team is here to assist you.',
                'address' => 'Level 5, Gadget & Glow Tower, Gulshan 2, Dhaka-1212, Bangladesh',
                'phone' => '+880 1700-000000',
                'email' => 'support@gadgetandglow.com',
                'support_hours' => 'Saturday – Thursday: 9:00 AM – 9:00 PM (Friday Closed)',
                'map_iframe' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.047805175402!2d90.4132890760465!3d23.781329888194454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7a0f70deb73%3A0x30c3642c3d329864!2sGulshan%202%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1700000000000!5m2!1sen!2sbd',
            ]);
        }

        $messages = ContactMessage::latest()->paginate(10);

        return view('admin.contact.edit', compact('contact', 'messages'));
    }

    public function update(Request $request)
    {
        $contact = ContactSetting::firstOrFail();

        $request->validate([
            'page_title' => 'required|string|max:255',
            'hero_text' => 'nullable|string',
            'address' => 'required|string',
            'phone' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'support_hours' => 'nullable|string|max:255',
            'map_iframe' => 'nullable|string',
        ]);

        $contact->update([
            'page_title' => $request->page_title,
            'hero_text' => $request->hero_text,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'support_hours' => $request->support_hours,
            'map_iframe' => $request->map_iframe,
        ]);

        return redirect()->back()->with('success', 'Contact Us page settings updated successfully!');
    }

    public function deleteMessage($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return redirect()->back()->with('success', 'Customer message deleted successfully!');
    }
}
