@extends('layouts.app')

@section('title', 'Lista de Produtos')

@section('content')
    <h1>Produtos</h1>
    <a href="{{ route('products.create') }}" class="btn" style="margin-bottom: 20px;">Novo Produto</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->active ? 'Ativo' : 'Inativo' }}</td>
                    <td>
                        <a href="{{ route('products.show', $product) }}" class="btn">Ver</a>
                        <a href="{{ route('products.edit', $product) }}" class="btn">Editar</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
