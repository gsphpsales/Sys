@extends('layouts.app')

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
                    <i class="material-icons">person</i>
                  </div>
                  <h3 class="card-title ">Cadastro de Clientes</h3> 

      
                </div>
                 <!--form here -->
                
                <div class="card-body">
                  <form>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                         
                          <input type="text" class="form-control" placeholder="Empresa" >
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          
                          <input type="text" class="form-control"  placeholder="Nome">
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                       
                          <input type="text" class="form-control"  placeholder="Endereço">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          
                          <input type="text" class="form-control"  placeholder="Endereço de entrega">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                       
                          <input type="text" class="form-control"  placeholder="Cidade">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          
                          <input type="text" class="form-control"  placeholder="Cep">
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          
                          <input type="text" class="form-control"  placeholder="Telefone">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          
                          <input type="email" class="form-control"  placeholder="E-mail">
                        </div>
                      </div>
                      
                      
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Observações:</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> Deixe algum lembre ou informação útil.</label>
                            <textarea class="form-control" rows="5"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Cadastrar</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
           
           
            
        
        
     
                 <!--end form -->
                </div>
                
              </div>
            </div>
            
            </div>
          </div>
        </div>
    
     
@endsection
