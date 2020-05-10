
@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos <a href="{{route('plans.create')}}" class="btn btn-dark">ADD</a></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index',)}}">Dashboard </a></li>
        <li class="breadcrumb-item active"><a href="{{route('plans.index',)}}">Planos </a></li>
    </ol>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <form action="{{route('plans.search')}}" method="POST">
            @csrf
            <input type="text" name="filter" placeholder="Filtrar pelo Nome" class="form-control" value="{{$filters['filter'] ?? ''}}">
            <br>
            <button type="submit" class="btn btn-dark">Filtrar</button>
        </form>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th width="250">Ações</th>
                    </tr>
                <thead>
                <tbody>
                    @foreach($plans as $plan)
                        <tr>
                            <td>
                                {{$plan->name}}
                            </td>
                            <td>
                                {{$plan->price}}
                            </td>
                            <td>
                                <a href="{{route('details.plan.index',$plan->url)}}"class="btn btn-info">Detalhes</a>
                                <a href="{{route('plans.edit',$plan->url)}}"class="btn btn-success">Editar</a>
                                <a href="{{route('plans.show',$plan->url)}}"class="btn btn-warning">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                <tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $plans ?? ''->appends($filters)->links() !!}
            @else
                {!! $plans ?? ''->links() !!}
            @endif
        </div>
    </div>
</div>
@stop
