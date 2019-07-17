@extends('theme')

@section('content')

<div class="container-fluid">
<center>
    <img src="https://themmaholes.com/wp-content/plugins/peepso-core/assets/images/avatar/user-male.png" style="border-radius:50%;" />
        <h2>{{$jogador->nome}}</h2>
        <p style="font-size:22px">
            {{$jogador->altura}}cm
            <br />
            {{$jogador->peso}}kg
            <br />
            {{$jogador->categoria}}
            <br />
            {{$jogador->clube}}
</center>
</div>


@endsection