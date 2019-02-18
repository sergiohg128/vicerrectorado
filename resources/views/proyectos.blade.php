@include('include.head')
    
    @include('include.pre-menu')
    @include('include.menu')
    @include('include.menu-mobile')
    @include('include.slider')
    <!--Cuerpo-->
    <div class="row cuerpo">
      <div class="col s12 l9">
        <div class="row titulo">
          <h4 class="center">PROYECTOS</h4>
        </div>
        @foreach($proyectos as $proyecto)
        <div class="row noticia card">
          <div class="col s12">
            <h5>{{$proyecto->titulo}}</h5>
            <p>Responsables:</p>
            <ul>
	            @foreach($proyecto->responsables as $responsable)
            		<li>- {{$responsable->completo()}}</li>
	            @endforeach
            </ul>
            <a href="proyecto?id={{$proyecto->id}}">
              <button class="btn right">VER PROYECTO<i class="material-icons right">input</i></button>
          </a>
          </div>
        </div>
        @endforeach
        <div class="row center">
          {{ $proyectos->links() }}
        </div>
      </div>
      <div class="col s12 l3">
        @include('include.fb_lateral')
      </div>
    </div>
    @include('include.footer')
  </body>
</html>