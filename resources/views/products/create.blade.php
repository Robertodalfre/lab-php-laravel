@extends('layouts.app')

@section('title', 'Novo Produto')

@section('content')
    <h1>Novo Produto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nome do Produto</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea name="description" id="description" rows="3">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Preço</label>
            <input type="number" name="price" id="price" value="{{ old('price') }}" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="stock">Estoque</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock', 0) }}" required>
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="active" value="1" {{ old('active', true) ? 'checked' : '' }}>
                Produto Ativo
            </label>
        </div>

        <button type="submit" class="btn">Salvar Produto</button>
        <a href="{{ route('products.index') }}" class="btn" style="background: #6c757d;">Cancelar</a>
    </form>
@endsection
