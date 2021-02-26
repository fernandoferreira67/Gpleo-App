@extends('layouts.front')

@section('content')
    <section class="content-header">
     
    </section>

    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Cadastro de Cliente</h3>       
        </div>

        <div class="card-body">

            <form action="{{route('customers.store')}}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="card-body">
                 
                  <div class="row">
                    <div class="col-10">
                      <div class="form-group">
                        <label for="inputName">Nome Completo</label>
                        <input type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" placeholder="Nome Completo" value="{{old('fullname')}}">
                          @error('fullname')<div class="invalid-feedback">{{$message}}</div> @enderror
                      </div>
                    </div>
                  </div>
                 
                  <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                        <label for="inputCpf">CPF</label>
                        <input type="text" class="form-control  @error('cpf') is-invalid @enderror" name="cpf" data-inputmask="'mask': '999.999.999-99'" data-mask="" inputmode="text" value="{{old('cpf')}}">
                          @error('cpf')<div class="invalid-feedback">{{$message}}</div> @enderror  
                      </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                        <label for="inputRg">RG</label>
                        <input type="text" class="form-control @error('rg') is-invalid @enderror" name="rg" placeholder="Apenas Números" value="{{old('rg')}}">
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
                      <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" data-inputmask="'mask': '(99)9999-9999'" data-mask="" inputmode="text" value="{{old('phone')}}">
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
                      <input type="text" name="cellphone" class="form-control @error('cellphone') is-invalid @enderror" data-inputmask="'mask': '(99)99999-9999'" data-mask="" inputmode="text" value="{{old('cellphone')}}">
                      @error('cellphone')<div class="invalid-feedback">{{$message}}</div> @enderror
                     </div>
                  </div>
                  </div>
                </div><!--End 2 Plan-->

                  <div class="row">
                    <div class="col-10">
                      <div class="form-group">
                        <label for="inputEndereco">Endereço de Correspondência</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Rua, Av ou Alameda..." value="{{old('address')}}">
                        @error('address')<div class="invalid-feedback">{{$message}}</div> @enderror
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                        <label for="inputBairro">Bairro</label>
                        <input type="text" class="form-control @error('district') is-invalid @enderror" name="district" placeholder="" value="{{old('district')}}">
                        @error('district')<div class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                        <label for="inputCep">CEP</label>
                        <input type="text" class="form-control @error('cep') is-invalid @enderror" name="cep" data-inputmask="'mask': '99999-999'" data-mask="" inputmode="text" value="{{old('cep')}}">
                        @error('cep')<div class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                        <label for="inputCidade">Cidade</label>
                        <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" placeholder="Entre com nome da Cidade" value="{{old('city')}}">
                        @error('city')<div class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-10">
                      <div class="form-group">
                        <label>Observação</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3" placeholder="Observações..." maxlength="255" style="resize: none">{{old('description')}}</textarea>
                        @error('description')<div class="invalid-feedback">{{$message}}</div> @enderror
                      </div>
                    </div>
                  </div>
        
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                      <button type="submit" class="btn btn-lg btn-primary">Cadastrar</button>
                    </div>
                  </div>

              </form>
        </div>
       
      </div>
      

    </section>
@endsection