@extends('layouts.adminHome')
@section('content')

<div class="col-md-12">
    <h3>Товары</h3>
    <a class="btn btn-primary" href="{{ route('product.create') }}">Создать</a>
    <table class="table">
        <tbody>
            <tr>
                <th>#</th>
                <th>Изображение</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Действия</th>
            </tr>
            @php $count = 1 @endphp
            @foreach ($products as $product)
            <tr>
                <td class="col-md-1">{{ $count }}</td>
                <td class="image-wraper"><img src="{{ $product->getFirstMediaUrl('product') }}" alt="" class="image-index"></td>
                <td>{{ $product->title }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <form action="{{ route('product.destroy', $product->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a class="btn btn-success" href="{{ route('product.show', $product->id) }}">Открыть</a>
                            <a class="btn btn-warning" href="{{ route('product.edit', $product->id) }}">Редактировать</a>
                            <input class="btn btn-danger" type="submit" value ="Удалить">
                        </form>
                    </div>
                </td>
            </tr>
            @php $count++ @endphp
            @endforeach
        </tbody>
    </table>
</div>

@endsection
