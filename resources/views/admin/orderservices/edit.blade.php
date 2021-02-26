@extends('layouts.front')

@section('content')
    <section class="content-header">
    </section>

    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Alteração da Ordem de Serviço</h3>       
        </div>

        <div class="card-body">

            <form action="{{ route('os.update', ['orderService' => $os->id]) }}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
           
            @method("PUT")

                <div class="card-body">
                <div class="row">
                    <div class="col-1">
                      <div class="form-group">
                        <label for="osId">OS Nº</label>
                        <input type="text" class="form-control" name="id" value="{{$os->id}}" readonly>
                      </div>
                    </div>
                    
                    <div class="col-4">    
                      <div class="form-group">
                        <label class="">Status</label>
                        <select class="form-control" name="status"> 
                          <option  value="1" {{ $os->status == 1 ? 'selected' : '' }} >Encerrada</option>
                          <option  value="2" {{ $os->status == 2 ? 'selected' : '' }} >Pendente</option>
                          <option  value="3" {{ $os->status == 3 ? 'selected' : '' }} >Em Andamento</option>
                          <option  value="4" {{ $os->status == 4 ? 'selected' : '' }} >Aguardando Pagamento</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-4">
                      <div class="form-group">
                      <label for="">Aberta pelo Usuário</label>
                      <input type="text" class="form-control" value="{{$os->createdUser->name}}" readonly>
                      </div>
                    </div>

                    <div class="col-3">
                      <div class="form-group">
                      <label for="">OS Aberta</label>
                      <input type="text" class="form-control" value="{{$os->created_at->format('d/m/Y H:i')}}" readonly>
                      </div>
                    </div>
                </div>

                <div class="row">
                  <div class="col-1"> 
                    <div class="form-group">
                    <label for="">ID</label>
                    <input type="text" class="form-control" name="customer_id" value="{{$os->customer->id}}" readonly>
                    </div>
                  </div>
                  <div class="col-5">
                   <div class="form-group">
                   <label for="">Cliente</label>
                   <input type="text" class="form-control" value="{{$os->customer->fullname}}" readonly>
                   </div>
                  </div>

                  <div class="col-3">
                   <div class="form-group">
                   <label for="">Telefone</label>
                   <input type="text" class="form-control" value="{{$os->customer->phone}}" readonly>
                   </div>
                  </div>

                  <div class="col-3">
                   <div class="form-group">
                   <label for="">Celular</label>
                   <input type="text" class="form-control" value="{{$os->customer->cellphone}}" readonly>
                   </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                    <label for="">Endereço</label>
                    <input type="text" class="form-control" value="{{$os->customer->address}}" readonly>
                    </div>
                  </div>

                  <div class="col-3">
                    <div class="form-group">
                    <label for="">Bairro</label>
                    <input type="text" class="form-control" value="{{$os->customer->district}}" readonly>
                    </div>
                  </div>

                  <div class="col-3">
                    <div class="form-group">
                    <label for="">Cidade</label>
                    <input type="text" class="form-control" value="{{$os->customer->city}}" readonly>
                    </div>
                  </div>
                </div>

                
                <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label>Descrição</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="7" placeholder="Descrição do Serviço..." style="resize: none">{{ $os->description }}</textarea>
                        @error('description')<div class="invalid-feedback">{{$message}}</div> @enderror
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-10">
                      <div class="form-group">
                        <label>Solução</label>
                        <textarea class="form-control" wrap="wrap" name="solution" rows="10" placeholder="Solução do Serviço..." style="resize: none">{{ $os->solution }}</textarea>
                      </div>

                      
                    </div>
                    <div class="col-2">
                      <div class="form-group">
                      <label>Preço</label>
                      <input type="text" class="form-control" id="price" value="{{$os->price}}" name="price">
                      </div>
                    </div>
                  </div>
                 
                          
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                      <button type="submit" class="btn btn-lg btn-success">Alterar Orden de Serviço</button>
                      <a href="{{route('os.index')}}" class="btn btn-lg btn-primary">Voltar</a>
                    </div>          
              </form>
                      
        </div>
       
      </div>

    </section>
@endsection

@section('scripts')
  <script>

  $('#price').maskMoney('destroy');
  $('#price').maskMoney({thousands:'.', decimal:','});
  $('#price').maskMoney('mask');

  </script>
@endsection