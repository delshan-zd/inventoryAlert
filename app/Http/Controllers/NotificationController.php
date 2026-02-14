<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
  public function index(){

  $notifications =Notification::latest()
      ->take(10)
      ->get();

      return response()->json($notifications);

  }
}
