<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashbordController extends Controller
{
    public function index() {
        $category = category::count();
        $product = Product::count();
        $user = User::where('role', 'user')->count();
        
        return view('pages.admin.index', compact(
            'category',
            'product',
            'user'
        ));
    }
}
