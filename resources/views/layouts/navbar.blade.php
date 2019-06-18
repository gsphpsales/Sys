
@if (Route::has('login'))
 @if (Auth::check())
<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="http://www.ninesystem.com.br" class="simple-text logo-normal">
          Nine System
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="home">
              <i class="material-icons">dashboard</i>
              <p>Administrativo</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="cli">
              <i class="material-icons">person</i>
              <p>Clientes</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="request">
              <i class="material-icons">content_paste</i>
              <p>Pedidos</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="category">
              <i class="material-icons">category</i>
              <p>Categoria</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="prod">
              <i class="material-icons">library_books</i>
              <p>Produtos</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="report">
              <i class="material-icons">bubble_chart</i>
              <p>Relatórios</p>
            </a>
          </li>
          <!--
          <li class="nav-item ">
            <a class="nav-link" href="./map.html">
              <i class="material-icons">location_ons</i>
              <p>Maps</p>
            </a>
          </li>-->
          <li class="nav-item ">
            <a class="nav-link" href="alert">
              <i class="material-icons">notifications</i>
              <p>Alertas</p>
            </a>
          </li>
          <!--<li class="nav-item ">
            <a class="nav-link" href="./rtl.html">
              <i class="material-icons">language</i>
              <p>RTL Support</p>
            </a>
          </li>
          -->
        </ul>
    </div>
</div>
 @else
  @endif
   @endif
