<ul class="collapsible side-nav" id="mobile-menu" data-collapsible="accordion">
      @if($usuario->id_oficina=="1")
            <li><a class="collapsible-header waves-effect" href="noticias">NOTICIAS</a></li>
            <div class="divider"></div>
            <li><a class="collapsible-header waves-effect" href="pasantias">PASANTIAS</a></li>
            <div class="divider"></div>
            <li><a class="collapsible-header waves-effect" href="financiamiento">FINANCIAMIENTO</a></li>
            <div class="divider"></div>
            <li><a class="collapsible-header waves-effect" href="documentos">DOCUMENTOS</a></li>
            <div class="divider"></div>
      @else
            <li><a class="collapsible-header waves-effect" href="noticias">PESTAÑAS</a></li>
            <div class="divider"></div>
      @endif
      <li><a class="collapsible-header waves-effect" href="logout">SALIR</a></li>
      <div class="divider"></div>
    </ul>