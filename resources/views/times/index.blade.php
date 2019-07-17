@extends('theme')

@section('nav')
<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Exportar Times para</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="/times/xlsx/file">Excel</a>
          <a class="dropdown-item" href="/times/csv/file">CSV</a>
        </div>
      </li> 
@endsection

@section('content')

<h1>Times</h1>
<div class="container">
<div class="form-group">
    <a href="times/create" class="btn btn-outline-secondary"><i class="fa fa-plus-circle"></i> Adicionar novo Time</a>
</div>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome do Clube</th>
      <th scope="col">Série</th>
      <th scope="col">Gerenciar</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($times as $time)
  
    <tr>
      <td>{{ $time->id }}</td>
      <td>{{ $time->clube }}</td>
      <td>{{ $time->serie }}</td>
      <td><div class="row"><a href="{{ route('times.show', ['time' => $time->id]) }}" class="btn btn-primary btn-sm  mr-sm-2"><i class="fa fa-eye"></i> Jogadores</a>
      <a href="{{ route('times.edit', ['time' => $time->id]) }}" class="btn btn-secondary btn-sm mr-sm-2"><i class="fa fa-edit"></i></a>
      <form method="POST" action="{{ route('times.show', ['time' => $time->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></button>
      </form> 
      </div>
      </td>

    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection