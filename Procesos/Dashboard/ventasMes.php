<?php
    require("../connection.php");
    $connection=connect();
    $query="select monthname(str_to_date(m.month,'%m')) as Mes, IFNULL(sum(pago.Monto),0) as totalMensual from (
SELECT '01' AS
MONTH
UNION SELECT '02' AS
MONTH
UNION SELECT '03' AS
MONTH
UNION SELECT '04' AS
MONTH
UNION SELECT '05' AS
MONTH
UNION SELECT '06' AS
MONTH
UNION SELECT '07' AS
MONTH
UNION SELECT '08' AS
MONTH
UNION SELECT '09' AS
MONTH
UNION SELECT '10' AS
MONTH
UNION SELECT '11' AS
MONTH
UNION SELECT '12' AS
MONTH
) AS m left join pago on month(pago.Fecha)=month(str_to_date(concat(m.month,year(curdate())),'%m %Y')) and year(pago.Fecha)=year(curdate())	
group by m.month;";
    $row=$connection->query($query);
    $cols[]=array("id"=>"Mes","label"=>"Mes","type"=>"string");
    $cols[]=array("id"=>"Ventas","label"=>"Ventas","type"=>"number");
    $rows=array();
    while($result=$row->fetch_array(MYSQLI_ASSOC)){
        $temp=array();
        $temp[]=array('v'=>$result["Mes"]);
        $temp[]=array('v'=>$result["totalMensual"]);
        $rows[]=array('c'=>$temp);
    }
    echo json_encode(array("cols"=>$cols,"rows"=>$rows));
?>