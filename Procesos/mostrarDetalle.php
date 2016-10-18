<?php
    require("connection.php");
    $connection=connect();
    $IdProducto=$_POST["IdProducto"];
    $query="select * from producto where IdProducto='".$IdProducto."';";
    $result=$connection -> query($query);
    $row=$result->fetch_array(MYSQLI_ASSOC);
    $html="
    <ul class='breadcrumb'>
        <li><a href='producto.php'>Items</a></li>
        <li class='active'>$row[Nombre]</li>
    </ul>
    <div class='well well-small'>
        <div class='row-fluid''>
            <div class='span5'>
                <div id='myCarousel' class='carousel slide cntr'>
                    <div class='carousel-inner'>";
    $query="select * from imagen where IdProducto='".$IdProducto."';";
    $imgQuery=$connection->query($query);
    $i=0;
    while($imgArray=$imgQuery->fetch_array(MYSQLI_ASSOC)){
        if($i==0){
            $html.="<div class='item active'>";
        }else{
            $html.="<div class='item'>";
        }
        $html.="<a href='#'><img src='./images/productos/$imgArray[UrlImagen]' alt='' style='width:100%'></a></div>";
        $i++;
    }
    $html.="
                    </div>
                    <a class='left carousel-control' href='#myCarousel' data-slide='prev'>‹</a>
                    <a class='right carousel-control' href='#myCarousel' data-slide='next'>›</a>
                </div>
            </div>
            <div class='span7'>
                <h3>$row[Nombre]</h3>
                <hr class='soft' />

                <form onsubmit='agregarCarrito($row[IdProducto],event)' class='form-horizontal qtyFrm'>
                    <div class='control-group'>
                        <label class='control-label'><span>Cantidad</span></label>
                        <div class='controls'>
                            <input id='cantidad' type='number' class='span6' value='1'>
                        </div>
                    </div>

                    <div class='control-group'>
                        <label class='control-label'><span>Precio</span></label>
                        <div class='controls'>
                            <input type='text' disabled class='span6' value='$row[Precio]'>
                        </div>
                    </div>
                    <div class='control-group'>
                        <label class='control-label'><span>Precio de Instalación</span></label>
                        <div class='controls'>
                            <input type='text' disabled class='span6' value='$row[PrecioInstalacion]'>
                        </div>
                    </div>
                    <div class='control-group'>
                        <label class='control-label'><span>Tiempo de Instalación</span></label>
                        <div class='controls'>
                            <input type='text' disabled class='span6' value='$row[tiempoInstalacion] hrs'>
                        </div>
                    </div>
                    <h4>100 items in stock</h4>
                    <p>Descripción del Producto
                    </p>
                    <button type='submit' class='shopBtn'><span class=' icon-shopping-cart'></span>Añadir al Carrito</button>
                </form>
            </div>
        </div>
        <hr class='softn clr' />

    </div>";
        echo json_encode(array('html'=>$html));
?>