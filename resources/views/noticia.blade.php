@include('include.head-publicacion')
    
    @include('include.pre-menu')
    @include('include.menu')
    @include('include.menu-mobile')
    @include('include.slider')
    <!--Cuerpo-->
    <div class="row cuerpo">
      <div class="col s12 l9">
        <div class="row titulo">
          <h4 class="center">{{$publicacion->titulo}}</h4>
        </div>
        <div class="row noticia card">
          <div class="row center">
            <img src="oficinas/{{$publicacion->id_oficina}}/publicaciones/{{$publicacion->id}}a.{{$publicacion->imagen}}" class="center" style="max-height: 600px;width: auto;max-width: 100%;margin: auto;">
          </div>
          <div class="row">
            <div class="row right">
              <div class="fb-share-button" data-href="{{$url_base}}publicacion?id={{$publicacion->id}}" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url_base2}}publicacion%3Fid%3D{{$publicacion->id}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></div>
            </div>
          </div>
          <div class="row">
            <p>{!!$publicacion->larga!!}</p>
          </div>
        </div>
      </div>
      <div class="col s12 l3">
        @include('include.fb_lateral')
      </div>
    </div>
    @include('include.footer')
  </body>
</html>