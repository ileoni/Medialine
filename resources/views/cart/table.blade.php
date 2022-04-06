<table class="table table-white shadow-sm text-center">
    <thead class="thead-dark">
        <tr>
            <th></th>
            <th>NOME</th>
            <th>DESCRIÇÃO</th>
            <th>PREÇO</th>
            <th>QUANTIDADE</th>
            <th>AÇÃO</th>
        </tr>
    </thead>
    <tbody>
        @foreach (Auth::user()->order_items as $orderItems)
            <tr>
                <td class="align-middle">
                    <img src="/{{$orderItems->products['images'][0]['thumbnail']}}" alt="{{$orderItems->products['name']}}">
                </td>
                <td class="align-middle">
                    {{$orderItems->products['name']}}
                </td>
                <td class="align-middle">
                    {{$orderItems->products['description']}}
                </td>
                <td class="align-middle">
                    {{$orderItems->products['price']}}
                </td>
                <td class="align-middle">
                    {{$orderItems->products['amount']}}
                </td>
                <td class="align-middle">
                    <a 
                        class="text-dark"
                        data-toggle="tooltip"
                        data-placement="right"
                        title="Remover" 
                        href="{{route('destroy.item', ['id' => $orderItems->id])}}"
                    >
                        <i class="bi bi-trash2" style="font-size: 1.5em"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
