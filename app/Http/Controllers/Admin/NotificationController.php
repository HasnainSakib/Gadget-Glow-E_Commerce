<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Order;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Mark a single notification item as read and redirect to its target page.
     */
    public function markAsRead($type, $id)
    {
        if ($type === 'order') {
            $order = Order::find($id);
            if ($order) {
                $order->update(['is_read' => true]);
                return redirect()->route('admin.orders.show', $order->id);
            }
        } elseif ($type === 'message') {
            $message = ContactMessage::find($id);
            if ($message) {
                $message->update(['is_read' => true]);
                return redirect()->route('admin.contact.index');
            }
        }

        return redirect()->back();
    }

    /**
     * Mark all unread orders and contact messages as read.
     */
    public function markAllAsRead()
    {
        Order::where('is_read', false)->update(['is_read' => true]);
        ContactMessage::where('is_read', false)->update(['is_read' => true]);

        return redirect()->back()->with('success', 'All notifications marked as read.');
    }
}
