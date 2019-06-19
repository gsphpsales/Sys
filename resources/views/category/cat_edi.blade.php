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
                  <h3 class="card-title ">Editar categoria</h3>
                </div>
                 <!--form here --> 
                <div class="card-body">
                  <form action="/Sys/public/cat/{{$cat->id}}" method="POST">
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" name="name" class="form-control" value="{{$cat->name}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Desc:</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> Cescrição do produto.</label>
                            <textarea class="form-control" rows="5" name="desc">{{$cat->desc}}</textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Confirmar</button>
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
