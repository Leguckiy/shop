@extends('layouts.adminHome')
@section('content')
<div>
    <h1>Создать товар</h1>
    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Товар</label>
            <input value ="{{ old('title') }}" type="text" name="title" class="form-control" id="title" placeholder="Товар">
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" class="form-control" id="description" placeholder="Описание">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="manufacturer_id">Производитель</label>
            <select name="manufacturer_id" class="form-control" id="manufacturer_id">
                @foreach ($manufacturers as $manufacturer)
                    <option
                        {{ old('manufacturer_id') == $manufacturer->id ? 'selected' : '' }}
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
                        {{ is_array(old('categories')) && in_array($category->id, old('categories')) ? 'checked' : '' }}>
                        {{ $category->title }}
                </div>
                @endforeach
        </div>
        <div class="form-group">
            <label for="quantity">Количество</label>
            <input value ="{{ old('quantity') }}" type="number" name="quantity" class="form-control" id="quantity" placeholder="Количество">
            @error('quantity')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Цена</label>
            <input value ="{{ old('price') }}" type="number" name="price" class="form-control" id="price" placeholder="Цена">
            @error('price')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="sort_order">Порядок сортировки</label>
            <input value ="{{ old('sort_order') }}" type="number" name="sort_order" class="form-control" id="sort_order" placeholder="Порядок сортировки">
            @error('sort_order')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="status">Статус</label>
            <select name="status" class="form-control" id="status">
                <option
                {{-- {{ old('status') == 1 ? 'selected' : '' }} --}}
                value="1">Включено
                </option>
                <option
                {{-- {{ old('status') == 0 ? 'selected' : '' }} --}}
                value="0">Отключено
                </option>
            </select>
        </div>
            <div id="form-images" class="border border-secondary">
                <div class="form-group border mt-2 mb-2">
                    <label for="image">Загрузите изображение</label>
                    <input type="file" name="image[]">
                    <button type="button" class="btn btn-danger delete-image">-</button>
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="button" id="add-image" class="btn btn-primary mb-2">+</button>
            </div>
        <button type="submit" class="btn btn-primary mt-2">Создать</button>
    </form>
</div>

<script src="/js/actions-buttons.js"></script>
@endsection

