@extends('layouts.adminHome')
@section('content')
<div>
    <form action="{{ route('manufacturer.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Производитель</label>
            <input value ="{{ old('title') }}" type="text" name="title" class="form-control" id="title" placeholder="Производитель">
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        <div class="form-group">
            <label for="sort_order">Порядок сортировки</label>
            <input value ="{{ old('sort_order') }}" type="number" name="sort_order" class="form-control" id="sort_order" placeholder="Порядок сортировки">
            @error('sort_order')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
</div>
@endsection
