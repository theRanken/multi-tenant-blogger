<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index(){
        $posts = Post::with('comments')->get();
        return view('tenants.home', compact('posts'));
    }
}
