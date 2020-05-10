@include('admin.includes.alert')

@csrf

<div class="form-group">
    <Label>Nome:</label>
    <input type="text" value="{{$plan->name ?? old(name)}}" name="name" class="form-control" placeholder="Nome">
</div>
<div class="form-group">
    <Label>Preço:</label>
    <input type="text" value="{{$plan->price ?? old(price)}}" name="price" class="form-control" placeholder="Preço">
</div>
<div class="form-group">
    <Label>Descrição:</label>
    <input type="text" value="{{$plan->description ?? old(description)}}" name="description" class="form-control" placeholder="Descrição">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Salvar</button>
</div>
