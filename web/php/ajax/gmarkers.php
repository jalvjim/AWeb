<?php

header('Content-type: text/html; charset=utf-8');
//includes
include_once '../config-map.php';
include_once '../BD.class.php';
include_once '../functions-map.php'; 

if (isset($_GET["action"])) {
    $action = $_GET["action"];
} else if (isset($_POST["action"])) {
    $action = $_POST["action"];
} else if(isset($_GET['action_opt'])){
    $action_opt = $_GET['action_opt'];
} else {
    exit;
}

$actions_list = array("add-marker", "get-markers", "get-marker-info", "delete-marker", "clear-cache", "generate-cache");

if (isset($action) && in_array($action, $actions_list)) {
    switch ($action) {
        case "add-marker":
/*            $stmt = $dbh->prepare("INSERT INTO " . DB_MARKERS_TABLE . " (title, description, lat, lng, marker_type) VALUES (:title, :description, :lat, :lng, :marker_type)");
            $stmt->bindParam(':title', $_POST["title"]);
            $stmt->bindParam(':description', $_POST["description"]);
            $stmt->bindParam(':lat', $_POST["lat"]);
            $stmt->bindParam(':lng', $_POST["lng"]);
            $stmt->bindParam(':marker_type', $_POST["marker_type"]);
            $stmt->execute();*/

            $response_messages = array();
/*            $response_messages["msg"]["code"] = 0;
            $response_messages["msg"]["text"] = "Data saved.";
            $response_messages["msg"]["post_url"] = HTTP_APP_PATH;
            if(L1_CACHE && !L2_CACHE) {
                generate_cache(true);
            }*/
            print json_encode($response_messages);
            break;
        case "get-markers":
            $sid = (int) $_GET["sid"];
            $zoom = (int) $_GET["zoom"];
            $page = isset($_GET["pagina"]) ? filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT) : 1; 
            $categoria_padre = filter_input(INPUT_GET,'categoria-padre', FILTER_SANITIZE_STRING);
            $categoria_actual = filter_input(INPUT_GET,'categoria-actual', FILTER_SANITIZE_NUMBER_INT);
            $prefijo_categoria = filter_input(INPUT_GET,'prefijo_categoria', FILTER_SANITIZE_STRING);                              
            $content = '';
            $json_clustered = "";
            //check cached data
            /*
            if(L1_CACHE || L2_CACHE) {
                $json_clustered = get_storage_data_by_key(INDEX_CLUSTER_MAP_KEY . $categoria_padre . '_' . $categoria_actual . '_' . $zoom);
            }

            if(strlen($json_clustered)) {
                $json_clustered = (array)json_decode($json_clustered);
                $json_clustered["Rid"] = $sid;
                $json_clustered = json_encode($json_clustered);
                print $json_clustered;
            }*/
            //else {
                $data = array();
                $coords = str_replace('_', '.', $_GET['coords']);
                
                if(L1_CACHE && $zoom <= ZOOM_LIMIT) { //carga todos los puntos. Cambiar ZOOM
                    // $data = get_markers(0, 0, "", $filter);
                    // $data = $data["rows"];
                }
                else {
                    list($swlat, $swlon, $nelat, $nelon) = explode(',', $coords);
                    $data = get_map_markers(0, 0, $page, $swlat, $nelat, $swlon, $nelon,$categoria_padre,$categoria_actual,$prefijo_categoria);
                    $data_top = get_map_markers(0, 1, $page, $swlat, $nelat, $swlon, $nelon,$categoria_padre,$categoria_actual,$prefijo_categoria);
                    if(isset($_GET['ref'])){
                        $ref = filter_input(INPUT_GET,'ref', FILTER_SANITIZE_NUMBER_INT);
                        $content = get_info_marker($ref, $categoria_padre, $categoria_actual,$prefijo_categoria);  
                    } 
                }

                // if (sizeof($data)) { 
/*                if($categoria_padre == 'motor' && $zoom > 13){
                    rand_markers($data);
                }*/
                    $length = count($data);
                    if($zoom < ZOOM_MAX_CLUSTERING)
                        $data = cluster($data, DISTANCE, $zoom);
                    $clustered["EMsg"] = "";
                    $clustered["Msec"] = 185;
                    $clustered["Ok"] = 1;
                    $clustered["Rid"] = $sid;
                    $clustered["Count"] = sizeof($data);
                    $clustered["CountTotal"] = $length;
                    $clustered["Mia"] = 0;
                    $clustered["Top"] = $data_top;
                    $clustered["Content"] = $content;
                    $clustered["Markers"] = array();
                    foreach ($data as $key => $marker) {
                        if (isset($marker[0]) && is_array($marker[0])) {
                            $clustered["Markers"][$key] = array(
                                "I" => (sizeof($marker) == 1 ? $marker[0]['id'] : 0),
                                // "T" => (int)$marker[0]['marker_type'],
                                "X" => $marker[0]['longitud'],
                                "Y" => $marker[0]['latitud'],
                                "C" => sizeof($marker)
                            );
                        } else {
                            $clustered["Markers"][$key] = array(
                                "I" => $marker['id'],
                                // "T" => (int)$marker['marker_type'],
                                "X" => $marker['longitud'],
                                "Y" => $marker['latitud'],
                                "C" => 1
                            );
                        }
                    }
                    $json_clustered = json_encode($clustered);
                    
                // }
                if(L1_CACHE && $zoom <= ZOOM_LIMIT) {
                    // set_storage_data_by_key(INDEX_CLUSTER_MAP_KEY . $zoom . "_filter" . $cache_filter, $json_clustered);
                }
                print $json_clustered;
            //}            
           
            // echo json_encode($data);
            break;
        case "get-marker-info":
            if (isset($_GET["id"],$_GET["categoria-padre"],$_GET["categoria-actual"],$_GET["prefijo_categoria"])) {
                $id_marker = $_GET["id"];
                $categoria_padre = filter_input(INPUT_GET,'categoria-padre', FILTER_SANITIZE_STRING);
                $categoria_actual = filter_input(INPUT_GET,'categoria-actual', FILTER_SANITIZE_NUMBER_INT);  
                $prefijo_categoria = filter_input(INPUT_GET,'prefijo_categoria', FILTER_SANITIZE_STRING);                              
                
                $string = get_info_marker($id_marker,$categoria_padre,$categoria_actual,$prefijo_categoria);
                
                $clustered["EMsg"] = "";
                $clustered["Msec"] = 0;
                $clustered["Ok"] = 1;
                $clustered["Id"] = (int) $_GET["id"];
                $clustered["Rid"] = (int) $_GET["sid"];
                $clustered["Lat"] = 0;
                $clustered["Lon"] = 0;
                $clustered["Type"] = 0;
                $clustered["Content"] = $string;

                print json_encode($clustered);
                
            }
            break;
        case "delete-marker":
 /*           if (isset($_GET["id"])) {
                $sql = "DELETE FROM " . DB_MARKERS_TABLE . " WHERE id = :markerid";
                $stmt = $dbh->prepare($sql);
                $stmt->execute(array(':markerid' => (int) $_GET["id"]));
                if(L1_CACHE && !L2_CACHE) {
                    generate_cache(true);
                }
            }
            header('Location: ' . HTTP_APP_PATH . "/manage.php?msg=marker_deleted");
            exit;*/
            break;
        case "clear-cache":          
/*            BD::conectar();
            $sql = "DELETE FROM " . DB_CACHE_TABLE . " WHERE data_key like ?";
            mysqli_stmt_bind_param($stmt, "s", INDEX_CLUSTER_MAP_KEY . '%');

            if($stmt = mysqli_prepare(BD::get_link(), $sql)){
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);                
            }            
            BD::desconectar();*/
            exit;
            break;
        case "generate-cache":
            // generate_cache(true);
            exit;
            break;
    }
} else {
    
    $actions_opt_list = array('get-models');
    if (in_array($action_opt, $actions_opt_list)) {
        switch ($action_opt) {
            case 'get-models': 
                if(isset($_GET['pct'])){
                    $marca = !empty($_GET['marca']) ? filter_input(INPUT_GET,'marca', FILTER_SANITIZE_STRING) : '';
                    $prefijo_categoria = filter_input(INPUT_GET,'pct', FILTER_SANITIZE_STRING);
                    $grupo = !empty($_GET['grupo']) ? filter_input(INPUT_GET,'grupo', FILTER_SANITIZE_STRING) : '';                            
                    $str = get_models($prefijo_categoria,$marca,$grupo);
                    echo $str;
                }
            break;
            default: break;
        }
    }
    else
        exit;
}






