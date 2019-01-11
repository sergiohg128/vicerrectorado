@include('include.head')
    
    @include('include.pre-menu')
    @include('include.menu')
    @include('include.menu-mobile')
    @include('include.slider')
    <!--Cuerpo-->
    <div class="row cuerpo oficina">
      <div class="col s12 l9">
        <div class="row titulo">
          <h4 class="center">{{$oficina->nombre}}</h4>
        </div>
        <div class="col s3 collec">
          <div class="collection">
            @foreach($menus as $menu)
              <a href="oficina?id=7&m={{$menu->id}}" class="collection-item @if($menu->id==$idmenu) active @endif">{{$menu->nombre}}</a>
            @endforeach
          </div>
        </div>
        <div class="col s9 card descripcion">
          {!!$descripcion!!}
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