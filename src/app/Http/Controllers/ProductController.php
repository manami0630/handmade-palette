<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests\DetailRequest;
use App\Models\Product;
use App\Models\Like;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = DB::table('categories')->get();

        $keyword = $request->input('keyword');

        $categoryId = $request->input('category');

        $products = Product::when($keyword, function ($query) use ($keyword){
            return $query->where('title', 'like', "%{$keyword}%");
        })->when($categoryId, function ($query) use ($categoryId){
            return $query->where('category_id', $categoryId);
        })->paginate(8);

        return view('list', compact('products', 'keyword', 'categoryId', 'categories'));
    }

    public function post()
    {
        $categories = DB::table('categories')->get();

        return view('post', compact('categories'));
    }

    public function detail($id)
    {
        $product = Product::findOrFail($id);

        $categories = DB::table('categories')->get();

        $likesCount = $product->likes()->count();

        $comments = $product->comments()->with('user')->latest()->get();

        $likedItems = [];

        if (auth()->check()) {
            $likedItems = auth()->user()->likes()->pluck('product_id')->toArray();
        }

        return view('detail', compact('product','categories', 'likesCount', 'comments', 'likedItems'));
    }

    public function mypage(Request $request)
    {
        $user = auth()->user();

        $categories = DB::table('categories')->get();

        $keyword = $request->input('keyword');

        $categoryId = $request->input('category');

        $favoriteOnly = $request->input('favorite');

        $products = Product::when($favoriteOnly, function ($query) use ($user) {
            $likedProductIds = Like::where('user_id', $user->id)->pluck('product_id');
            return $query->whereIn('id', $likedProductIds);
        }, function ($query) use ($user) {
            return $query->where('user_id', $user->id);
        }) ->when($keyword, function ($query) use ($keyword) {
            return $query->where('title', 'like', "%{$keyword}%");
        }) ->when($categoryId, function ($query) use ($categoryId) {
            return $query->where('category_id', $categoryId);
        }) ->paginate(8);

        return view('mypage', compact('products', 'keyword', 'categoryId', 'categories','user'));
    }

    public function store(PostRequest $request)
    {
        $validated = $request->validated();

        $categories = DB::table('categories')->get();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/uploads');
            $image_path = str_replace('public/', '', $path);
        }

        $categoryIds = $request->input('categories', []);

        $product = new Product();
        $product->title = $validated['title'];
        $product->image = $image_path;
        $product->explanation = $validated['explanation'];
        $product->category_id = $request->category_id;
        $product->user_id = auth()->id();
        $product->save();

        if (!empty($categoryIds)) {
            $product->categories()->sync($categoryIds);
        }

        if ($request->has('back')) {
            return redirect('/')->withInput();
        }

        return redirect('/mypage');
    }

    public function update(DetailRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($product->image && Storage::exists('public/img/' . $product->image)) {
                Storage::delete('public/img/' . $product->image);
            } $imagePath = $request->file('image')->store('public/img');
            $validated['image'] = basename($imagePath);
        } $product->update($validated);

        return redirect('/');
    }

    public function destroy(Request $request)
    {
        Product::find($request->id)->delete();

        return redirect('/');
    }
}