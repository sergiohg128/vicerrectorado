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
            <a href="pestaña-formulario" class="btn-floating btn-large waves-effect red"><i class="material-icons">add</i></a>
            <div class="col s10 offset-s1 tabla">
             <table class="centered striped responsive-table">
               <thead>
                 <th>N</th>
                 <th>Nombre</th>
                 <th>Editar</th>	
               </thead>
               <tbody id="filas">
                 @forelse($pestañas as $pestaña)
                    <tr id="fila{{$pestaña->id}}">
                       <td>{{$w = $w + 1}}</td>
                       <td>{{$pestaña->nombre}}</td>
                       <td><a href="noticia-formulario?id={{$pestaña->id}}" class="btn green"><i class="material-icons">edit</i></a></td>
                     </tr>
                 @empty
                     <tr id="filaempty">
                         <td colspan="6">No hay noticias</td>
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