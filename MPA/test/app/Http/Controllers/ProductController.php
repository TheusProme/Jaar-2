<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Product;
use Egulias\EmailValidator\Warning\ObsoleteDTEXT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // Gets all products
    public function show()
    {
        $products = \DB::table('products')->get();

        return view('products', [
            'products' => $products
        ]);
    }

    // Gets product with categories
    public function showProducts($id)
    {
        $products = \DB::table('products AS p')
            ->where('p.id', $id)
            ->select('p.id', 'p.title', 'p.description', 'p.price', 'p.quantity')
            ->get();

        $categories = \DB::table('categories AS c')
            ->join('category_product', 'category_id', '=', 'c.id')
            ->select('c.id', 'c.title')
            ->where('category_product.product_id', $id)
            ->get();

        return view('showProduct', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    // Add the product to the cart
    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);

        return redirect()->back();
    }

    // Remove one item
    public function getReduceByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceOne($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('product.shoppingCart');
    }
// Remove all items
    public function getRemoveItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('product.shoppingCart');
    }

    // Increase by one item
    public function getIncreaseByOne(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);

        return redirect()->back();
    }

    // Gets data from current cart
    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    // If cart isn't null then give that data to the site and show it
    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout', ['total' => $total]);
    }

    // If form is filled in then show success
    public function postCheckout(Request $request)
    {
        if (!Session::has('cart')) {
            return redirect()->route('shop.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $order = new Order();
        $order->cart = serialize($cart);
        $order->address = $request->input('address');
        $order->name = $request->input('firstName');

        // dd($cart->items[1]['item']->id);

        Auth::user()->orders()->save($order);

        Session::forget('cart');
        return redirect()->route('home.products')->with('success', 'Successfully purchased products!');
    }
}