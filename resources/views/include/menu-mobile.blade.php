<style>
  
  .side-nav a{
    height: auto !important;
  }
</style>

<ul class="collapsible side-nav" id="mobile-menu" data-collapsible="accordion">
    <li><a class="collapsible-header waves-effect" href="unidades">INICIO</a></li>
    <div class="divider"></div>
    
    <li><a class="collapsible-header waves-effect">OFICINAS</a>
          <div class="collapsible-body">
          <ul>
            @foreach($oficinas as $oficina)
          <li><a href="oficina?id={{$oficina->id}}">{{$oficina->nombre}}</a></li>
              <div class="divider"></div>
        @endforeach
            
          </ul>
        </div>
      </li>

    <div class="divider"></div>
    <li><a class="collapsible-header waves-effect">PROYECTOS</a>
          <div class="collapsible-body">
          <ul>
            @foreach($tiposgrupo as $tipogrupo)
          @if($tipogrupo->id>1)
                <li><a href="proyectos?t={{$tipogrupo->id}}">{{$tipogrupo->nombre}}</a></li>
              <div class="divider"></div>
              @endif
        @endforeach
            
          </ul>
        </div>
      </li>
    <div class="divider"></div>
    <li><a class="collapsible-header waves-effect" href="pasantias">PASANTIAS</a></li>
    <div class="divider"></div>
    <li><a class="collapsible-header waves-effect" href="financiamientos">FINANCIAMIENTOS</a></li>
    <div class="divider"></div>
    <li><a class="collapsible-header waves-effect" href="docs">DOCUMENTOS</a></li>
    <div class="divider"></div>
    <li><a class="collapsible-header waves-effect">BOLETINES</a>
          <div class="collapsible-body">
          <ul>
            @foreach($boletines as $boletin)
                <li><a target="_blank" href="oficinas/{{$boletin->id_oficina}}/publicaciones/{{$boletin->id}}b.{{$boletin->archivo}}">{{$boletin->titulo}}</a></li>
              <div class="divider"></div>
              @endforeach
            
          </ul>
        </div>
      </li>
      <li><a class="collapsible-header waves-effect" href="http://apps.unprg.edu.pe/Selgestiun/" target="_blank">SELGESTIUN</a></li>
    <div class="divider"></div>
  </ul>