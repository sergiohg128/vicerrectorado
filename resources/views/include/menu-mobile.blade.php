<ul class="collapsible side-nav" id="mobile-menu" data-collapsible="accordion">
      <li><a class="collapsible-header waves-effect" href="unidades">INICIO</a></li>
      <div class="divider"></div>
      <li>
        <div class="collapsible-header waves-effect" href="oficinas">OFICINAS</div>
        <div class="collapsible-body waves-effect">
          @foreach($oficinas as $oficina)
            <li><a href="oficina?id={{$oficina->id}}">{{$oficina->nombre}}</a></li>
          @endforeach
        </div>
      </li>
      <div class="divider"></div>
      <li>
        <div class="collapsible-header waves-effect" href="oficinas">PROYECTOS</div>
        <div class="collapsible-body waves-effect">
          <li><a href="proyectos">Docentes</a></li>
          <li><a href="proyectos">Semilleros de Investigación</a></li>
          <li><a href="proyectos">Grupos de Investigaciòn VRINV</a></li>
          <li><a href="proyectos">Investigaciones Regina</a></li>
        </div>
      </li>
      <div class="divider"></div>
      <li><a class="collapsible-header waves-effect" href="pasantias">PASANTIAS</a></li>
      <div class="divider"></div>
      <li><a class="collapsible-header waves-effect" href="financiamiento">FINANCIAMIENTO</a></li>
      <div class="divider"></div>
      <li><a class="collapsible-header waves-effect" href="docs">DOCUMENTOS</a></li>
      <div class="divider"></div>
    </ul>