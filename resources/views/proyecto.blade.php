@include('include.head')
    
    @include('include.pre-menu')
    @include('include.menu')
    @include('include.menu-mobile')
    @include('include.slider')
    <!--Cuerpo-->
    <div class="row cuerpo">
      <div class="col s12 l9">
        <div class="row titulo">
          <h4 class="center">{{$proyecto->titulo}}</h4>
        </div>
        <div class="row noticia card">
            <p>Responsables:</p>
            <ul>
	            @foreach($proyecto->responsables as $responsable)
            		<li>- {{$responsable->completo()}}</li>
	            @endforeach
            </ul>
        </div>
         <div class="row noticia card">
            <p>{!!$proyecto->informacion!!}</p>
        </div>
      </div>
      <div class="col s12 l3">
        @include('include.fb_lateral')
      </div>
    </div>
    @include('include.footer')
  </body>
</html>