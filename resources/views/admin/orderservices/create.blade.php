@extends('layouts.front')

@section('content')
    <section class="content-header">
    </section>

    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Abertura de Ordem de Serviço</h3>       
        </div>

        <div class="card-body">

            <form action="{{route('os.store')}}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="created_user_id" value="{{auth()->user()->id}}">
                <div class="card-body">
                 
                  <div class="row">
                    <div class="col-8">    
                      <div class="form-group">
                        <label class="">Cliente:</label>
                        <select class="form-control @error('customer_id') is-invalid @enderror" name="customer_id"> 
                        <option  value="">Escolha um Cliente</option>                            
                          @foreach($customers as $customer)
                            @if($customer->id == old('customer_id'))
                            <option  value="{{ $customer->id }}" selected>{{ $customer->fullname }}</option>
                            @else
                            <option  value="{{ $customer->id }}">{{ $customer->fullname }}</option>
                            @endif
                          @endforeach
                        </select>
                        @error('customer_id')<div class="invalid-feedback">{{$message}}</div> @enderror
                       
                      </div>
                    
                      
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-8">
                      <div class="form-group">
                        <label>Descrição</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3" placeholder="Descrição do serviço..." style="resize: none">{{old('description')}}</textarea>
                        @error('description')<div class="invalid-feedback">{{$message}}</div> @enderror
                      </div>
                    </div>
                  </div>
        
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                      <button type="submit" class="btn btn-lg btn-primary">Abrir OS</button>
                    </div>
                  </div>

              </form>
        </div>
       
      </div>
      

    </section>
@endsection