@include('include.head-admin')
    
    @include('include.pre-menu-admin')
    @include('include.menu-admin')
    @include('include.menu-admin-mobile')
    <!--Cuerpo-->
    <div class="row cuerpo-admin">
      <div class="row titulo center">
        <h4>PESTAÑAS</h4>
      </div>
        <div class="row">
            <a href="menu-formulario" class="btn-floating btn-large waves-effect red"><i class="material-icons">add</i></a>
            <div class="col s10 offset-s1 tabla">
             <table class="centered striped responsive-table">
               <thead>
                 <th>N</th>
                 <th>Nombre</th>
                 <th>Editar</th>	
               </thead>
               <tbody id="filas">
                 @forelse($menus as $menu)
                    <tr id="fila{{$menu->id}}">
                       <td>{{$w = $w + 1}}</td>
                       <td>{{$menu->nombre}}</td>
                       <td><a href="menu-formulario?id={{$menu->id}}" class="btn green"><i class="material-icons">edit</i></a></td>
                     </tr>
                 @empty
                     <tr id="filaempty">
                         <td colspan="6">No hay pestañas</td>
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