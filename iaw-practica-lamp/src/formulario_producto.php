<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>


<form action="insert_producto.php" method="POST">
    <div>

        <label for="codigo_producto">Codigo Producto:</label>
        <input type="text"id="codigo_producto" name="codigo_producto"></br>

        <label for="nombre_producto">Nombre Producto:</label>
        <input type="text"id="nombre_producto" name="nombre_producto"></br>

        <label for="precio">Precio:</label>
        <input type="number"id="precio" name="precio"></br>

        <label for="nombre_fabricante">Nombre Fabricante:</label>
        <input type="text"id="nombre_fabricante" name="nombre_fabricante"></br>

        <button type="submit" name="submit">Enviar</button> 
            
    </div>

</form>

    
</body>
</html>
