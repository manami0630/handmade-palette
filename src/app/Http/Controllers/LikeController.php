<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Product;

class LikeController extends Controller
{
    public function toggle(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $productId = $request->input('product_id');

        $like = Like::where('user_id', $user->id)->where('product_id', $productId)->first();

        if ($like) {
            $like->delete();
            return response()->json(['liked' => false]);
        } else {
            Like::create([
                'user_id' => $user->id,
                'product_id' => $productId,
            ]);
            return response()->json(['liked' => true]);
        }
    }

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);$likesCount = $product->likes()->count();
        return view('detail', compact('product', 'likesCount'));
    }
}