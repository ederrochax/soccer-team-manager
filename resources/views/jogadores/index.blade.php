@extends('theme')

@section('nav')
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Exportar Jogadores para</a>
  <div class="dropdown-menu" aria-labelledby="dropdown01">
    <a class="dropdown-item" href="/jogadores/xlsx/file">Excel</a>
    <a class="dropdown-item" href="/jogadores/csv/file">CSV</a>
  </div>
</li> 
@endsection

@section('content')

    <h1>Jogadores</h1>
<div class="container">
    <form class="form-inline" method="GET" action="/jogadores/search">
        <input type="text" class="form-control mb-2 mr-sm-2 mb-3" name="nome" id="nome" placeholder="Buscar por nome" required>        
        <button type="submit" class="btn btn-outline-secondary mb-3">Buscar</button>
    </form> 
  
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Jogador</th>
      <th scope="col">Altura</th>
      <th scope="col">Peso</th>
      <th scope="col">Categoria</th>
      <th scope="col">Clube</th>
      <th scope="col">Visualizar</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($jogadores as $jogador)

    <tr>
      <td>{{ $jogador->id }}</td>
      <td>{{ $jogador->nome }}</td>
      <td>{{ $jogador->altura }}</td>
      <td>{{ $jogador->peso }}kg</td>
      <td>{{ $jogador->categoria }}</td>
      <td>{{ $jogador->clube }}</td>
      <td><a href="{{ route('jogadores.show', ['jogadores' => $jogador->id]) }}" class="btn btn-light btn-sm"><i class="fa fa-user"></i></a>
      </td>
    </tr>

    @endforeach
  </tbody>
</table>
</div>
@endsection