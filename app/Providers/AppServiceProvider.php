<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $favicon = 'favicon.svg';
            $siteName = 'Gadget & Glow';
            $siteLogo = null;
            $wishlistCount = 0;

            try {
                if (Schema::hasTable('site_settings')) {
                    $customFavicon = \App\Models\SiteSetting::get('favicon');
                    if ($customFavicon) {
                        $favicon = $customFavicon;
                    }
                    $customSiteName = \App\Models\SiteSetting::get('site_name');
                    if ($customSiteName) {
                        $siteName = $customSiteName;
                    }
                    $siteLogo = \App\Models\SiteSetting::get('site_logo');
                }

                if (Schema::hasTable('wishlists')) {
                    $sessionId = session()->getId();
                    $userEmail = session()->get('customer_email');
                    $wQuery = \App\Models\Wishlist::query();
                    if ($userEmail) {
                        $wQuery->where('customer_email', $userEmail)->orWhere('session_id', $sessionId);
                    } else {
                        $wQuery->where('session_id', $sessionId);
                    }
                    $wishlistCount = $wQuery->count();
                }
            } catch (\Exception $e) {
                // fallback
            }

            if (Str::startsWith($favicon, ['http://', 'https://'])) {
                $faviconUrl = $favicon;
            } else {
                $faviconUrl = asset($favicon);
            }

            if ($siteLogo) {
                if (Str::startsWith($siteLogo, ['http://', 'https://'])) {
                    $siteLogoUrl = $siteLogo;
                } else {
                    $siteLogoUrl = asset($siteLogo);
                }
            } else {
                $siteLogoUrl = null;
            }

            $view->with([
                'faviconUrl' => $faviconUrl,
                'siteName' => $siteName,
                'siteLogoUrl' => $siteLogoUrl,
                'wishlistCount' => $wishlistCount,
            ]);
        });

        View::composer('layouts.admin', function ($view) {
            $unreadOrders = collect();
            $unreadMessages = collect();

            try {
                if (Schema::hasTable('orders')) {
                    $unreadOrders = \App\Models\Order::where('is_read', false)
                        ->latest()
                        ->take(10)
                        ->get()
                        ->map(function ($order) {
                            return (object) [
                                'id' => $order->id,
                                'type' => 'order',
                                'title' => 'New Order #' . $order->order_number,
                                'subtitle' => $order->customer_name . ' • ৳' . number_format($order->total_amount, 0),
                                'created_at' => $order->created_at,
                                'read_url' => route('admin.notifications.read', ['type' => 'order', 'id' => $order->id]),
                                'icon' => 'bi-bag-fill',
                                'icon_bg' => 'bg-primary-subtle text-primary',
                            ];
                        });
                }

                if (Schema::hasTable('contact_messages')) {
                    $unreadMessages = \App\Models\ContactMessage::where('is_read', false)
                        ->latest()
                        ->take(10)
                        ->get()
                        ->map(function ($msg) {
                            return (object) [
                                'id' => $msg->id,
                                'type' => 'message',
                                'title' => 'New Message from ' . $msg->name,
                                'subtitle' => Str::limit($msg->subject ?: $msg->message, 35),
                                'created_at' => $msg->created_at,
                                'read_url' => route('admin.notifications.read', ['type' => 'message', 'id' => $msg->id]),
                                'icon' => 'bi-envelope-fill',
                                'icon_bg' => 'bg-success-subtle text-success',
                            ];
                        });
                }
            } catch (\Exception $e) {
                // Ignore fallback
            }

            $notifications = $unreadOrders->concat($unreadMessages)->sortByDesc('created_at')->values();
            $unreadNotificationsCount = $notifications->count();

            $view->with([
                'adminNotifications' => $notifications,
                'unreadNotificationsCount' => $unreadNotificationsCount,
            ]);
        });
    }
}
