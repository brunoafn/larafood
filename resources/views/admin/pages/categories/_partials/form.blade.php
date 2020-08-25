@include('admin.includes.alert')

@csrf

<div class="form-group">
    <Label>Nome:</label>
    <input type="text" value="{{$category->name ?? old(name)}}" name="name" class="form-control" placeholder="Nome">
</div>
<div class="form-group">
    <Label>URL:</label>
    <input type="text" value="{{$category->url ?? old(url)}}" name="url" class="form-control" placeholder="URL">
</div>
<div class="form-group">
    <Label>Description:</label>
    <input type="text" value="{{$category->description ?? old(description)}}" name="description" class="form-control" placeholder="Descrição">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Salvar</button>
</div>
