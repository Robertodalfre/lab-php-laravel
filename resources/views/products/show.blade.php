@extends('layouts.app')

@section('title', 'Detalhes do Produto')

@section('content')
    <h1>{{ $product->name }}</h1>

    <div style="background: #f8f9fa; padding: 20px; border-radius: 4px; margin-bottom: 20px;">
        <p><strong>ID:</strong> {{ $product->id }}</p>
        <p><strong>Descrição:</strong> {{ $product->description ?: 'Sem descrição' }}</p>
        <p><strong>Preço:</strong> R$ {{ number_format($product->price, 2, ',', '.') }}</p>
        <p><strong>Estoque:</strong> {{ $product->stock }}</p>
        <p><strong>Status:</strong> {{ $product->active ? 'Ativo' : 'Inativo' }}</p>
        <p><strong>Criado em:</strong> {{ $product->created_at->format('d/m/Y H:i:s') }}</p>
        <p><strong>Última atualização:</strong> {{ $product->updated_at->format('d/m/Y H:i:s') }}</p>
    </div>

    <a href="{{ route('products.edit', $product) }}" class="btn">Editar</a>
    <a href="{{ route('products.index') }}" class="btn" style="background: #6c757d;">Voltar</a>
    
    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</button>
    </form>
@endsection
