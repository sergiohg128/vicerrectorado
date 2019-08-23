<!--Menú-->
    <header class="navbar">
      <!--MENÚ WEB-->
      <nav class="nav-wrapper"><a class="button-collapse left" data-activates="mobile-menu" href="#"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down" id="nav-mobile">
          @if($usuario->id_oficina=="1")
            <li><a class="waves-effect" href="noticias">NOTICIAS</a></li>
            <li><a class="waves-effect" href="pasantias">PASANTIAS</a></li>
            <li><a class="waves-effect" href="financiamientos">FINANCIAMIENTOS</a></li>
            <li><a class="waves-effect" href="documentos">DOCUMENTOS</a></li>
          @else
            <li><a class="waves-effect" href="menus">PESTAÑAS</a></li>
          @endif
          <li>
            <a data-activates="dropdown_cuenta" class="dropdown-button waves-effect">
                CUENTA
                <i class="material-icons right">arrow_drop_down</i>
            </a>
            <ul id="dropdown_cuenta" class="dropdown-content">
                <li><a href="pass" class="waves-effect">CAMBIAR CONTRASEÑA</a></li>
                <li><a href="logout" class="waves-effect">SALIR</a></li>
            </ul>
        </li>
        </ul>
      </nav>
    </header>