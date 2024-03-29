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
                <h4 class="nav-link" >
                    <a href="#" onClick="novoProduto()"><i class="material-icons">note_add</i> Novo</a>&nbsp;  
                    <a href="#" onClick="newGrid()"><i class="material-icons">grid_on</i> Grade</a>&nbsp;
                    <a href="#" onClick="newSize()"><i class="material-icons">photo_size_select_small</i> Tamanho</a>
                </h4>
                  
              </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-ordered table-hover" id="tabelaProdutos">
                        <thead class=" text-primary">
                          <tr>
                          <th>Nº</th>
                          <th>Nome</th>
                          <th>Ref</th>
                          <th>Preço Custo</th>
                          <th>Preço Venda</th>
                          <th>Cat</th>
                          <th>Acoes</th>
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
                        <input type="text" class="form-control" id="pc" onKeyPress="return(moeda(this,'.',',',event))" placeholder="Preço Custo">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="pv" onKeyPress="return(moeda(this,'.',',',event))" placeholder="Preço do Venda">
                    </div>
                    <div class="form-group">
                        <label>Escolha a imagem do produto</label>
                        <input type="file" class="form-control-file" id="img" required="required">
                    </div>
                    
                    <div class="form-group">
                        <label for="catp" class="control-label">Categoria</label>
                        <select class="form-control" id="catp" >
                        </select>    
                    </div>

                    <div class="form-group">
                        <label for="id_grid" class="control-label">Grade</label>
                        <select class="form-control" id="id_grid">
                            
                        </select>    
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

        <!--modal Grid-->

<div class="modal" tabindex="-1" role="dialog" id="dlgGrid">
    <div class="modal-dialog" role="document"> 
        <div class="modal-content col-md-12">
            <form class="form-horizontal" id="formGrid">
                <div class="modal-header">
                    <h5 class="modal-title">Nova Grade</h5>
                </div>
                <div class="modal-body">

                  
                    <div class="form-group">
                        <input type="text" class="form-control" id="ng" placeholder="Nome da Grade">
                    </div>
                                       
                    <div class="form-group">
                        <label for="st" class="control-label">Status</label>
                        <select class="form-control" id="st" >
                            <option value="1">ATIVO</option>
                            <option value="0">INATIVO</option>
                        </select>    
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

      <!--modalGridx-->

           <!--modal Size-->

<div class="modal" tabindex="-1" role="dialog" id="dlgSize">
    <div class="modal-dialog" role="document"> 
        <div class="modal-content col-md-12">
            <form class="form-horizontal" id="formSize">
                <div class="modal-header">
                    <h5 class="modal-title">Novo Tamanho</h5>
                </div>
                <div class="modal-body">

                  
                    <div class="form-group">
                        <input type="text" class="form-control" id="ns" placeholder="Nome">
                    </div>
                                       
                    <div class="form-group">
                        <label for="id_grid" class="control-label">Grade</label>
                        <select class="form-control" id="id_grid2">
                            
                        </select>    
                    </div>

                    <div class="form-group">
                        <label for="ord" class="control-label">Ordem</label>
                        <select class="form-control" id="order">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>

                        </select>    
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

      <!--modalGridx-->

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
        $('#pc').val('');
        $('#pv').val('');
        $('#img').val('');
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
            "<td>" + p.price_c + "</td>" +
            "<td>" + p.price_s + "</td>" +
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
            $('#np').val(data.name);
            $('#ref').val(data.ref);
            $('#pc').val(data.price_c);
            $('#pv').val(data.price_s);
            $('#id_grid').val(data.grid_id);
            $('#catp').val(data.cat_id);
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
            name: $("#np").val(),
            ref:  $("#ref").val(), 
            price_c: $("#pc").val(), 
            price_s: $("#pv").val(),
            img: $("#img").val(), 
            cat_id: $("#catp").val(), 
            id_grid: $("#id_grid").val()
        };
        $.post("/api/prod", prod, function(data) {
            prod = JSON.parse(data);
            linha = montarLinha(prod);
            $('#tabelaProdutos>tbody').append(linha);            
        });
    }
    
    function salvarProduto() {
        prod = { 
            id : $("#id").val(), 
            name: $("#np").val(),
            ref:  $("#ref").val(), 
            price_c: $("#pc").val(), 
            price_s: $("#pv").val(),
            id_grid: $("#id_grid").val(),
            img: $("#img").val(), 
            cat_id: $("#catp").val() 
        };
        $.ajax({
            type: "PUT",
            url: "/api/prod/" + prod.id,
            context: this,
            data: prod,
            success: function(data) {
                prods = JSON.parse(data);
                linhas = $("#tabelaProdutos>tbody>tr");
                e = linhas.filter( function(i, e) { 
                    return ( e.cells[0].textContent == prods.id );
                });
                if (e) {
                    e[0].cells[0].textContent = prod.id;
                    e[0].cells[1].textContent = prod.name;
                    e[0].cells[2].textContent = prod.ref;
                    e[0].cells[3].textContent = prod.price_c;
                    e[0].cells[4].textContent = prod.price_s;
                    e[0].cells[5].textContent = prod.cat_id;
                    //e[0].cells[6].textContent = prod.img;
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
        showGrid();
        showGrid2();
    });

    $("#formGrid").submit( function(event){ 
        event.preventDefault(); 
            CreateGrid();
        $("#dlgGrid").modal('hide');
    });
    //show modal form grid
     function newGrid() {
       
        $('#dlgGrid').modal('show');
    }
    //funciotn to save grid
    function CreateGrid() {
        grid = { 
            name: $("#ng").val(),
            status: $("#st").val() 
        };
        $.post("/api/grid", grid, function(data) {
            grid = JSON.parse(data);
            alert(grid);
                      
        });
    }

    $("#formSize").submit( function(event){ 
        event.preventDefault(); 
            CreateSize();
        $("#dlgSize").modal('hide');
    });
    //show modal form grid
     function newSize() {
        $('#dlgSize').modal('show');
    }
    //function to show grid at form products 
    function showGrid() {
        $.getJSON('/api/grid', function(data) { 
            for(i=0;i<data.length;i++) {
                opcao = '<option value ="' + data[i].id + '">' + 
                    data[i].name + '</option>';
                $('#id_grid').append(opcao);
            }
        });
    }
    //function to show grid at form size 
    function showGrid2() {
        $.getJSON('/api/grid', function(data) { 
            for(i=0;i<data.length;i++) {
                opcao = '<option value ="' + data[i].id + '">' + 
                    data[i].name + '</option>';
                $('#id_grid2').append(opcao);
            }
        });
    }
    //save size
    function CreateSize() {
        size = { 
            name: $("#ns").val(),
            id_grid: $("#id_grid").val(),
            order: $("#order").val()
        };
        $.post("/api/size", size, function(data) {
            size = JSON.parse(data);
            alert(size);
                      
        });
    }

    
</script>
@endsection
