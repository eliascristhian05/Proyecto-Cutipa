<style>
body{
        background: url(../img/9.jpg)no-repeat center center fixed;
}
h1 {
  font-size: 50px;
 
  background-color: #147076;
  color: white;
  font-family: serif;
  padding: 5px 5px;
  margin-top: 20px;
  
}
.container{
    width: 440px;
    height: 400px;
    background-image: linear-gradient(rgba(71, 226, 248, 0.62), rgba(124, 224, 239, 0.67), rgba(107, 225, 242, 0.53)); /color/
    color: black;
    top:380px;
    left:680px;
    position: absolute;
    transform: translate(-50%, -50%);
    box-sizing: border-box;
    padding: 50px 30px;
    padding-top: 0%;
   
}
h2{
    top: 10px;
    bottom: -90px;
}


</style>
<h1>
<small class="text-muted"><center>Editar Articulos</center></small>
    </h1>
    <div class="container">
    <h2>
    <form class="form-group" method="post" action="{{route('producto.update', $producto)}}">
@csrf @method('PATCH')
    Nombre:
    <br><input type="text" name="nombre" old value="{{old('nombre',$producto->nombre)}}" size="50">
    <br>Descripcion
    <br><input type="text" name="descripcion" old value="{{old('descripcion',$producto->descripcion)}}" size="50">
    <br>Precio:
    <br><input type="text" name="precio" old value="{{old('precio',$producto->precio)}}" size="50">
    <br>Cantidad:
    <br><input type="text" name="cantidad" value="{{old('cantidad',$producto->cantidad)}}" size="50"><br>
    <br>Imagen:<br>
    <br><input type="file" name="imagen" value="{{old('imagen',$producto->imagen)}}"><br>

    <br><center><button type="submit">Guardar</button></center>
    </div> 
            </h2>
    </form>