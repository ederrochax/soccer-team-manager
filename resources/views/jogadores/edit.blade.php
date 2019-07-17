@extends('theme')

@section('content')

<div class="container">
    <form action="{{ route('jogadores.update', ['jogador' => $jogador->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" value="{{ old('jogador', $jogador->id_time) }}" name="id_time" id="id_time" hidden>

        <div class="row">
            <div class="form-group col-md-5">
                <label for="">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" value="{{ old('jogador', $jogador->nome) }}" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3">
                <label for="">Altura</label>
                <input type="text" class="form-control" name="altura" id="altura" value="{{ old('jogador', $jogador->altura) }}" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3">
                <label for="">Peso</label>
                <input type="text" class="form-control" name="peso" id="peso" value="{{ old('jogador', $jogador->peso) }}" required>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="">Categoria</label>
                <select class="form-control" name="categoria" id="categoria" required>
                @foreach($categorias as $categoria)
                    <option value="{{$categoria}}" {{ $jogador->categoria == $categoria ? 'selected' : '' }}>{{$categoria}}</option>
                @endforeach
                </select>   
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
    

@endsection