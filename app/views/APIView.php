<?php
// : _

class APIView {
public function response($data, $status){ //llama el controller para mandar una rta
 header ("Content-Type:application/json"); //avisa que lo que enviamos es un json o el tipo de archivo que mandemos_
 header ("HTTP/1.1/". $status . "" . $this->_requestStatus($status)); // estado
 echo json_encode ($data); //los datos que necesitamos
 }

private function _requestStatus ($code){
    $status = array ( 
    200 => "OK", 
    404 => "Not found",
    500 => "Internal server error",);

    return isset($status[$code]) ? $status[$code]: $status[500];
}

}

