@include('header.header') 
<h1>INICIAR SESIÒN</h1>
<form action="{{route('login')}}" method="POST" >
    @csrf
    <div class="mb-3">
        <label>Nombre de usuario</label>
        <input  type="text" name="usuario"/>
    </div>
    <div>
        @error('usuario')
            <strong>{{$message}}</strong>
        @enderror
    </div>

    <div>
        <label>Contraseña</label>
        <input  type="password" name="password"/>
    </div>
    <div>
        @error('password')
            <strong>{{$message}}</strong>
        @enderror
    </div>
    <input type="submit" value="Iniciar sesiòn">
</form>