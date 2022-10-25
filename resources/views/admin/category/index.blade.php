@extends('layouts.adminHome')
@section('content')
<h3>Категории</h3>
<div class="col-md-12">
    <a class="btn btn-primary" href="{{ route('category.create') }}">Создать</a>
    <table class="table">
        <tbody>
            <tr>
                <th>#</th>
                <th>Изображение</th>
                <th>Название</th>
                <th>Действия</th>
            </tr>
            @php $count = 1 @endphp
            @foreach ($categories as $category)
            <tr>
                <td class="col-md-1">{{ $count }}</td>
                <td class="image-wraper"><img src="{{ $category->getFirstMediaUrl('category') }}" alt="" class="image-index"></td>
                <td>{{ $category->title }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <form action="{{ route('category.destroy', $category->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a class="btn btn-success" href="{{ route('category.show', $category->id) }}">Открыть</a>
                            <a class="btn btn-warning" href="{{ route('category.edit', $category->id) }}">Редактировать</a>
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
