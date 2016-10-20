<?php
    require("connection.php");
    $connection=connect();
    if(isset($_POST["Categoria"])){
        $idCategoria=$_POST["Categoria"];
        $query="select * from categoria where IdCategory='".$idCategoria."';";
        $result=$connection -> query($query);
        $row=$result->fetch_array(MYSQLI_ASSOC);
        $html= "<ul class='breadcrumb'>
                                            <li><a onclick='mostrarProductos(1,false)'>Productos</a></li>
                                            <li class='active'>$row[Nombre]</li>
                                            </ul>
                                        <div class='well well-small'>";
                                        $query="select producto.*,imagen.* from producto,imagen where imagen.Index='1' and producto.IdCategoria='".$idCategoria."' and producto.IdProducto=imagen.IdProducto;";
                                        $result=$connection -> query($query);
                                        $i=0;
                                        while($row=$result->fetch_array(MYSQLI_ASSOC)){
                                            if($i%3==0){
                                                $html.= "<div class='row-fluid'><ul class='thumbnails'>";
                                            }
                                            $html.= "
                                                
                                                    <li class='span4'>
                                                        <div class='thumbnail'>
                                                            <a onclick='mostrarDetalle($row[IdProducto])' class='overlay'></a>
                                                            <a class='zoomTool' onclick='mostrarDetalle($row[IdProducto])' title='add to cart'><span class='icon-search'></span>DETALLES</a>
                                                            <a onclick='mostrarDetalle($row[IdProducto])'><img src='./images/productos/$row[UrlImagen]' alt=''></a>
                                                            <div class='caption cntr'>
                                                                <p>$row[Nombre]</p>
                                                                <p><strong>$$row[Precio]</strong></p>
                                                                <h4><a class='shopBtn' onclick='agregarCarrito($row[IdProducto])' title='add to cart'> Añadir al Carrito </a></h4>
                                                                <br class='clr'>
                                                            </div>
                                                        </div>
                                                    </li>
                                                
                                                ";
                                            $i++;
                                            if($i%3==0&&i>0){
                                                $html.= "</ul></div>";
                                            }
                                        }
                                        if($i%3!=0){
                                            $html.="</ul></div>";
                                        }
                                        $html.= "</div>";
        echo json_encode(array('html'=>$html));
    }else{
        if(isset($_POST["Pagina"])){
            $pagina=$_POST["Pagina"];
            $resultados=($pagina-1)*9;
        $html= "<ul class='breadcrumb'>
                                            <li><a onclick='mostrarProductos(1,false)'>Productos</a> <span class='divider'>/</span></li>
                                            </ul>
                                        <div class='well well-small'>";
                                        $query="select producto.*,imagen.* from producto,imagen where imagen.Index='1' and producto.IdProducto=imagen.IdProducto limit ".$resultados.",9;";
                                        $result=$connection -> query($query);
                                        $i=0;
                                        while($row=$result->fetch_array(MYSQLI_ASSOC)){
                                            if($i%3==0){
                                                $html.= "<div class='row-fluid'><ul class='thumbnails'>";
                                            }
                                            $html.= "
                                                    <li class='span4'>
                                                        <div class='thumbnail'>
                                                            <a onclcick='mostrarDetalle($row[IdProducto])' class='overlay'></a>
                                                            <a class='zoomTool' onclick='mostrarDetalle($row[IdProducto])' title='add to cart'><span class='icon-search'></span>DETALLES</a>
                                                            <a onclick'mostrarDetalle($row[IdProducto])'><img src='./images/productos/$row[UrlImagen]' alt=''></a>
                                                            <div class='caption cntr'>
                                                                <p>$row[Nombre]</p>
                                                                <p><strong>$$row[Precio]</strong></p>
                                                                <h4><a class='shopBtn' onclick='agregarCarrito($row[IdProducto])' title='add to cart'> Añadir al Carrito </a></h4>
                                                                <br class='clr'>
                                                            </div>
                                                        </div>
                                                    </li>
                                                ";
                                            $i++;
                                            if($i%3==0&&i>0){
                                                $html.= "</ul></div>";
                                            }
                                        }
                                        if($i%3!=0){
                                            $html.="</ul></div>";
                                        }
                                        $html.= "</div>";
        echo json_encode(array('html'=>$html));
        }
    }
?>