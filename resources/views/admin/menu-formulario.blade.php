@include('include.head-admin')
    
    @include('include.pre-menu-admin')
    @include('include.menu-admin')
    @include('include.menu-admin-mobile')
    <!--Cuerpo-->
    <div class="row cuerpo-admin">
      <div class="row titulo center">
        <h4>PESTAÑA</h4>
      </div>
        <div class="row">
        	<form action="menu-formulario" method="POST"  enctype="multipart/form-data">
        		{{ csrf_field() }}
        		<input type="hidden" name="modo" value="{{$modo}}">
        		<input type="hidden" name="menu" value="{{$menu->id}}">
	        	<div class="col s10 offset-s1 card">
		            <div class="col s12 input-field">
			            <label for="titulo">Nombre</label>
			            <input type="text" name="nombre" required id="nombre" value="{{$menu->nombre}}" required="true">
		            </div>
		            <div class="col s12 input-field">
			            <label for="orden">Orden</label>
			            <input type="number" step="1" name="orden" required id="orden" value="{{$menu->orden}}" required="true">
		            </div>
		            <div class="col s12 input-field">
			            
			            <textarea class="materialize-textarea" name="descripcion" id="descripcion" required="true">{{$menu->descripcion}}</textarea>
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
    	$("textarea").cleditor(
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