<x-app-layout>
    <x-slot name="header">
    <!DOCTYPE html>
<html>
<title>Tienda Virtual L & K</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="{{ asset('css/whatsapp.css')}}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="w3-theme-l5" background="img/9.jpg">


<!-- Navbar -->

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Mi Perfil</a>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:20px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">Mi Perfil</h4>
         <p class="w3-center"><img src="avatar.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Descripcion</p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> Ubicacion</p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i>Fecha de Nacimiento</p>
        </div>
      </div>
      <br>
      
      <!-- Accordion -->
      <div class="w3-card w3-round">
        <div class="w3-white">

        <!-- Codigo Añadido -->  
          <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align">
            <i class="fa fa-user fa-fw w3-margin-right"></i><a href="{{route("categories.index")}}">Categorias</a> </button>
          
        <!-- Codigo Añadido -->

          <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align">
            <i class="fa fa-user fa-fw w3-margin-right"></i><a href="{{route("producto.index")}}">Productos</a> </button>
          
          <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align">
            <i class="fa fa-users fa-fw w3-margin-right"></i><a href="{{route('providers.index')}}">Proveedores</a> </button>
        </div>      
      </div>
      <br>
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
              <h4 class="w3-opacity"><b>Articulos</b></h4>
            </div>
          </div>
        </div>
      </div>
      
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <h4>Articulo</h4>
        <hr class="w3-clear">
      
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">
              
            </div>
            <div class="w3-half">
              <img src="img/mouse.jpg" style="width:100%" alt="mouse" class="w3-margin-bottom">
          </div>
        </div>
        <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Me gusta</button> 
        <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comentarios</button> 
      </div>
      
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <h4>Articulo</h4>
        <hr class="w3-clear">
      
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">
              
            </div>
            <div class="w3-half">
              <img src="img/teclado.jpg" style="width:100%" alt="teclado" class="w3-margin-bottom">
          </div>
        </div>
        <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Me gusta</button> 
        <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comentarios</button> 
      </div>

      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p></p>
          <img src="img/parlante.jpg" alt="Forest" style="width:100%;">

          <p><button class="w3-button w3-block w3-theme-l4">Informacion</button></p>
        </div>
      </div>
      <br>
      
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p></p>
          <img src="img/culer.png" alt="Forest" style="width:100%"><br>
        <p><button class="w3-button w3-block w3-theme-l4">Informacion</button></p>

        </div>
      </div>
      <br>
        
        <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p></p>
          <img src="img/audifonos.jpg" alt="Forest" style="width:100%"><br>
        <p><button class="w3-button w3-block w3-theme-l4">Informacion</button></p>

        </div>
      </div>
      <br>
      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-10">
  <h5>Tienda Virtual Zona Movil</h5>
</footer>

<script>
// Accordion
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-theme-d1";
  } else { 
    x.className = x.className.replace("w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-theme-d1", "");
  }
}
// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>
@yield('contenido')
</body>
</html>

</x-app-layout>