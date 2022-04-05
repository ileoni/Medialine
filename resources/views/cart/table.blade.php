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
        @forelse ($cart as $item)
            <tr>
                <td class="align-middle">
                    @if (!$item['path'])
                        {{$loop->index}}
                    @else
                        <img src="{{'/images/thumbnail/'.$item['path']}}" alt="">
                    @endif
                </td>
                <td class="align-middle">
                    {{$item["name"]}}
                </td>
                <td class="align-middle">
                    {{$item["description"]}}
                </td>
                <td class="align-middle">
                    {{$item["price"]}}
                </td>
                <td class="align-middle">
                    {{$item["amount"]}}
                </td>
                <td class="align-middle">
                    <a 
                        class="text-dark"
                        data-toggle="tooltip"
                        data-placement="right"
                        title="Remover" 
                        href="{{route('destroy.item', ['indice' => $loop->index])}}"
                    >
                        <i class="bi bi-trash2" style="font-size: 1.5em"></i>
                    </a>
                </td>
            </tr>
        @empty
            <td colspan=100%>
                Não há itens no carrinho.
            </td>
        @endforelse
    </tbody>
</table>
