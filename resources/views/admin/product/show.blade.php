@extends('layouts.adminHome')
@section('content')
<div class="col-md-6">
    <h3>Товар</h3>
    <h4>Фото</h4>
    @foreach ($images as $image)
        <img src="{{ $image->getUrl() }}" alt="" class="image-show">
    @endforeach
    <table class="table">
        <tbody>
            <tr>
                <th>Поле</th>
                <th>Значение</th>
            </tr>
            <tr>
                <td>Id</td>
                <td>{{ $product->id }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $product->title }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <td>Категории</td>
                <td>
                    @foreach ($categories as $category)
                        <p>{{ $category->title }}</p>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>Цена</td>
                <td>{{ $product->price }}</td>
            </tr>
            <tr>
                <td>Количество</td>
                <td>{{ $product->quantity }}</td>
            </tr>
            <tr>
                <td>Порядок сортировки</td>
                <td>{{ $product->sort_order }}</td>
            </tr>
            <tr>
                <td>Статус</td>
                <td>{{ $product->status }}</td>
            </tr>
        </tbody>
    </table>
    <a class="btn btn-warning" href="{{ route('product.edit', $product->id) }}">Редактировать</a>
</div>
@endsection
