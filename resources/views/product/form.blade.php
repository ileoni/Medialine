<div class="form-group row row-cols-2">
    <label class="col-form-label" for="name">Nome</label>
    <div class="col-sm-6">
        <input class="form-control" name="name" type="text" value="{{isset($product) ? $product->name : ""}}">
    </div>
</div>
<div class="form-group row row-cols-2">
    <label class="col-form-label" for="description">Descrição do produto:</label>
    <div class="col-sm-6">
        <input  class="form-control" name="description" type="text" value="{{isset($product) ? $product->description: ""}}">
    </div>
</div>
<div class="form-group row row-cols-2">
    <label class="col-form-label" for="price">Preço</label>
    <div class="col-sm-6">
        <input class="form-control" name="price" type="text" value="{{isset($product) ? $product->price: ""}}">
    </div>
</div>
<div class="form-group row row-cols-2">
    <label class="col-form-label" for="amount">Quantidade</label>
    <div class="col-sm-6">
        <input class="form-control" name="amount" type="text" value="{{isset($product) ? $product->amount: ""}}">
    </div>
</div>
<div class="d-flex justify-content-end">
    <div class="input-group col-8 col-sm-8">
        <div class="custom-file">
          <input name="image" type="file" class="custom-file-input" id="image">
          <label class="custom-file-label" for="image">escolher image</label>
        </div>
        <div class="input-group-append">
          <span class="input-group-text">Upload</span>
        </div>
    </div>
</div>
