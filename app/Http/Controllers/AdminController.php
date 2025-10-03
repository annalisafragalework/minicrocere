<?php
 

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
 

use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function index()
{
    $user = Auth::user();
$response=response()->json([
    'email' => $user->email,
    'ruoli' => $user->getRoleNames(), // array di ruoli
    'è_admin' => $user->hasRole('administrator'),
]);

$view=view('admin.index', ['user' => $user, 'response' => $response]);
  return $view;

}
}