<?php

namespace App\Http\Controllers\FrontEnd;

use Exception;
use Midtrans\Snap;
use App\Models\Cart;
use Midtrans\Config;
use App\Models\Product;
use App\Models\category;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TransactionItems;
use App\Http\Controllers\Controller;

class FronEndController extends Controller
{
    public function index() 
    {
        $category = category::select('id', 'name', 'slug')->latest()->get();
        $product = Product::with('product_galleries')->select('id', 'name', 'slug', 'price')->latest()->limit(8)->get();
        

        // dd($product);
        return view('pages.frontend.index', compact(
            'category',
            'product'
        ));
    }

    public function detailProduct($slug)
    {
        $category = category::select('id', 'name', 'slug')->latest()->get();
        $product = Product::with('product_galleries')->where('slug', $slug)->first();
        $recommendation = Product::with('product_galleries')->select('id', 'name', 'slug', 'price')->inrandomOrder(4)->get();
        
        return view('pages.frontend.parent.detail-product', compact(
            'product',
            'category',
            'recommendation'
        ));
    }

    public function detailCategory($slug)
    {
        $category = category::select('id', 'name', 'slug')->latest()->get();
        $categories = category::where('slug', $slug)->first();
        $product = Product::with('product_galleries')->where('category_id', $categories->id )->latest()->get();

        // dd($product);

        return view('pages.frontend.parent.detail-category', compact(
            'categories',
            'category',
            'product'
        ));
    }

    public function cart()
    {
        $category = category::select('id','name', 'slug')->latest()->get();
        $cart = Cart::where('user_id', auth()->user()->id)->latest()->get();

        // dd($cart);
        return view('pages.frontend.cart', compact(
            'category',
            'cart'
        ));
    }

    public function addToCart(Request $request, $id)
    {
        try {
            Cart::create([
                'product_id' => $id,
                'user_id' => auth()->user()->id
            ]);

            // dd($cart);

            return redirect()->route('cart');
            // return redirect()->route('cart')->with('succes', 'Berhasil Menjual');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'terjadi Kesalahan');
        }
    }

    public function deleteCart($id) {
        try {
            Cart::findOrFail($id)->delete();

            return redirect()->route('cart');

        } catch (Exception $e) {
            // dd($e->getMassage())
            return redirect()->back()->with('error', 'terjadi kesalahan');
        }
    }

    public function checkOut(Request $request) {
        try {
            
            //request data
            $data = $request->all();

            // get data cart user
            $cart = Cart::where('user_id', auth()->user()->id)->get();

            //create transaction
            $transaction = Transaction::create([
                'user_id' => auth()->user()->id,
                'name' => $data['name'],
                'slug' => Str::slug($data['name']) . '-' . time(),
                'email' => $data['email'],
                'address' => $data['address'],
                'phone' => $data['phone'],
                'total_price' => $cart->sum('product.price')
            ]);

            // dd($transaction);   

            //create transaction item
            foreach($cart as $item) {
                TransactionItems::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $item->product_id,
                    'transaction_id' => $transaction->id
                ]);
            }

            //delete cart
            Cart::where('user_id', auth()->user()->id)->delete();

            //setting midtrans
            // use Mitrans\Config;
            // use Mitrans\Snap;
            Config::$serverKey = config('services.mitrans.serverKey');
            Config::$clientKey = config('services.mitrans.clinentKey');
            Config::$isProduction = config('services.mitrans.isProduction');
            Config::$isSanitized = config('services.mitrans.isSanitized');
            Config::$is3ds = config('services.mitrans.is3ds');

            // setup varible for midtrans
            $midtrans = [
                'transaction_details' => [
                    'order_id' => 'AD- ' . $transaction->id,
                    'gross_amount' => (int) $transaction->total_price,
                ],
                'costumer_details' => [
                    'first_name' => $transaction->name,
                    'email' => $transaction->email,
                    'phone' => $transaction->phone,
                ],
                'enable_payment' => ['gopay', 'bank_tranfer'],
                'vtweb' => []
            ];

            //create payment url from midtrans
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

            // update payment url
            $transaction->update([
                'payment_url' => $paymentUrl
            ]);

            return redirect($paymentUrl);

        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'terjadi kesalahan');
        }
    }
}
