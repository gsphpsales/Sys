@extends('layouts.app', ["current" => "cat"])

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
                    <i class="material-icons">category</i>
                  </div>
                  <h3 class="card-title ">Lista de Categoria</h3> 

                  
                </div>
                  <p class="nav-link"><a href="cat/new"><i class="material-icons">note_add</i></a></p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                         Nome
                        </th>
                        <th>
                          Desc
                        </th>
                        
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                            Dakota Rice
                          </td>
                          <td>
                            shoes
                          </td>
                        </tr>
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
      
          close test-->
          
        </div>
      </div>
     
@endsection
