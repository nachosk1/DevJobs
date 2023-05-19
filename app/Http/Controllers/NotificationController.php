<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $notification = auth()->user()->unreadNotifications;

        // Limpiar notificaiones
        auth()->user()->unreadNotifications->markAsRead();

        return view('notification.index', [
            'notification' => $notification
        ]);
    }
}
