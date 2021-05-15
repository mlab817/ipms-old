<?php

namespace App\Http\Controllers;

use App\DataTables\NotificationsDataTable;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(NotificationsDataTable $dataTable)
    {
        return $dataTable->render('notifications.index');
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show($notificationId)
    {
        $notification = auth()->user()->notifications()->where('id', $notificationId)->first();

        if ($notification) {
            $notification->markAsRead();

            if (! isset($notification->data['actionUrl'])) {
                return back();
            }

            return redirect($notification->data['actionUrl']);
        }

        return back();
    }
}
