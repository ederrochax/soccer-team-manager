@extends('theme')

@section('content')

<div class="container">
    <form action="{{ route('times.update', ['time' => $time->id]) }}" method="POST">
    @csrf
    @method('PUT')
        <div class="row">
            <div class="form-group col-md-4">
                <label for="">Clube</label>
                <input type="text" class="form-control" name="clube" id="clube" value="{{ old('time', $time->clube) }}" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="">Serie</label>
                <select class="form-control" name="serie" id="serie" required>
                @foreach($series as $serie)
                    <option value="{{$serie}}" {{ $time->serie == $serie ? 'selected' : '' }}>Série {{$serie}}</option>
                @endforeach
                </select>   
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
    

@endsection