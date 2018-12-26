<div class="slider">
  <ul class="slides">
  	@foreach($slides as $slide)
    <li>
    	<img src="oficinas/{{$oficina->id}}/slides/{{$slide->ruta}}"/>
    	@if($slide->boton != null || $slide->titulo!=null)
      	<div class="caption left-align">
      		@if($slide->boton!=null)
	      		<a>
	        		<button class="btn-large"><i class="material-icons">input</i></button>
	        	</a>
	        @endif
        </div>
        @endif
    </li>
    @endforeach
  </ul>
</div>