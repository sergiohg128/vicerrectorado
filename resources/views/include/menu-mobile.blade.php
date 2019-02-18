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
        <div class="collapsible-header waves-effect">PROYECTOS</div>
        <div class="collapsible-body waves-effect">
          @foreach($tiposgrupo as $tipogrupo)
            <li><a href="proyectos?t={{$tipogrupo->id}}">{{$tipogrupo->nombre}}</a></li>
          @endforeach
          
        </div>
      </li>
      <div class="divider"></div>
      <li><a class="collapsible-header waves-effect" href="pasantias">PASANTIAS</a></li>
      <div class="divider"></div>
      <li><a class="collapsible-header waves-effect" href="financiamiento">FINANCIAMIENTO</a></li>
      <div class="divider"></div>
      <li><a class="collapsible-header waves-effect" href="docs">DOCUMENTOS</a></li>
      <div class="divider"></div><li>
        <div class="collapsible-header waves-effect">BOLETINES</div>
        <div class="collapsible-body waves-effect">
          @foreach($boletines as $boletin)
            <li><a target="_blank" href="oficinas/{{$boletin->id_oficina}}/publicaciones/{{$boletin->id}}b.{{$boletin->archivo}}">{{$boletin->titulo}}</a></li>
          @endforeach
        </div>
      </li>
    </ul>