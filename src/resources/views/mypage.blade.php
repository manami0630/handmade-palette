@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}" />
@endsection

@section('content')
<div class="all-contents">
    <div class="left-contents">
        <div class="list_btn">
            <a class="list__btn" href="/">作品一覧はこちら</a>
        </div>
        <h1 class="left-title">{{ $user->name }}</h1>
        <form action="/mypage" method="get">
            <input type="text" name="keyword" class="keyword" placeholder="作品名で検索" value="{{ request('keyword') }}">
            @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            <button type="submit" class="submit-button">検索</button>
        </form>
        <div class="categories">
            <p class="categories-name">カテゴリーで検索</p>
            <div class="category-name">
                <a href="{{ url('/mypage') }}" class="category-link {{ !request('category') && !request('favorite') ? 'active' : '' }}">すべて</a>
            </div>
            <div class="category-name">
                <a href="{{ url('/mypage?favorite=1') }}" class="category-link {{ request('favorite') == 1 ? 'active' : '' }}">お気に入り</a>
            </div>
            @foreach($categories as $category)
                <div class="category-name">
                    <a href="{{ url('/mypage?category=' . $category->id) }}" class="category-link {{ request('category') == $category->id ? 'active' : '' }}">{{ $category->name }}</a>
                </div>
            @endforeach
        </div>
        <div class="add_button">
            <a href="/post" class="add-button"><span>+</span>作品を追加</a>
        </div>
    </div>
    <div class="right-contents">
        <div class="product-contents">
            @foreach ($products as $product)
                <div class="product-content">
                    <a href="/products/{{$product->id}}" class="product-link">
                        <img id="image-preview" src="{{ asset('storage/' . $product->image) }}">
                        <div class="product-name">
                            <p>{{$product->title}}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="pagination-content">
            {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection