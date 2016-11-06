<?php
    require("../connection.php");
    $connection=connect();
    $query="select producto.Nombre,sum(ventaproducto.Cantidad) as Cantidad
 from venta,ventaproducto,producto 
where year(venta.Fecha)=year(curdate()) and venta.IdEstadoVenta!=1 and venta.IdVenta=ventaproducto.IdVenta and ventaproducto.IdProducto=producto.IdProducto 
group by producto.IdProducto order by Cantidad desc limit 5;";
    $row=$connection->query($query);
    $cols[]=array("id"=>"Producto","label"=>"Producto","type"=>"string");
    $cols[]=array("id"=>"Cantidad","label"=>"Cantidad","type"=>"number");
    $rows=array();
    while($result=$row->fetch_array(MYSQLI_ASSOC)){
        $temp=array();
        $temp[]=array('v'=>$result["Nombre"]);
        $temp[]=array('v'=>$result["Cantidad"]);
        $rows[]=array('c'=>$temp);
    }
    echo json_encode(array("cols"=>$cols,"rows"=>$rows));
?>