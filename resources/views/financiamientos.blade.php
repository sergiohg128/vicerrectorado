@include('include.head')
    
    @include('include.menu')
    @include('include.menu-mobile')
    @include('include.slider')
    <!--Cuerpo-->
    <div class="row cuerpo">
      <div class="col s12 l9">
        <div class="row titulo">
          <h4 class="center">FINANCIAMIENTOS</h4>
        </div>
        <div class="row noticia card">
          <div class="col s5"><img src="../img/portada1.jpg"></div>
          <div class="col s7">
            <h5>Titulo de noticia</h5>
            <p>Descripción corta de noticia</p>
            <p>Descripción corta de noticia</p>
            <p>Descripción corta de noticia</p><a href="noticia.html">
              <button class="btn right">VER NOTICIA<i class="material-icons right">input</i></button></a>
          </div>
        </div>
        <div class="row noticia card">
          <div class="col s5"><img src="../img/portada2.jpg"></div>
          <div class="col s7">
            <h5>Titulo de noticia</h5>
            <p>Descripción corta de noticia</p>
            <p>Descripción corta de noticia</p>
            <p>Descripción corta de noticia</p><a href="noticia.html">
              <button class="btn right">VER NOTICIA<i class="material-icons right">input</i></button></a>
          </div>
        </div>
        <div class="row noticia card">
          <div class="col s5"><img src="../img/portada3.jpg"></div>
          <div class="col s7">
            <h5>Titulo de noticia</h5>
            <p>Descripción corta de noticia</p>
            <p>Descripción corta de noticia</p>
            <p>Descripción corta de noticia</p><a href="noticia.html">
              <button class="btn right">VER NOTICIA<i class="material-icons right">input</i></button></a>
          </div>
        </div>
      </div>
      <div class="col s12 l3">
        <div class="fb-page" data-href="https://www.facebook.com/VRINV/" data-tabs="timeline" data-height="800" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
          <blockquote class="fb-xfbml-parse-ignore" cite="https://www.facebook.com/VRINV/"><a href="https://www.facebook.com/VRINV/">Vicerrectorado de Investigación UNPRG</a></blockquote>
        </div>
      </div>
    </div>
    @include('include.footer')
  </body>
</html>