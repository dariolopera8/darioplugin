<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Api GET - POST Dario Lopera</title>
</head>
<body>
    <!-- <form action="https://dariolopera.informaticailiberis.com/wordpress/wp-json/wp/v2/posts" method="GET">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form> -->
    <?php
        $url = "https://dariolopera.informaticailiberis.com/wordpress/wp-json/wp/v2/posts";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
        "Authorization: Basic ".base64_encode('dariolopera8:Toor_2020'),
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $resp = curl_exec($curl);
        curl_close($curl);
        $decodedRecords = json_decode($resp);
        $array = json_decode(json_encode($decodedRecords), true);

        if(isset($_POST['agregar'])){
            curl_setopt($curl, CURLOPT_POSTFIELDS,
            "postvar1=value1&postvar2=value2&postvar3=value3");
        }
    ?>

    <table class="table table-ligth">
        <thead class="thead-light">
            <tr>
                <th>Titulo</th>
                <th>Contenido</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <form action="" method="POST">
                <?php for($i = 0; $i < count($array); $i++ ) { ?>
                    <tr>
                        <td><p><?php echo($array[$i]['title']['rendered']); ?></p></td>
                        <td><p><?php echo($array[$i]['content']['rendered']); ?></p></td>
                        <td><input type="submit" value="Actualizar" name="actualizar"></td>
                        <td><input type="submit" value="Borrar" name="borrar"></td>
                    </tr>
                <?php } ?>
            </form>
            <form action="" method="POST">
                <tr>
                    <td><input type="text" name="titulo" id=""></td>
                    <td><input type="text" name="contenido" id=""></td>
                    <td><input type="submit" value="Agregar" name="agregar"></td>
                </tr>
            </form>
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>#</th>
            </tr>
        </tfoot>
    </table>l
</body>
</html>