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
              <p class="nav-link" onClick="novoProduto()"><i class="material-icons">note_add</i></p>
          </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>Nome</th>
                        <th>Celular</th>
                        <th>Cidade</th>
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
                          <input type="text" class="form-control" id="rs" placeholder="Razão social" >
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          
                          <input type="text" class="form-control" id="nf"  placeholder="Nome fantasia">
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                       
                          <input type="text" class="form-control" id="cnpj"  placeholder="CNPJ">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          
                          <input type="text" class="form-control" id="ie"  placeholder="IE">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                       
                          <input type="text" class="form-control" id="email"  placeholder="E-mail">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          
                          <input type="text" class="form-control" id="cel"  placeholder="Celular">
                        </div>
                        <div class="form-group">
                          
                          <input type="text" class="form-control" id="fix"  placeholder="Fixo">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control" id="end" placeholder="Endereço">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group"> 
                          <input type="text" class="form-control" id="end_ent" placeholder="Endereço de entrega">
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
