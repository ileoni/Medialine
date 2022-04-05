<table class="table table-bordered text-center">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>EMAIL</th>
            <th>TIPO</th>
            <th>ENDEREÇO COMPLETO</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
             <tr>
                 <td>{{$user->id}}</td>
                 <td>{{$user->name}}</td>
                 <td>{{$user->email}}</td>
                 <td>{{$user->type}}</td>
                 @if ($user->address->first())
                     <td>{{ implode(', ', $user->address->first()->only('street', 'number', 'city', 'state')) }}</td>
                 @else
                     <td> - </td>
                 @endif
             </tr>
        @endforeach
    </tbody>
</table>