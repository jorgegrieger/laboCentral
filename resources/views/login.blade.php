@include('header')

<script type="text/javascript" src="dist/js/site.min.js"></script>
    <style>
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #303641;
        color: #C1C3C6
      }
    </style>
  </head>
  <body>
    <div class="container">
      <form method="POST" class="form-signin" role="form" action="{{route('login')}}">
      @csrf
        <img class="img-circle center" src="{{asset('app-assets/dist/img/logoks.jpg')}}">
        <br><br>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="glyphicon glyphicon-user"></i>
            </div>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
            @enderror
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class=" glyphicon glyphicon-lock "></i>
              </div>
              <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" required autocomplete="current-password"/>
            
            @error('password')
                 <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
            @enderror 
            </div>

          </div>


        <label class="checkbox">
          <input type="checkbox" value="remember-me"> &nbsp Lembrar Senha
        </label>
        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
      </form>

    </div>
    <div class="clearfix"></div>
    <br><br>
    <!--footer-->
      <div class="container">
        <div class="copyright clearfix text-center">
          <p>Krieg Sistemas de Gestão</p>
              <p>Todos os direitos reservados. Brasil, 2019.</p>
        </div>
      </div>
  </body>
</html>
@include('footer')