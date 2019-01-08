<footer>
  <div class="footer-copyright blue darken-2">
    <div class="container white-text text-lighten-4">© 2019 Copyright<a class="white-text text-lighten-4 right" href="#!">v1.0</a></div>
  </div>
</footer>
@if($mensaje!=null)
    <script>
        alerta("{{$mensaje}}",5000);
    </script>
@endif