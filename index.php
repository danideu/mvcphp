<?php
/*
En el htaccess hemos indicado que todo lo que venga después de index.php, se guarde en la variabla $url. Por tanto lo primero que hacemos es recoger esta variable para poder tratar los datos.
*/

require_once("Config/Config.php");

//Si viene vacía la URL es que está en la home, por tanto la variable tendrá valor home/home, en caso contrario se le asigna lo que venga.
$url = !empty($_GET['url']) ? $_GET['url'] : 'home/home';
$arrUrl = explode('/',$url); //Separamos mediante el indicador "/" en un array todo el contenido 
$controller = $arrUrl[0]; //Guardamos la parte de cotrolador, que es la primera cadena
$method = $arrUrl[0]; //Guardamos el método. ya después si está relleno se reemplazará
$params = '';

//Tratamos el MÉTODO.
if(!empty($arrUrl[1])){
    if($arrUrl[1] != ''){
        $method = $arrUrl[1];
    }
}

//Tratamos los parámetros después del método.
if(!empty($arrUrl[2])){
    if ($arrUrl[2] != ''){
        for ($i=2; $i < count($arrUrl) ; $i++) { 
            $params .= $arrUrl[$i] . ',';
        }
        //Eliminamos la última coma 
        $params = trim($params,',');
    }
}

require_once("Libraries/Core/Autoload.php");
require_once("Libraries/Core/Load.php");

?>
