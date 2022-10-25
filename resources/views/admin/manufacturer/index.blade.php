@extends('layouts.adminHome')
@section('content')
<h3>Категории</h3>
<div class="col-md-12">
    <a class="btn btn-primary" href="{{ route('manufacturer.create') }}">Создать</a>
    <table class="table">
        <tbody>
            <tr>
                <th>#</th>
                <th>Название</th>
                <th>Действия</th>
            </tr>
            @php $count = 1 @endphp
            @foreach ($manufacturers as $manufacturer)
            <tr>
                <td class="col-md-1">{{ $count }}</td>
                <td>{{ $manufacturer->title }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <form action="{{ route('manufacturer.destroy', $manufacturer->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a class="btn btn-success" href="{{ route('manufacturer.show', $manufacturer->id) }}">Открыть</a>
                            <a class="btn btn-warning" href="{{ route('manufacturer.edit', $manufacturer->id) }}">Редактировать</a>
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
