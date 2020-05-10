@include('admin.includes.alert')

@csrf

<div class="form-group">
    <Label>Nome do detalhe:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome" value="{{$detail->name ?? old('name')}}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Salvar</button>
</div>
