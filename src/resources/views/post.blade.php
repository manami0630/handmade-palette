@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/post.css') }}" />
@endsection

@section('content')
<div class="heading">
    <h2>投稿する作品</h2>
</div>
<form class="form" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
@csrf
    <div class="contents">
        <div class="left-contents">
            <label class="form__label">作品画像</label>
            <button type="button" id="upload-button" class="file-btn">画像を選択する</button>
            <div class="form__error">
                @error('image')
                    {{ $message }}
                @enderror
            </div>
            <div class="form__img">
                <img id="image-preview" src="">
                <input type="file" id="upload-image" class="image" name="image" accept="image/*" style="display: none;">
            </div>
        </div>
        <div class="right-contents">
            <div class="form__group">
                <label class="form__label">作品名</label>
                <input class="form__text" type="text" name="title" value="{{ old('title') }}">
                <div class="form__error">
                    @error('title')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group">
                <label class="form__label">説明</label>
                <input class="form__text" type="text" name="explanation" value="{{ old('explanation') }}">
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
                            <input type="radio" name="category_id" value="{{ $category->id }}" id="category_{{ $category->id }}" {{ old('category_id') == $category->id ? 'checked' : '' }}>
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
                <input class="post-form__btn" type="submit" value="投稿する">
            </div>
        </div>
    </div>
</form>
<script>
    document.getElementById('upload-button').addEventListener('click', function() {
        document.getElementById('upload-image').click();
    });

    document.getElementById('upload-image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('image-preview').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection