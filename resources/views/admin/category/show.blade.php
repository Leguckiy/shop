@extends('layouts.adminHome')
@section('content')
<div class="col-md-6">
    <a href="{{ route('category.index') }}">Назад</a>
    <h3>Категория</h3>
    <img src="{{ $category->getFirstMediaUrl('category') }}" alt="" class="image-show">
    <table class="table">
        <tbody>
            <tr>
                <th>Поле</th>
                <th>Значение</th>
            </tr>
            <tr>
                <td>Id</td>
                <td>{{ $category->id }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $category->title }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $category->description }}</td>
            </tr>
            <tr>
                <td>Порядок сортировки</td>
                <td>{{ $category->sort_order }}</td>
            </tr>
            <tr>
                <td>Статус</td>
                <td>{{ $category->status }}</td>
            </tr>
        </tbody>
    </table>
    <a class="btn btn-warning" href="{{ route('category.edit', $category->id) }}">Редактировать</a>
</div>
@endsection
