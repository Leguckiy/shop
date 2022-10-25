@extends('layouts.adminHome')
@section('content')
<div>
    @foreach ($images as $image)
        <img src="{{ $image->getUrl() }}" alt="" class="image-show">
    @endforeach
    <h3>Редактировать товар</h3>
    <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="title">Товар</label>
            <input value ="{{ $product->title }}" type="text" name="title" class="form-control" id="title" placeholder="Товар">
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" class="form-control" id="description" placeholder="Описание">{{ $product->description }}</textarea>
            @error('description')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="manufacturer_id">Производитель</label>
            <select name="manufacturer_id" class="form-control" id="category">
                @foreach ($manufacturers as $manufacturer)
                    <option
                        {{ $product->manufacturer_id == $manufacturer->id ? 'selected' : '' }}
                        value="{{ $manufacturer->id }}">{{ $manufacturer->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="categories">Категории</label>
                @foreach ($categories as $category)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="categories[]" value="{{ $category->id }}"
                    @foreach ($categories_id as $category_id)
                        {{ $category->id == $category_id ? 'checked' : '' }}
                    @endforeach
                    >
                        {{ $category->title }}
                </div>
                @endforeach
        </div>
        <div class="form-group">
            <label for="quantity">Количество</label>
            <input value ="{{ $product->quantity }}" type="number" name="quantity" class="form-control" id="quantity" placeholder="Количество">
            @error('quantity')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Цена</label>
            <input value ="{{ $product->price }}" type="number" name="price" class="form-control" id="price" placeholder="Цена">
            @error('price')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="sort_order">Порядок сортировки</label>
            <input value ="{{ $product->sort_order }}" type="number" name="sort_order" class="form-control" id="sort_order" placeholder="Порядок сортировки">
            @error('sort_order')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="status">Статус</label>
            <select name="status" class="form-control" id="status">
                <option
                {{ $product->status == 1 ? 'selected' : '' }}
                value="1">Включено
                </option>
                <option
                {{ $product->status == 0 ? 'selected' : '' }}
                value="0">Отключено
                </option>
            </select>
        </div>
        {{-- <div class="form-group">
            <label for="image">Загрузите изображение</label>
            <input type="file" name="image" class="form-control" id="image">

            @foreach ($images as $image)
                <img src="{{ $image->getUrl() }}" alt="" class="image-show">
            @endforeach

            @error('image')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div> --}}

        <div id="form-images" class="border border-secondary">
            @foreach ($images as $image)
                <div class="form-group border mt-2 mb-2">
                    <label for="image">Загрузите изображение</label>
                    <input type="file" name="image[]">
                    <button type="button" class="btn btn-danger delete-image">-</button>
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            @endforeach
            <button type="button" id="add-image" class="btn btn-primary mb-2">+</button>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
    <a href="{{ route('product.index') }}">Назад</a>
</div>
<script src="/js/actions-buttons.js"></script>

@endsection
