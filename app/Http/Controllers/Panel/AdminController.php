<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users_count = User::count();
        $products_count = Product::count();
        $comments_count = Comment::count(); 
        $orders_count = Order::count();
        return \view('panel.index' , compact(['users_count' , 'products_count' , 'comments_count' , 'orders_count']));
    }
}