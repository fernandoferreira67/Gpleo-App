<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administração</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>



<body class="login-page" style="min-height: 512.391px;">


<div class="login-box">
 

  <div class="card">
  
    <div class="card-body login-card-body">
        @if($errors->all())
        @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Erro em fazer o Login!</h5>
                  {{$error}}
                </div>
        @endforeach

    @endif
  
    <p class="login-box-msg">Faça login para iniciar sua sessão</p>

      <form action="{{ route('admin.login.do') }}" method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nome do Usuário" name="username" value="admin@admin.com.br">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Senha de Acesso" name="password" value="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
          <!-- /.col -->
          <div class="row-2">
           <div class="input-group">
            <button type="submit" class="btn btn-primary btn-block">ENTRAR</button>
            </div>
          </div>
          <!-- /.col -->
        </div>
      </form>

    
  </div>
</div>
<!-- /.login-box -->

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
