@include('include.head')
    
    @include('include.menu')
    @include('include.menu-mobile')
    @include('include.slider')
    <!--Cuerpo-->
    <div class="row cuerpo">
      <div class="col s12 l9">
        <div class="row titulo">
          <h4 class="center">DOCUMENTOS</h4>
        </div>
        <div class="row noticia card">
          <div class="col s12">
            <h5>MOF - VRINV</h5>
            <p>Descripción corta del documento</p><a target="_blank" href="oficinas/1/publicaciones/1.pdf">
              <button class="btn right">VER DOCUMENTO<i class="material-icons right">input</i></button></a>
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