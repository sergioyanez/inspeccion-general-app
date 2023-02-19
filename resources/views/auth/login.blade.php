@include('header.header')
    <div class="container">
        <div class="row mt-4">
            <div class="col-12 col-lg-4 align-self-center">
                <form action="{{route('iniciar-sesion')}}" method="POST">
                    <h1 class="h4 mb-4">Iniciar sesión</h1>
                    @csrf
                    <div>
                        <label class="col-form-label">Nombre de usuario</label>
                        <input  class="bg-input form-control @error('usuario') is-invalid @enderror" id="validationServerUsername" required autofocus value="{{ old('usuario') }}" type="text" name="usuario"/>
                        @error('usuario')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="col-form-label">Contraseña</label>
                        <input  class="bg-input form-control @error('password') is-invalid @enderror" required type="password" name="password"/>
                        @error('password')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{$message}}
                        </div>
                        @enderror
                    </div>
                    <input class="mt-4 btn btn-login" type="submit" value="Iniciar sesión">
                </form> 
            </div>
            <div class="col-lg-6 ms-auto my-auto">
                <figure>
                    <img class="img-fluid" src="assets/logo_login.png" alt="">
                </figure>
            </div>
        </div>
    </div>
@include('footer.footer')