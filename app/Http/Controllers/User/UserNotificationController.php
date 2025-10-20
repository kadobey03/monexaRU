<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserNotificationController extends Controller
{
    protected $notificationService;

    /**
     * Create a new controller instance.
     *
     * @param NotificationService $notificationService
     */
    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    /**
     * Show user's notifications
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $notifications = Notification::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(15);
            $title = 'Уведомления';

        return view('user.notifications.index', [
            'notifications' => $notifications,
            'title' => $title
        ]);
    }

    /**
     * Mark notification as read
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function markAsRead(Request $request)
    {
        $request->validate([
            'notification_id' => 'required|integer|exists:notifications,id'
        ]);

        $notification = Notification::find($request->notification_id);

        if (!$notification || $notification->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Уведомление не найдено или нет доступа.');
        }

        $this->notificationService->markAsRead($request->notification_id);

        return redirect()->back()->with('success', 'Уведомление отмечено как прочитанное.');
    }

    /**
     * Mark all notifications as read
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function markAllAsRead()
    {
        $count = $this->notificationService->markAllAsReadForUser(Auth::id());

        return redirect()->back()->with('success', "{$count} уведомлений отмечено как прочитанных.");
    }

    /**
     * Delete notification
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {
        $request->validate([
            'notification_id' => 'required|integer|exists:notifications,id'
        ]);

        $notification = Notification::find($request->notification_id);

        if (!$notification || $notification->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Уведомление не найдено или нет доступа.');
        }

        $this->notificationService->deleteNotification($request->notification_id);

        return redirect()->back()->with('success', 'Уведомление удалено.');
    }

    /**
     * Web route version of markAsRead for form submissions
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function webMarkAsRead(Request $request)
    {
        $request->validate([
            'notification_id' => 'required|integer|exists:notifications,id'
        ]);

        $notification = Notification::find($request->notification_id);

        if (!$notification || $notification->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Уведомление не найдено или нет доступа.');
        }

        $this->notificationService->markAsRead($request->notification_id);

        return redirect()->back()->with('success', 'Уведомление отмечено как прочитанное.');
    }

    /**
     * Web route version of deleteNotification for form submissions
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function webDeleteNotification(Request $request)
    {
        $request->validate([
            'notification_id' => 'required|integer|exists:notifications,id'
        ]);

        $notification = Notification::find($request->notification_id);

        if (!$notification || $notification->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Уведомление не найдено или нет доступа.');
        }

        $this->notificationService->deleteNotification($request->notification_id);

        return redirect()->route('notifications')->with('success', 'Уведомление успешно удалено.');
    }

    /**
     * Get unread notifications count
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUnreadCount()
    {
        $count = $this->notificationService->countUnreadForUser(Auth::id());

        return response()->json([
            'unread_count' => $count
        ]);
    }

    /**
     * Display the specified notification
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        $notification = Notification::findOrFail($id);
        $title = 'Детали уведомления';

        // Check if the notification belongs to the authenticated user
        if ($notification->user_id != Auth::id()) {
            return redirect()->route('notifications')->with('error', 'Нет доступа к этому уведомлению.');
        }

        return view('user.notifications.show', compact('notification', 'title'));
    }
}
