@extends('layouts.front')

@section('content')
 <!--Inicio do Template-->
 <section class="content-header">
 </section>

    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Ordens de Serviço</h3>
          <div class ="card-tools ">
           <a href="{{route('os.create')}}" class="btn btn-success">Abrir Ordem de Serviço</a>   
        </div>   
          
      </div>

        <div class="card-body">
        <div class="card  mt-1 p-3">

             <form action="{{ route('os.index')}}" action="GET">
                  <div class="input-group">
                     <input class="form-control " type="search"  placeholder="Consulte por id, nome de cliente..." aria-label="Search" name="search">
                     <div class="input-group-append">
                     <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>     
             </form>
                     <a href="{{route('os.index')}}" class="btn btn-primary">Limpar Filtro</a>
                 </div>
          </div>

          <div class="mt-3">
          <a href="{{ route('os.search.custom',['status' => '1']) }}"class="btn btn-primary">Encerradas</a>
          <a href="{{ route('os.search.custom',['status' => '2']) }}" class="btn btn-success">Pendentes</a>
          <a href="{{ route('os.search.custom',['status' => '3']) }}"class="btn btn-dark">Em Andamento</a>
          <a href="{{ route('os.search.custom',['status' => '4']) }}"class="btn btn-danger">Aguardando Pagamento</a>

          </div>

        </div>
          

        <div class="card">      
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th style="width: 10px">OS</th>
                      <th>Cliente</th>
                      <th>Telefone</th>
                      <th>OS Aberta</th>
                      <th style="width: 320px">Ações</th>
                    </tr>
                  </thead>

                  <tbody>
                  @foreach($orderServices as $os)
                    <tr>
                      <td>{{$os->id}}</td>
                      <td>
                        <h5>{{$os->customer->fullname}}
                          @if($os->status == 1)<span class="badge bg-primary">Encerrada</span>
                          @elseif($os->status == 2)<span class="badge bg-success">Pendente</span>
                          @elseif($os->status == 3)<span class="badge bg-dark">Em Andamento</span>
                          @elseif($os->status == 4)<span class="badge bg-danger">Aguardando Pagamento</span>
                          @endif
                        </h5>
                      </td>
                      <td>{{$os->customer->phone}}</td>
                      <td>{{$os->created_at->format('d/m/Y H:i')}}</td>
                      <td>
                   
                          <div class="btn-group">
                          <a href="{{ route('os.edit',['orderService' => $os->id]) }}"><span class="btn btn-primary btn-sm">EDITAR</span></a>
                  
                            
                          <form action="{{ route('os.destroy',['id' => $os->id]) }}" method="post">
                                        @csrf
                                        @method("PUT")
                                        <button type="submit" class="btn btn-danger btn-sm">CANCELAR OS</button>
                          </form>

                          <div class="input-group-prepend">
                           <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                           + OPÇÕES
                          </button>
                            <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 48px, 0px);">
                              <li class="dropdown-item"><a href="{{ route('os.generatePrint',['id' => $os->id]) }}">Imprimir OS</a></li>
                               @if($os->status == 1 ||$os->status == 4  ) <li class="dropdown-item"><a href="{{ route('os.generatePrintFinished',['id' => $os->id]) }}">Imprimir Pedido </a></li> @endif
                            </ul>
                          </div>


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
                {{$orderServices->links()}}
                </ul>
                
        </div>
       
       
      </div>  

    </section>
@endsection