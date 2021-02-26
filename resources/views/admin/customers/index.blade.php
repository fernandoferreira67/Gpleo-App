@extends('layouts.front')

@section('content')
 <!--Inicio do Template-->
 <section class="content-header">
 </section>

    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Clientes</h3>

          <div class ="card-tools ">
           <a href="{{route('customers.create')}}" class="btn btn-success">Adicionar Novo Cliente</a>   
          </div>   
          
        </div>

        <div class="card-body">
               
          <div class="card  mt-1 p-3">

             <form action="{{ route('customers.index')}}" action="GET">
                  <div class="input-group">
                     <input class="form-control " type="search"  placeholder="Consulte por Nome, Telefone ou Celular..." aria-label="Search" name="search">
                     <div class="input-group-append">
                     <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>     
             </form>
                     <a href="{{route('customers.index')}}" class="btn btn-primary">Limpar Filtro</a>
                 </div>
          </div>
        </div>
        

        <div class="card">      
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nome do Cliente</th>
                      <th>Telefone</th>
                      <th>Celular</th>
                      <th style="width: 220px">Ações</th>
                    </tr>
                  </thead>

                  <tbody>
                  @foreach($customers as $customer)
                    <tr>
                      <td>{{$customer->id}}</td>
                      <td>
                        <h5>{{$customer->fullname}}
                          @if($customer->active == 0)<span class="badge bg-danger">Inativo</span>@else<span class="badge bg-success">Ativo</span>@endif
                        </h5>
                      </td>
                      <td>{{$customer->phone}}</td>
                      <td>{{$customer->phone}}</td>
                      <td>
                   
                          <div class="btn-group">
                          <a href="{{route('customers.edit', ['customer' => $customer->id])}}"><span class="btn btn-primary btn-sm">EDITAR</span></a>
                            
                          <form action="{{route('customers.destroy', ['customer' => $customer->id])}}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger btn-sm">EXCLUIR</button>
                          </form>


                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

        </div>

        <div class="card-footer clearfix">
                <ul class="pagination pagination m-0 float-right">
                {{$customers->links()}}
                </ul>
        </div>
       
      </div>
      

    </section>
@endsection