@extends('layouts.app', ["current" => "cli"])

@section('content')

 <div class="main-panel">
      @extends('layouts.navbar_admin')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <div class="card-icon">
                <i class="material-icons">person</i>
              </div>
                <h3 class="card-title ">Lista de Clientes</h3> 
            </div>
              <p class="nav-link" onClick="novoClient()"><i class="material-icons">note_add</i></p>
          </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="tabelaCli">
                      <thead class=" text-primary">
                        <th>Nome</th>
                        <th>Celular</th>
                        <th>E-mail</th>
                        <th>Ações</th>
                      </thead>
                      <tbody>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
        </div>
      </div> 
    </div>
  </div>
</div>   
     <!--modal-->
<div class="modal" tabindex="-1" role="dialog" id="dlgClient">
    <div class="modal-dialog" role="document"> 
        <div class="modal-content col-md-12">
            <form class="form-horizontal" id="formClient">
                <div class="modal-header">
                    <h5 class="modal-title">Novo Cliente</h5>
                </div>
                <div class="modal-body">
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                           <input type="hidden" id="id" class="form-control">
                          <input type="text" class="form-control" id="rs" required="required" placeholder="Razão social" >
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          
                          <input type="text" class="form-control" id="nf" required="required"  placeholder="Nome fantasia">
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                       
                          <input type="text" class="form-control" id="cnpj" required="required"  placeholder="CNPJ">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          
                          <input type="text" class="form-control" id="ie" required="required"  placeholder="IE">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                       
                          <input type="text" class="form-control" id="email" required="required"  placeholder="E-mail">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          
                          <input type="text" class="form-control" id="cel" required="required" placeholder="Celular">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
        
                          <input type="text" class="form-control" id="fix" required="required" placeholder="Fixo">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control" id="end" required="required" placeholder="Endereço">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group"> 
                          <input type="text" class="form-control" id="end_ent" required="required" placeholder="Endereço de entrega">
                        </div>
                      </div>
                    </div>   
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

      <!--modalx-->   
          
       
     
@endsection
 
@section('javascript')
<script type="text/javascript">
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });
    
    function novoClient() {
        $('#id').val('');
        $('#rs').val('');
        $('#nf').val('');
        $('#cnpj').val('');
        $('#ie').val('');
        $('#email').val('');
        $('#cel').val('');
        $('#fix').val('');
        $('#dlgClient').modal('show');
    }
    
    function montarLinha(p) {
        var linha = "<tr>" +
            "<td>" + p.razao_soc + "</td>" +
            "<td>" + p.celular + "</td>" +
            "<td>" + p.email + "</td>" +
            "<td>" +
              '<button class="btn btn-sm btn-primary" onclick="editar(' + p.id + ')"> Editar </button> ' +
            "</td>" +
            "</tr>";
        return linha;
    }
    
    function editar(id) {
        $.getJSON('/api/cli/'+id, function(data) { 
            console.log(data);
            $('#id').val(data.id);
            $('#rs').val(data.razao_soc);
            $('#nf').val(data.fantasia);
            $('#cnpj').val(data.cnpj);
            $('#ie').val(data.ie);
            $('#email').val(data.email);
            $('#cel').val(data.celular);
            $('#fix').val(data.fixo);
            $('#end').val(data.endereco);
            $('#end_ent').val(data.endereco_ent);
            $('#dlgClient').modal('show');            
        });        
    }    
    function carregarClient() {
        $.getJSON('/api/cli', function(cli) { 
            for(i=0;i<cli.length;i++) {
                linha = montarLinha(cli[i]);
                $('#tabelaCli>tbody').append(linha);
            }
        });        
    }
    
    function criarClient() {
        cli = { 
          rs:   $("#rs").val(),
          nf:   $("#nf").val(),
          cnpj:  $("#cnpj").val(),
          ie:  $("#ie").val(),
          email: $("#email").val(),
          cel: $("#cel").val(),
          fix: $("#fix").val(),
          end: $("#end").val(),
          endt: $("#end_ent").val()
        };
        $.post("/api/cli", cli, function(data) {
            cli = JSON.parse(data);
            linha = montarLinha(cli);
            $('#tabelaCli>tbody').append(linha);            
        });
    }
    
    function salvarClient() {
        cli = { 
          id : $("#id").val(), 
          rs:   $("#rs").val(),
          nf:   $("#nf").val(),
          cnpj:  $("#cnpj").val(),
          ie:  $("#ie").val(),
          email: $("#email").val(),
          cel: $("#cel").val(),
          fix: $("#fix").val(),
          end: $("#end").val(),
          endt: $("#end_ent").val()
        };
        $.ajax({
            type: "PUT",
            url: "/api/cli/" + cli.id,
            context: this,
            data: cli,
            success: function(data) {
                clis = JSON.parse(data);
                linhas = $("#tabelaCli>tbody>tr");
                e = linhas.filter( function(i, e) { 
                    return ( e.cells[0].textContent == clis.id );
                });
                if (e) {
                    e[0].cells[0].textContent = clis.razao_soc;
                    e[0].cells[1].textContent = clis.cel;
                    e[0].cells[2].textContent = clis.email;
                }
            },
            error: function(error) {
                console.log(error);
            }
        });        
    }
    
    $("#formClient").submit( function(event){ 
        event.preventDefault(); 
        if ($("#id").val() != '')
            salvarClient();
        else
            criarClient();
            
        $("#dlgClient").modal('hide');
    });
    
    $(function(){
        carregarClient();
    })
    
</script>
@endsection
