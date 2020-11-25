<?php

    class ApiView{

        /*
         Responde cualquier coleccion de objetos en formato JSON.
        */

        public function response($data){
            header("Content-Type: application/json");
            header("HTTP/1.1 " .$status . " " . $this->requestStatus($status));
            json_encode($data);
        }

        /*
        Asocia un mensaje a un codigo de respuesta.
        */
        private function requestStatus($code){
            $status = array(
                200 => "OK",
                201 => "Created",
                404 => "Not found",
                500 => "Internal Server Error"
            );
            return (isset($status[$code]))? $status[$code] : $status[500];
        }
    }