<?PHP            
    function connect(){
        $servername = "107.180.108.30";
        $username = "adminSithec";
        $password = "Admin\$A2016";
        $database = "sithecdb";
        $conn = new mysqli($servername, $username, $password, $database);
        
       if(mysqli_connect_errno()){
            echo "Error conectando a la base de datos: " . mysqli_connect_error();
            exit();
        }
        else{
            $conn->query("SET NAMES 'utf8'");
            return $conn;
        }
        
    }

    function disconnect($connection){
        $disconnect = mysqli_close($connection);
    }
?>