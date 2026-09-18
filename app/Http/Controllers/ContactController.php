<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\ContactSetting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = ContactSetting::first();

        if (!$contact) {
            $contact = new ContactSetting([
                'page_title' => 'Get in Touch with Gadget & Glow',
                'hero_text' => 'Have questions regarding your order, product specifications, or warranty? Our support team is here to assist you.',
                'address' => 'Level 5, Gadget & Glow Tower, Gulshan 2, Dhaka-1212, Bangladesh',
                'phone' => '+880 1700-000000',
                'email' => 'support@gadgetandglow.com',
                'support_hours' => 'Saturday – Thursday: 9:00 AM – 9:00 PM (Friday Closed)',
                'map_iframe' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.047805175402!2d90.4132890760465!3d23.781329888194454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7a0f70deb73%3A0x30c3642c3d329864!2sGulshan%202%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1700000000000!5m2!1sen!2sbd',
            ]);
        }

        return view('contact.index', compact('contact'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email:filter', 'max:255'],
            'phone' => ['required', 'string', 'regex:/^(?:\+?88)?01[3-9]\d{8}$/'],
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:5',
        ], [
            'name.required' => 'Please enter your full name.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address (e.g. name@example.com).',
            'phone.required' => 'Please enter your phone number.',
            'phone.regex' => 'The phone number must be a valid 11-digit Bangladeshi mobile number starting with 01 (e.g. 01712345678).',
            'subject.required' => 'Please enter a message subject.',
            'message.required' => 'Please enter your message details.',
            'message.min' => 'Message details should be at least 5 characters long.',
        ]);

        ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Thank you! Your message has been received. Our support team will get back to you shortly.');
    }
}
