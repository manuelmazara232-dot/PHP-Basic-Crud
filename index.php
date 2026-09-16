<html lang="en">

<head>


    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo crud</title>
</head>

<body>
    <?php 
        require_once("script.php");
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["GuardarUsuario"]))
            {
                $nuevosDatos =[
                    'ID' => manageID(),
                    'nombre' => $_POST['nombre'] ?? 'No hay nombre',
                    'edad' => $_POST['edad'] ??'No hay edad',
                    'correo' => $_POST['correo'] ??'No hay correo'
                ] ;
                add_element($nuevosDatos);
                
            }
     if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["EliminarUsuario"])){
                            $idelimin =intval($_POST['id_eliminar']);
                            delUser($idelimin);}
     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['EditarUsuario']) ){
          $idedit = intval($_POST['ID']);
     $nuevosDatos =[
                    'ID' => $idedit,   
                    'nombre' => $_POST['nombre'] ?? 'No hay nombre',
                    'edad' => $_POST['edad'] ??'No hay edad',
                    'correo' => $_POST['correo'] ??'No hay correo'
                ] ;
     editContact($idedit, $nuevosDatos);
    }
                        
        ?>
    <h2>Pagina demo de registros</h2>
    <hr>
    <div name="formContainer" class="formContainer">

        <form action="" method="POST" class="userForm">
            <div class="btnContainer">
                <div class="nameAgeContainer">
                    <div class="nameContainer"><input required type="text" placeholder="Ingrese su nombre" class="largefield genericField" name="nombre"></div>
                    <div class="ageContainer"><input required type="number" placeholder="Edad" class="thinField genericField" min="0" name="edad"></div>
                </div>
                <div class="emailContainer"><input required type="email" placeholder="Ingrese su correo" name="correo" class="largefield"></div>
                <div class="cancelBtnContainer"><input type="button" class="clearBtn genericBtn" value="Cancelar"></div>
                <div class="sbmitContainer"><input type="submit" name="GuardarUsuario" class="genericBtn submitBtn"></div>
            </div>
        </form>

    </div>



    <div>
        <table>
            <thead>
                <tr>
                    <th class="contactsTH">
                        ID
                    </th>
                    <th class="contactsTH">nombre</th>
                    <th class="contactsTH">edad</th>
                    <th class="contactsTH">email</th>
                    <th class="contactsTH">acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php 
foreach($json as $user):
?>
                <tr>
                    <td class="contactsTD">
                        <?php echo $user['ID'] ?>
                    </td>
                    <td class="contactsTD">
                        <?php  echo $user['nombre'] ?>
                    </td>
                    <td class="contactsTD">
                        <?php echo $user['edad'] ?>
                    </td>
                    <td class="contactsTD">
                        <?php echo $user['correo'] ?>
                    </td>
                    <td class="contactsTD">
                        <div>
                            <form action="" method="POST">
                                <input type="hidden" name="id_eliminar" value="<?= $user['ID']; ?>">
                                <input type="submit" name="EliminarUsuario" value="Del">
                            </form>
                        </div>
                        <div>
                            <form action="edit.php" method="POST">
                                <input type="hidden" name="ID" value="<?= $user['ID']; ?>">
                                <input type="submit" name="EditarUsuario" value="Edit">
                            </form>
                        </div>

                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</body>
<script src="script.php"></script>

</html>