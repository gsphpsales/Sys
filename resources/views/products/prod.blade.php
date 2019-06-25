@extends('layouts.app', ["current"=> "prod"])

@section('content')

 <div class="main-panel">
      @extends('layouts.navbar_admin')
      

          <!--teste table-->
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <div class="card-icon">
                    <i class="material-icons">library_books</i>
                  </div>
                    <h3 class="card-title ">Lista de Produtos</h3> 
                </div>
                  <p class="nav-link" onClick="novoProduto()"><a href="#"><i class="material-icons">note_add</i></a></p>
              </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-ordered table-hover" id="tabelaProdutos">
                        <thead class=" text-primary">
                          <tr>
                          <th>Nº</th>
                          <th>Nome</th>
                          <th>Ref</th>
                          <th>Desc</th>
                          <th>Cat</th>
                          <th>acoes</th>
                          </tr>
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
    </div>
      
         <!-- close test-->
               
        </div>
      </div>
      <!--modal-->

<div class="modal" tabindex="-1" role="dialog" id="dlgProdutos">
    <div class="modal-dialog" role="document"> 
        <div class="modal-content col-md-12">
            <form class="form-horizontal" id="formProduto">
                <div class="modal-header">
                    <h5 class="modal-title">Novo produto</h5>
                </div>
                <div class="modal-body">

                    <input type="hidden" id="id" class="form-control">
                    <div class="form-group">
                            <input type="text" class="form-control" id="np" placeholder="Nome do produto">
                        
                    </div>
                    <div class="form-group">
                        
                            <input type="text" class="form-control" id="ref" placeholder="Referência">
                        
                        
                    </div>
<div class="form-group">
                       <input type="text" class="form-control" id="desc" placeholder="Descrição">
</div>
     

                    <div class="form-group">
                        
                            <input type="text" class="form-control" id="pc" placeholder="Preço Custo">
                        
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="pv" placeholder="Preço do Venda">
                        </div>
                    
                    
                    <div class="form-group">
                        <label for="catp" class="control-label">Categoria</label>
                        <div class="input-group">
                            <select class="form-control" id="catp" >
                            </select>    
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
    
    function novoProduto() {
        $('#id').val('');
        $('#np').val('');
        $('#ref').val('');
        $('#desc').val('');
        $('#dlgProdutos').modal('show');
    }
    
    function carregarCategorias() {
        $.getJSON('/api/cat', function(data) { 
            for(i=0;i<data.length;i++) {
                opcao = '<option value ="' + data[i].id + '">' + 
                    data[i].name + '</option>';
                $('#catp').append(opcao);
            }
        });
    }
    
    function montarLinha(p) {
        var linha = "<tr>" +
            "<td>" + p.id + "</td>" +
            "<td>" + p.name + "</td>" +
            "<td>" + p.ref + "</td>" +
            "<td>" + p.desc + "</td>" +
            "<td>" + p.cat_id + "</td>" +
            "<td>" +
              '<button class="btn btn-sm btn-primary" onclick="editar(' + p.id + ')"> Editar </button> ' +
              '<button class="btn btn-sm btn-danger" onclick="remover(' + p.id + ')"> Apagar </button> ' +
            "</td>" +
            "</tr>";
        return linha;
    }
    
    function editar(id) {
        $.getJSON('/api/prod/'+id, function(data) { 
            console.log(data);
            $('#id').val(data.id);
            $('#nomeProduto').val(data.nome);
            $('#precoProduto').val(data.preco);
            $('#quantidadeProduto').val(data.estoque);
            $('#categoriaProduto').val(data.categoria_id);
            $('#dlgProdutos').modal('show');            
        });        
    }
    
    function remover(id) {
        $.ajax({
            type: "DELETE",
            url: "/api/prod/" + id,
            context: this,
            success: function() {
                console.log('Apagou OK');
                linhas = $("#tabelaProdutos>tbody>tr");
                e = linhas.filter( function(i, elemento) { 
                    return elemento.cells[0].textContent == id; 
                });
                if (e)
                    e.remove();
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
    
    function carregarProdutos() {
        $.getJSON('/api/prod', function(prod) { 
            for(i=0;i<prod.length;i++) {
                linha = montarLinha(prod[i]);
                $('#tabelaProdutos>tbody').append(linha);
            }
        });        
    }
    
    function criarProduto() {
        prod = { 
            nome: $("#np").val(), 
            preco: $("#pc").val(), 
            estoque: $("#pv").val(), 
            categoria_id: $("#categoriaProduto").val() 
        };
        $.post("/api/prod", prod, function(data) {
            produto = JSON.parse(data);
            linha = montarLinha(produto);
            $('#tabelaProdutos>tbody').append(linha);            
        });
    }
    
    function salvarProduto() {
        prod = { 
            id : $("#id").val(), 
            nome: $("#nomeProduto").val(), 
            preco: $("#precoProduto").val(), 
            estoque: $("#quantidadeProduto").val(), 
            categoria_id: $("#categoriaProduto").val() 
        };
        $.ajax({
            type: "PUT",
            url: "/api/produtos/" + prod.id,
            context: this,
            data: prod,
            success: function(data) {
                prod = JSON.parse(data);
                linhas = $("#tabelaProdutos>tbody>tr");
                e = linhas.filter( function(i, e) { 
                    return ( e.cells[0].textContent == prod.id );
                });
                if (e) {
                    e[0].cells[0].textContent = prod.id;
                    e[0].cells[1].textContent = prod.nome;
                    e[0].cells[2].textContent = prod.estoque;
                    e[0].cells[3].textContent = prod.preco;
                    e[0].cells[4].textContent = prod.categoria_id;
                }
            },
            error: function(error) {
                console.log(error);
            }
        });        
    }
    
    $("#formProduto").submit( function(event){ 
        event.preventDefault(); 
        if ($("#id").val() != '')
            salvarProduto();
        else
            criarProduto();
            
        $("#dlgProdutos").modal('hide');
    });
    
    $(function(){
        carregarCategorias();
        carregarProdutos();
    })
    
</script>
@endsection
