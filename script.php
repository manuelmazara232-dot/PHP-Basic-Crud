<?php $json=json_decode(@file_get_contents('Data/Data.json'), true);
function add_element(array $elemento) {
    global $json;
    if (!is_array($json)) {
        $json=array();
    }
    array_push($json, $elemento);
    $guardar=json_encode($json, JSON_PRETTY_PRINT);
    file_put_contents('Data/Data.json', $guardar);
}
function editContact(int $id, array $elemento) {
    global $json;
    $encontrado = false;
    $ideditar = null;
    if (!is_array($json)){ $json = [];};
    foreach($json as $clave => $contacto){
        if ($id == $contacto['ID']) {
            $encontrado = true;
            $ideditar = $clave;
            break;
        }
        
    }
    if($encontrado){
        $json[$ideditar] = $elemento;
        file_put_contents('Data/Data.json', json_encode($json, JSON_PRETTY_PRINT)); 
    }

 }
function delUser(int $id){
    global $json;
    $encontrado = false;
    if (!is_array($json)) {$json=[];}
    
    foreach ($json as $clave => $user) {
        if ($user['ID']==$id) {        
            unset($json[$clave]);
            $encontrado = true;
            
        break;
    }
    }
if ($encontrado) {
$json = array_values($json);
file_put_contents('Data/Data.json', json_encode($json, JSON_PRETTY_PRINT));
}
}

function manageID() {
    global $json;
    $datos = $json;
    $ID = 'ID';
    if(!$json) {
        $json=[];
    }
    usort($datos, function($a, $b) use ($ID) { return $b[$ID] <=> $a[$ID];}); 
    
    return $datos[0]['ID'] + 1;
}

?>