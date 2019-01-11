@include('include.head-admin')
    
    @include('include.pre-menu-admin')
    @include('include.menu-admin')
    @include('include.menu-admin-mobile')
    <!--Cuerpo-->
    <div class="row cuerpo-admin">
      <div class="row titulo center">
        <h4>PASANTIAS</h4>
      </div>
        <div class="row">
            <a href="pasantia-formulario" class="btn-floating btn-large waves-effect red"><i class="material-icons">add</i></a>
            <div class="col s10 offset-s1 tabla">
             <table class="centered striped responsive-table">
               <thead>
                 <th>N</th>
                 <th>Titulo</th>
                 <th>Descripcion corta</th>
                 <th>Vistas</th>
                 <th>Fecha</th>
                 <th>Editar</th>	
               </thead>
               <tbody id="filas">
                 @forelse($publicaciones as $publicacion)
                    <tr id="fila{{$publicacion->id}}">
                       <td>{{$w = $w + 1}}</td>
                       <td>{{$publicacion->titulo}}</td>
                       <td>{{$publicacion->corta}}</td>
                       <td>{{$publicacion->vistas}}</td>
                       <td>{{date('d/m/Y',strtotime($publicacion->fecha))}}</td>
                       <td><a href="pasantia-formulario?id={{$publicacion->id}}" class="btn green"><i class="material-icons">edit</i></a></td>
                     </tr>
                 @empty
                     <tr id="filaempty">
                         <td colspan="6">No hay pasantias</td>
                     </tr>
                 @endforelse
               </tbody>
             </table>
           </div> 
        </div>
    </div>
    @include('include.footer')
  </body>
</html>