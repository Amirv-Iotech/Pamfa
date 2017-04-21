 <?php  
 $hostname_pamfa = "localhost";
$database_pamfa = "iotechda_pamfa";
$username_pamfa = "iotechda_pamfa";
$password_pamfa = "049msE8jcW";



 $connect = mysqli_connect("$hostname_pamfa", "$username_pamfa", "$password_pamfa", "$database_pamfa");

 if (mysqli_connect_errno()) {
      header('Location: http://www.pruebafalla.com/');
     printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}

$mysqli->query("INSERT INTO solicitud(persona,idoperador) VALUES('Anthony','1')");
if(!mysqli->query("INSERT INTO solicitud(persona,idoperador) VALUES('Anthony','1')"))
{
   header('Location: http://www.fallasentencia.com/');

}
/*
 header('Location: http://www.pruebaentra.com/');
         UPDATE `solicitud` SET `persona` = 'anthonys' WHERE `solicitud`.`idsolicitud` = 74; 
  $sql ="UPDATE solicitud SET persona ='$_POST["persona"]'";

  if (!$mysqli->query("UPDATE solicitud SET persona ='$_POST["persona"]'")) {
     header('Location: http://www.pruebafallaconsulta.com/');
    echo "Falló la creación de la tabla: (" . $mysqli->errno . ") " . $mysqli->error;
}
/*
 if(isset($_POST["persona"]) && isset($_POST["idoperador1"]))
 {
  $post_persona = mysqli_real_escape_string($connect, $_POST["persona"]);
  $post_idoperador1 = mysqli_real_escape_string($connect, $_POST["idoperador1"]);
  if($_POST["idsolicitud1"] != '')  
  {  
    //update post  
      $sql ="UPDATE solicitud SET persona = '".$post_persona."', idoperador = '".$post_idoperador1."' WHERE idsolicitud ='".$_POST["idsolicitud1"]."'";
    mysqli_query($conect,$sql);
  }  
  else  
  {  

  $insertSQL = sprintf("INSERT INTO solicitud (fecha, persona, idoperador) VALUES (%s, %s,  %s)",
             GetSQLValueString($_POST['fecha1'], "text"),
             GetSQLValueString($_POST['persona'], "text"),
      GetSQLValueString($_POST['idoperador1'], "text"));
    //insert post  
    $sql = "INSERT INTO tbl_post(post_title, post_description, post_status) VALUES ('".$post_title."', '".$post_description."', 'draft')";  
    mysqli_query($connect, $sql);  
    echo mysqli_insert_id($connect); 

    $sql = "INSERT INTO solicitud (persona, idoperador) VALUES ('".$post_persona."', '".$post_idoperador1."')";
    mysqli_query($conect,$sql);
    echo mysqli_insert_id($conect); 
  }
 }  */
 ?>