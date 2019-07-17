@extends('theme')

@section('content')

<div class="container">
    <form action="{{ route('jogadores.store') }}" method="POST">
    @csrf
    <input type="text" value="{{ $idTime }}" name="id_time" id="id_time" hidden>

        <div class="row">
            <div class="form-group col-md-5">
                <label for="">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do Jogador" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3">
                <label for="">Altura</label>
                <input type="text" class="form-control" name="altura" id="altura" placeholder="Altura do Jogador" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3">
                <label for="">Peso</label>
                <input type="text" class="form-control" name="peso" id="peso" placeholder="Peso do Jogador" required>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="">Categoria</label>
                <select class="form-control" name="categoria" id="categoria" required>
                @foreach($categorias as $categoria)
                    <option value="{{$categoria}}">{{$categoria}}</option>
                @endforeach
                </select>   
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
    

@endsection