<!--Menú-->
    <header class="navbar">
      <!--MENÚ WEB-->
      <nav class="nav-wrapper"><a class="button-collapse left" data-activates="mobile-menu" href="#"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down" id="nav-mobile">
          <li><a class="waves-effect" href="index">INICIO</a></li>
          <li><a class="waves-effect dropdown-button" data-activates="oficinas">OFICINAS<i class="material-icons right">arrow_drop_down</i></a></li>
          <li><a class="waves-effect dropdown-button" data-activates="proyectos">PROYECTOS<i class="material-icons right">arrow_drop_down</i></a></li>
          <li><a class="waves-effect" href="pasantias">PASANTIAS</a></li>
          <li><a class="waves-effect" href="financiamientos">FINANCIAMIENTOS</a></li>
          <li><a class="waves-effect" href="docs">DOCUMENTOS</a></li>
        </ul>
      </nav>
      <ul class="dropdown-content" id="oficinas">
        @foreach($oficinas as $oficina)
        <li><a href="oficina?id={{$oficina->id}}">{{$oficina->nombre}}</a></li>
        @endforeach
      </ul>
      <ul class="dropdown-content" id="proyectos">
        <li><a href="proyectos">Docentes</a></li>
        <li><a href="proyectos">Semilleros de Investigación</a></li>
        <li><a href="proyectos">Grupos de Investigaciòn VRINV</a></li>
        <li><a href="proyectos">Investigaciones Regina</a></li>
      </ul>
    </header>