<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
  padding: 20px;
  font-family: Arial;
}

/* Center website */
.main {
  max-width: 1000px;
  margin: auto;
}

h1 {
  font-size: 50px;
 
  background-color: #147076;
  color: white;
  font-family: serif;
  padding: 5px 5px;
  margin-top: -20px;
  
}

.row {
  margin: 10px -16px;
}

/* Add padding BETWEEN each column */
.row,
.row > .column {
  padding: 8px;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.3%;
  display: none; /* Hide all elements by default */
}

/* Clear floats after rows */ 
/*.row:after {
  content: "";
  display: table;
  clear: both;
}*/

/* Content */
.content {
  background-color: white;
  padding: 10px;
}

/* The "show" class is added to the filtered elements */
.show {
  display: block;
}

/* Style the buttons */
.btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: white;
  cursor: pointer;
}

.btn:hover {
  background-color: #ddd;
}

.btn.active {
  background-color: #666;
  color: white;
}
body{
        background: url(../img/8.jpg)no-repeat center center fixed;
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<h1>Lista de articulos en venta</h1>
<button type="button" class="btn btn-outline-primary"><a class="nav-link" href="{{ route('producto.create') }}">Nuevo Producto</a></button>
<div id="myBtnContainer">
</div>
    
    <div class="row">
@foreach($products as $product)
    
<div class="column nature">

  <div class="content">
  
  
      <h4><center>{{$product->nombre}}</center></h4>
    <center><img src="img/{{$product->imagen}}" width="50%" alt=""</center>
      
      <center>{{$product->descripcion}}</center>
      <p><center><strong>Precio :  </strong>{{$product->precio}}</center></p>
      
     <a name=href="{{ route('producto.edit', $product) }}" class="btn btn-warning">Editar</a> 
     <a name=href="{{ route('producto.edit', $product) }}" class="btn btn-warning">Eliminar</a> 

      
   

    </div>
  
    </div>
     

@endforeach
  </div>
<script>
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}


// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>