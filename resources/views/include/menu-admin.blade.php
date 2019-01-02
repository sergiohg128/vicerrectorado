<!--Menú-->
    <header class="navbar">
      <!--MENÚ WEB-->
      <nav class="nav-wrapper"><a class="button-collapse left" data-activates="mobile-menu" href="#"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down" id="nav-mobile">
          <li><a class="waves-effect" href="noticias">NOTICIAS</a></li>
          @if($usuario->id_oficina=="1")
          <li><a class="waves-effect" href="pasantias">PASANTIAS</a></li>
          <li><a class="waves-effect" href="financiamientos">FINANCIAMIENTOS</a></li>
          <li><a class="waves-effect" href="documentos">DOCUMENTOS</a></li>
          @endif
          <li><a class="waves-effect" href="logout">SALIR</a></li>
        </ul>
      </nav>
    </header>