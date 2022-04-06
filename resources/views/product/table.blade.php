<table class="table table-white shadow-sm text-center">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>DESCRIÇÃO</th>
            <th>QUANTIDADE</th>
            <th>AÇÕES</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->amount}}</td>
                <td class="row justify-content-center">
                    <a class="btn" title="Editar" href="{{ route('product.edit', ['id' => $product->id]) }}">
                        <i class="bi bi-pencil-fill text-dark"></i>
                    </a>
                    <form action="{{ route('product.destroy', ['id' => $product->id]) }}" method="post">
                        <button class="btn" title="Excluir" type="submit"><i class="bi bi-trash2-fill text-dark"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>