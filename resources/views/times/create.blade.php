@extends('theme')

@section('content')

<div class="container">
    <form action="{{ route('times.store') }}" method="POST">
    @csrf
        <div class="row">
            <div class="form-group col-md-4">
                <label for="">Clube</label>
                <input type="text" class="form-control" name="clube" id="clube" placeholder="Digite o nome do Clube" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="">Serie</label>
                <select class="form-control" name="serie" id="serie" required>
                @foreach($series as $serie)
                    <option value="{{$serie}}">Série {{$serie}}</option>
                @endforeach
                   
                </select>   
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
    

@endsection