<?php

namespace App\Http\Controllers;

use App\Mail\ProductEnquiry;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load('images');
        return view('product.show', compact('product'));
    }

    public function enquiry(Request $request, Product $product)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'message' => 'required|string|max:1000',
        ]);

        Mail::to('haleem@gmail.com')
            ->send(new ProductEnquiry(
                $product,
                $request->name,
                $request->email,
                $request->message,
            ));

        return back()->with('success', 'Your enquiry has been sent!');
    }
}
