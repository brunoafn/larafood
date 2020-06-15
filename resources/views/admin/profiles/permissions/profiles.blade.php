
@extends('adminlte::page')

@section('title', 'Perfils relacionados a permissão escolhida')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index',)}}">Dashboard </a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.index',)}}">Perfils </a></li>
    </ol>
@stop

@section('content')
<div class="card">
    <div class="card-header">

        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Perfils</th>
                    </tr>
                <thead>
                <tbody>
                    @foreach($profiles as $profile)
                        <tr>
                            <td>
                                {{$profile->name}}
                            </td>
                        </tr>
                    @endforeach
                        <tr>
                            <td>
                                <a href="/admin/permissions"class="btn btn-primary ">Voltar</a>
                            </td>
                        <tr>
                <tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $profiles ?? ''->appends($filters)->links() !!}
            @else
                {!! $profiles ?? ''->links() !!}
            @endif
        </div>
    </div>
</div>
@stop
