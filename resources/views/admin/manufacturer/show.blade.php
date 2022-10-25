@extends('layouts.adminHome')
@section('content')
<div>
    <div>
        {{ $manufacturer->title }}
    </div>
    <div>
        <a href="{{ route('admin.manufacturer.edit', $manufacturer->id) }}" class="btn btn-primary">Редактировать</a>
    </div>
    <div>
        <form action="{{ route('admin.manufacturer.delete', $manufacturer->id) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Удалить" class="btn btn-danger">
        </form>
    </div>
    <div>
        <a href="{{ route('admin.manufacturer.index') }}">Назад</a>
    </div>
</div>
@endsection
