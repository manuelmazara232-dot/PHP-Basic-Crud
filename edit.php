<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
   
    <div name="formContainer" class="formContainer">

        <form action="index.php" method="post" class="userForm" name="editForm">
            <input type="hidden" value="<?= $_POST['ID']?>" name="ID">
            <div class="btnContainer">
                <div class="nameAgeContainer">
                    <div class="nameContainer"><input required type="text" placeholder="Ingrese su nombre" class="largefield genericField" name="nombre"></div>
                    <div class="ageContainer"><input required type="number" placeholder="Edad" class="thinField genericField" min="0" name="edad"></div>
                </div>
                <div class="emailContainer"><input required type="email" placeholder="Ingrese su correo" name="correo" class="largefield"></div>
                <div class="cancelBtnContainer"><input type="button" class="clearBtn genericBtn" value="Cancelar"></div>
                <div class="sbmitContainer"><input type="submit" name="EditarUsuario" class="genericBtn submitBtn"></div>
            </div>
        </form>

    </div>
</body>
</html>