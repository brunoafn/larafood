@include('admin.includes.alert')

@csrf

<div class="form-group">
    <Label>Nome do perfil:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome" value="{{$profile->name ?? old('name')}}">
</div>

<div class="form-group">
    <Label>Descrição do perfil:</label>
    <input type="text" name="description" class="form-control" placeholder="Descrição" value="{{$profile->description ?? old('description')}}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Salvar</button>
</div>
