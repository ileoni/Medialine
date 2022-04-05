<table class="table table-white shadow-sm text-center">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>DESCRIÇÃO</th>
            <th>CAMINHO DA IMAGEM</th>
            <th>QUANTIDADE</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->path}}</td>
                <td>{{$product->amount}}</td>
            </tr>
        @endforeach
    </tbody>
</table>