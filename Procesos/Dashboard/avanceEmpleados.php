<?php
    require("../connection.php");
    $connection=connect();
    $query="select concat(u.Nombre,' ',u.Apellido) as nombreEmpleado,count(*) as abiertos, (select count(*) 
	from venta
	where venta.IdEstadoVenta in(3,4) and venta.IdUsuarioEmpleado=u.IdUsuario
	group by u.IdUsuario
) as terminados
from venta,usuario as u 
where u.IdTipoUsuario=2 and venta.IdEstadoVenta!=1 and venta.IdUsuarioEmpleado=u.IdUsuario
group by u.IdUsuario;";
    $row=$connection->query($query);
    $cols[]=array("id"=>"Empleado","label"=>"Empleado","type"=>"string");
    $cols[]=array("id"=>"Abiertos","label"=>"Abiertos","type"=>"number");
    $cols[]=array("id"=>"Terminados","label"=>"Terminados","type"=>"number");
    $rows=array();
    while($result=$row->fetch_array(MYSQLI_ASSOC)){
        $temp=array();
        $temp[]=array('v'=>$result["nombreEmpleado"]);
        $temp[]=array('v'=>$result["abiertos"]);
        $temp[]=array('v'=>$result["terminados"]);
        $rows[]=array('c'=>$temp);
    }
    echo json_encode(array("cols"=>$cols,"rows"=>$rows));
?>