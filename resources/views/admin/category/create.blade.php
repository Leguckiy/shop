@extends('layouts.adminHome')
@section('content')
<div>
    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Категория</label>
            <input value ="{{ old('title') }}" type="text" name="title" class="form-control" id="title" placeholder="Категория">
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
            <label for="parent_id">Родительская категория</label>
            <input value ="{{ old('parent_id') }}" type="number" name="parent_id" class="form-control" id="parent_id" placeholder="Родительская категория">
            @error('parent_id')
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
            @error('status')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Загрузите изображение</label>
            <input value ="{{ old('image') }}" type="file" name="image" class="form-control" id="image">
            @error('image')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
</div>
@endsection
