@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
<div class="details__heading">
    <a class="details__link" href="/">作品一覧</a> > {{ $product->title }}
</div>
<div class="contents">
    <form class="form" action="/products/{{$product->id}}/update" method="post" enctype="multipart/form-data">
    @csrf
        @method('PATCH')
        <div class="left-contents">
            <label class="form__label">作品画像</label>
            <button type="button" id="upload-button" class="file-btn">画像を選択する</button>
            <div class="form__error">
                @error('image')
                    {{ $message }}
                @enderror
            </div>
            <div class="form__img">
                <img id="image-preview" src="{{ asset('storage/'.$product->image) }}">
                <input type="file" id="upload-image" class="image" name="image" accept="image/*" style="display: none;">
            </div>
        </div>
        <div class="center-contents">
            <div class="form__group">
                <label class="form__label">作品名</label>
                <input class="form__text" type="text" name="title"  value="{{ $product->title }}">
                <div class="form__error">
                    @error('title')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group">
                <label class="form__label">説明</label>
                <input class="form__text" type="text" name="explanation" value="{{ $product->explanation }}">
                <div class="form__error">
                    @error('explanation')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group">
                <label class="form__label">カテゴリー</label>
                <div class="categories">
                    @foreach ($categories as $category)
                        <div class="category-item">
                            <input type="radio" name="category_id" value="{{ $category->id }}" id="category_{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'checked' : '' }}>
                            <label for="category_{{ $category->id }}" class="category-label">{{ $category->name }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="form__error">
                    @error('category_id')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group">
                <p class="created_at">投稿日  {{ $product->created_at->format('Y / m / d') }}</p>
            </div>
            <div class="form__button">
                <a class="details__back-btn" href="/">戻る</a>
                @if (auth()->check() && auth()->id() === $product->user_id)
                    <button class="form__button-submit" type="submit">変更を保存</button>
                @endif
            </div>
        </div>
    </form>
    <div class="right-contents">
        <div class="form_group">
            <i class="fa fa-star-o like-icon" data-product-id="{{ $product->id }}" data-auth="{{ auth()->check() ? 'auth' : 'guest' }}"></i>
            <i class="fa fa-comment-o"></i>
        </div>
        <div class="count">
            <div class="count__star"  id="like-count-{{ $product->id }}">
                {{ $likesCount ?? '' }}
            </div>
            <div class="count__topic">
                {{ $comments->count() }}
            </div>
        </div>
        <div class="comments">
            @if(isset($comments) && $comments->count())
                <div class="comments__count">コメント({{ $comments->count() }})</div>
                <div class="comments__list-scroll">
                    @foreach($comments as $comment)
                        <div class="comment">
                            <strong>{{ $comment->user->name }}</strong>
                            <p>{{ $comment->content }}</p>
                        </div>
                    @endforeach
                </div>
            @else
                <p>まだコメントはありません。</p>
            @endif
        </div>
        @if(auth()->check())
            <form class="comment-form" action="{{ route('comments.store') }}" method="post">
            @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <div class="form__group-comment">
                    <label class="comment_label">作品へのコメント</label>
                    <textarea name="content" id="" cols="30" rows="7">{{ old('content') }}</textarea>
                </div>
                <div class="form__error">
                    @error('content')
                        {{ $message }}
                    @enderror
                </div>
                <div class="form__group-comment">
                    <input class="form__btn" type="submit" value="コメントを送信する">
                </div>
            </form>
        @else
            <div class="form__group-comment">
                <label class="comment_label">作品へのコメント</label>
                <textarea name="content" id="" cols="30" rows="7">{{ old('content') }}</textarea>
            </div>
            <div class="form__group-comment">
                <form action="{{ route('login') }}" method="get">
                    <input class="form__btn" type="submit" value="コメントを送信する" />
                </form>
            </div>
        @endif
    </div>
</div>
<form action="{{ route('products.destroy', ['id' => $product->id]) }}" method="post" style="display:inline;">
@csrf
    @method('DELETE')
    <div class="form__delete">
        @if (auth()->check() && auth()->id() === $product->user_id)
            <button class="form__button-delete" type="submit">削除</button>
        @endif
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // 画像アップロード
        const uploadButton = document.getElementById('upload-button');
        const uploadInput = document.getElementById('upload-image');
        const previewImage = document.getElementById('image-preview');

        if (uploadButton && uploadInput && previewImage) {
            uploadButton.addEventListener('click', function () {
                uploadInput.click();
            });

            uploadInput.addEventListener('change', function (e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        previewImage.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        // いいね機能
        const likedItems = @json($likedItems).map(String);

        $('.like-icon').each(function () {
            const icon = $(this);
            const productId = String(icon.data('product-id'));
            const authStatus = icon.data('auth');

            if (authStatus === 'guest') {
                icon.on('click', function (e) {
                    e.preventDefault();
                    window.location.href = '{{ route("login") }}';
                });
                return;
            }

            if (likedItems.includes(productId)) {
                icon.removeClass('fa-star-o').addClass('fa-star');
            } else {
                icon.removeClass('fa-star').addClass('fa-star-o');
            }
        });

        $(document).on('click', '.like-icon', function () {
            const icon = $(this);
            const productId = String(icon.data('product-id'));

            $.ajax({
                url: '{{ route("likes.toggle") }}',
                method: 'POST',
                data: {
                    product_id: productId,
                    _token: '{{ csrf_token() }}'
                },
                success: function (res) {
                    if (res.liked) {
                        icon.removeClass('fa-star-o').addClass('fa-star');
                    } else {
                        icon.removeClass('fa-star').addClass('fa-star-o');
                    }

                    if (icon.data('auth') === 'auth') {
                        location.reload();
                    }
                }
            });
        });
    });
</script>
@endsection