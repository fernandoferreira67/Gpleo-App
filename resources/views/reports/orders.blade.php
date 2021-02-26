<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordem de Serviço</title>
    
    <link rel="stylesheet"  type="text/css" href="{{ asset('css/print.css') }}">

</head>
<body>

<div id="folha-a4" class="folha a4_vertical">
   <div id="conteudo">
        <div class="company">
         <h1 class="center"> Ordem de Serviço</h1>
          <table style="width:100%">
            <td>
                <h4>POLIPEDRAS IBITINGA</h4>
                <h4>CNPJ:00.000.000/0001-01</h4>
                <h4>Acesso Manuiel Bento Costa, S/N</h4>
                <h4>Bairro Novo</h4>
                <h4>Cep:14944-044</h4>
                <h4>Ibitinga/SP</h4>
            </td>

            <td style="text-align:center">
                <h2>OS</h2>
                <h3>Nº {{$os->id}}</h3>
            <h5>{{$os->created_at->format('d/m/Y h:m')}}</h5>
                <h6>Aberto pelo usuário:{{$os->createdUser->name}}</h6>
            </td>
          </table>

       </div>

        <div class="customer-main">
           <h3 class="center uppercase">Dados do Cliente</h3>
        </div>

        <div class="customer">
         <p>Nome: {{$os->customer->fullname}} CPF: {{$os->customer->cpf}} RG: {{$os->customer->rg}}</p>
         <p>Endereço: {{$os->customer->address}} -  {{$os->customer->district}}</p>
         <p>Telefone: {{$os->customer->phone}} Celular: {{$os->customer->cellphone}} </p>
         <p>CEP: {{$os->customer->cep}} Cidade: {{$os->customer->city}}
        </div>

        <div class="description-main">
          <h3 style="color:#333; text-align:center">Descrição</h3>
        </div>

        <div class="description bord-text">
            {{$os->description}}
        </div>

       
   </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>   
<script>
    $(document).ready(function(){
        window.print();
 });
</script>  
</body>
</html>