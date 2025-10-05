<?php
 

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
 

use Illuminate\Http\Request;

class AdminController extends Controller
{
     protected $userData;
protected $user;
public function __construct()
{
    $this->middleware(function ($request, $next) {
        $this->user = Auth::user();

        $this->userData = [
            'email' => $this->user->email,
            'ruoli' => $this->user->getRoleNames()->toArray(),
            'è_admin' => $this->user->hasRole('administrator'),
        ];

        return $next($request);
    });
}
  
   public function index()
{
   
$response=response()->json($this->userData);
 
$view=view('admin.index', ['user' => $this->user , 'response' => $response]);
  return $view;

}
public function api()
    {
        return response()->json($this->userData);
    }
 
}