<div>
    <label for="name">Nome</label>
    <div><input name="name" type="text" value="{{isset($product) ? $product->name : ""}}"></div>
</div>
<div>
    <label for="description">Descrição do produto:</label>
    <div><input name="description" type="text" value="{{isset($product) ? $product->description: ""}}"></div>
</div>
<div>
    <label for="image">Imagem</label>
    <div><input name="image" type="file"></div>
</div>
<div>
    <label for="price">Preço</label>
    <div><input name="price" type="text" value="{{isset($product) ? $product->price: ""}}"></div>
</div>
<div>
    <label for="amount">Quantidade</label>
    <div><input name="amount" type="text" value="{{isset($product) ? $product->amount: ""}}"></div>
</div>