@include('include.head-admin')
    
    @include('include.pre-menu-admin')
    @include('include.menu-admin')
    @include('include.menu-admin-mobile')
    <!--Cuerpo-->
    <div class="row cuerpo-admin">
      <div class="row titulo center">
        <h4>PASANTIA</h4>
      </div>
        <div class="row">
        	<form action="publicacion-formulario" method="POST"  enctype="multipart/form-data">
        		{{ csrf_field() }}
        		<input type="hidden" name="modo" value="{{$modo}}">
        		<input type="hidden" name="tipo" value="2">
        		<input type="hidden" name="publicacion" value="{{$publicacion->id}}">
	        	<div class="col s10 offset-s1 m8 offset-m2 l6 offset-l3 card">
		            <div class="col s12 input-field">
			            <label for="titulo">Titulo</label>
			            <input type="text" name="titulo" required id="titulo" value="{{$publicacion->titulo}}" required="true">
		            </div>
		            <div class="col s12 input-field">
			            <label for="fecha">Descripcion Corta</label>
			            <textarea class="materialize-textarea" name="corta" id="corta" required="true">{{$publicacion->corta}}</textarea>
		            </div>
		             <div class="col s12 input-field">
			            <textarea class="materialize-textarea" name="larga" id="larga" required="true">{{$publicacion->larga}}</textarea>     		
		            </div>
		            <div class="col s12">
			            <div class="file-field input-field">
					      <div class="btn">
					        <span>Imagen</span>
					        <input type="file" name="imagen" @if($modo=="nuevo")  required="true" @endif>
					      </div>
					      <div class="file-path-wrapper">
					        <input class="file-path validate" type="text" name="arch2">
					      </div>
					    </div>     		
		            </div>
		            
	        	</div>
	            <div class="row center">
	            	<div class="col s12">
	            		<button type="submit" class="btn">GUARDAR</button>	
	            	</div>
	            </div>
        	</form>
        </div>
    </div>
    <script>
    	$("#larga").cleditor(
      {
        height: 500,
        styles:     [["Párrafo", "<p>"], ["Encabezado 1", "<h1>"], ["Encabezado 2", "<h2>"],
                    ["Encabezado 3", "<h3>"],  ["Encabezado 4","<h4>"],  ["Encabezado 5","<h5>"],
                    ["Encabezado 6","<h6>"]],
      }).focus();
    </script>
    @include('include.footer')
  </body>
</html>