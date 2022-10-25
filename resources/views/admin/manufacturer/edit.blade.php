@extends('layouts.adminHome')
@section('content')
<div>
    <form action="{{ route('manufacturer.update', $manufacturer->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="title">Производитель</label>
            <input value ="{{ $manufacturer->title }}" type="text" name="title" class="form-control"
                id="title" placeholder="Производитель">
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="sort_order">Порядок сортировки</label>
            <input value ="{{ $manufacturer->sort_order }}" type="number" name="sort_order" class="form-control"
                id="sort_order" placeholder="Порядок сортировки">
            @error('sort_order')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Изменить</button>
    </form>
    <a href="{{ route('manufacturer.index') }}">Назад</a>
</div>
@endsection
