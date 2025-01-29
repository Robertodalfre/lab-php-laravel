@extends('layouts.app')

@section('title', 'Editar Produto')

@section('content')
    <h1>Editar Produto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Nome do Produto</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea name="description" id="description" rows="3">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Preço</label>
            <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="stock">Estoque</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" required>
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="active" value="1" {{ old('active', $product->active) ? 'checked' : '' }}>
                Produto Ativo
            </label>
        </div>

        <button type="submit" class="btn">Atualizar Produto</button>
        <a href="{{ route('products.index') }}" class="btn" style="background: #6c757d;">Cancelar</a>
    </form>
@endsection
