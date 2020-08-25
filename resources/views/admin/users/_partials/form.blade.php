@include('admin.includes.alert')

@csrf

<div class="form-group">
    <Label>Nome:</label>
    <input type="text" value="{{$user->name ?? old(name)}}" name="name" class="form-control" placeholder="Nome">
</div>
<div class="form-group">
    <Label>Email:</label>
    <input type="text" value="{{$user->email ?? old(email)}}" name="email" class="form-control" placeholder="Email">
</div>
<div class="form-group">
    <Label>Senha:</label>
    <input type="password" value="{{$user->password ?? old(password)}}" name="password" class="form-control" placeholder="Senha">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Salvar</button>
</div>
