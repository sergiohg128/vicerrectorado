@include('include.head')
    
    @include('include.pre-menu')
    @include('include.menu')
    @include('include.menu-mobile')
    @include('include.slider')
    <!--Cuerpo-->
    <div class="row cuerpo">
      <div class="col s12 l9">
        <div class="row titulo">
          <h4 class="center">NOTICIAS</h4>
        </div>
        @foreach($publicaciones as $publicacion)
        <div class="row noticia card">
          <div class="col s5"><img src="oficinas/{{$publicacion->id_oficina}}/publicaciones/{{$publicacion->id}}a.{{$publicacion->imagen}}"></div>
          <div class="col s7">
            <h5>{{$publicacion->titulo}}</h5>
            <p>{{$publicacion->corta}}</p>
            <a href="publicacion?id={{$publicacion->id}}">
              <button class="btn right">VER NOTICIA<i class="material-icons right">input</i></button></a>
          </div>
        </div>
        @endforeach
        <div class="row center">
          {{ $publicaciones->links() }}
        </div>
      </div>
      <div class="col s12 l3">
        @include('include.fb_lateral')
      </div>
    </div>
    @include('include.footer')
  </body>
</html>