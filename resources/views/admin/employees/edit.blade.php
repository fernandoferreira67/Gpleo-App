@extends('layouts.front')

@section('content')
    <section class="content-header">
    </section>

    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Alteração de Cadastro de Cliente</h3>       
        </div>

        <div class="card-body">

            <form action="{{ route('customers.update', ['customer' => $customer->id]) }}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            @method("PUT")

                <div class="card-body">
                <div class="row">
                    <div class="col-1">
                      <div class="form-group">
                        <label for="inputName">ID</label>
                        <input type="text" class="form-control @error('id') is-invalid @enderror" name="id" value="{{$customer->id}}" readonly>
                      </div>
                    </div>
                    
                    <div class="col-2">    
                      <div class="form-group">
                        <label class="">Situação do Cadastro</label>
                        <select class="form-control" name="active"> 
                          <option  value="1" {{ $customer->active == 1 ? 'selected' : '' }} >Ativo</option>
                          <option  value="0" {{ $customer->active == 0 ? 'selected' : '' }}>Inativo</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                      <label for="">Ultima Atualização</label>
                      <input type="text" class="form-control" value="{{ $customer->updated_at ? $customer->updated_at->format('d/m/Y H:i') : $customer->created_at->format('d/m/Y H:is') }}" readonly>
                      </div>
                    </div>
                  </div>
                 
                  <div class="row">
                    <div class="col-10">
                      <div class="form-group">
                        <label for="inputName">Nome Completo</label>
                        <input type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" placeholder="Nome Completo" value="{{$customer->fullname}}">
                          @error('fullname')<div class="invalid-feedback">{{$message}}</div> @enderror
                      </div>
                    </div>
                  </div>
                 
                  <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                        <label for="inputCpf">CPF</label>
                        <input type="text" class="form-control  @error('cpf') is-invalid @enderror" name="cpf" data-inputmask="'mask': '999.999.999-99'" data-mask="" inputmode="text" value="{{$customer->cpf}}">
                          @error('cpf')<div class="invalid-feedback">{{$message}}</div> @enderror  
                      </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                        <label for="inputRg">RG</label>
                        <input type="text" class="form-control @error('rg') is-invalid @enderror" name="rg" placeholder="Apenas Números" value="{{$customer->rg}}">
                          @error('rg')<div class="invalid-feedback">{{$message}}</div> @enderror  
                        </div>
                    </div>
                  <div class="col-3">
                  <div class="form-group">
                    <label>Telefone</label>
                      <div class="input-group">
                       <div class="input-group-prepend">
                       <span class="input-group-text"><i class="fas fa-phone"></i></span>
                      </div>
                      <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" data-inputmask="'mask': '(99)9999-9999'" data-mask="" inputmode="text" value="{{$customer->phone}}">
                      @error('phone')<div class="invalid-feedback">{{$message}}</div> @enderror
                     </div>
                  </div>
                  </div>
                  <div class="col-3">
                  <div class="form-group">
                    <label>Celular</label>
                      <div class="input-group">
                       <div class="input-group-prepend">
                       <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                      </div>
                      <input type="text" name="cellphone" class="form-control @error('cellphone') is-invalid @enderror" data-inputmask="'mask': '(99)99999-9999'" data-mask="" inputmode="text" value="{{$customer->cellphone}}">
                      @error('cellphone')<div class="invalid-feedback">{{$message}}</div> @enderror
                     </div>
                  </div>
                  </div>
                </div><!--End 2 Plan-->

                  <div class="row">
                    <div class="col-10">
                      <div class="form-group">
                        <label for="inputEndereco">Endereço de Correspondência</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Rua, Av ou Alameda..." value="{{ $customer->address }}">
                        @error('address')<div class="invalid-feedback">{{$message}}</div> @enderror
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                        <label for="inputBairro">Bairro</label>
                        <input type="text" class="form-control @error('district') is-invalid @enderror" name="district" placeholder="" value="{{ $customer->district }}">
                        @error('district')<div class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                        <label for="inputCep">CEP</label>
                        <input type="text" class="form-control @error('cep') is-invalid @enderror" name="cep" data-inputmask="'mask': '99999-999'" data-mask="" inputmode="text" value="{{ $customer->cep }}">
                        @error('cep')<div class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                        <label for="inputCidade">Cidade</label>
                        <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" placeholder="Entre com nome da Cidade" value="{{ $customer->city }}">
                        @error('city')<div class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-10">
                      <div class="form-group">
                        <label>Observação</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3" placeholder="Observações..." maxlength="255" style="resize: none">{{ $customer->description }}</textarea>
                        @error('description')<div class="invalid-feedback">{{$message}}</div> @enderror
                      </div>
                    </div>
                  </div>
        
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                      <button type="submit" class="btn btn-lg btn-success">Alterar Cadastro</button>
                      <a href="{{route('customers.index')}}" class="btn btn-lg btn-primary">Voltar</a>
                    </div>          
              </form>
                      
        </div>
       
      </div>
      

    </section>
@endsection