@extends('theme')

@section('content')

    <h1><span class="badge badge-pill badge-info">{{ $count }}</span> Jogadores do {{ $time->clube }} </h1>
    <div class="container">
    <div class="form-group">
        <a href="{{ route('jogadores.create', ['time' => $time->id]) }}" class="btn btn-outline-secondary"><i class="fa fa-plus-circle"></i> Adicionar novo Jogador</a>
    </div>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Jogador</th>
      <th scope="col">Altura</th>
      <th scope="col">Peso</th>
      <th scope="col">Categoria</th>
      <th scope="col">Gerenciar</th>
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
      <td><div class="row"><a href="{{ route('jogadores.show', ['jogadores' => $jogador->id]) }}" class="btn btn-light btn-sm mr-sm-2"><i class="fa fa-user"></i></a>
      <a href="{{ route('jogadores.edit', ['jogadores' => $jogador->id]) }}" class="btn btn-secondary btn-sm mr-sm-2"><i class="fa fa-edit"></i></a>
      <form method="POST" action="{{ route('jogadores.destroy', ['time' => $jogador->id]) }}">
        @csrf
        @method('DELETE')
         <input type="text" name="id_time" id="id_time" value="{{ $jogador->id_time }}" hidden>
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