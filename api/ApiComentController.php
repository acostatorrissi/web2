<?php

    require_once "Model/ComentModel.php";
    require_once "ApiController.php";

    //falta hacer el model de comentarios

    class ApiComentController extends ApiController{
        
        function __construct(){
            parent::__construct();
            $this->model = new ComentModel();
        }

        public function getAll($params = null){
            $parametros = [];

            //REVEER ESTO
            if(isset($_GET['sort'])){
                $parametros['sort'] = $_GET['sort'];
            }
            if(isset($_GET['order'])){
                $parametros['order'] = $_GET['order'];
            }

            $coments = $this->$model->getAll($parametros);
            $this->$view->response($coments);
        }

        public function getComent($params = null){
            $idComent = $params[':ID'];
            $coment = $this->$model->getComent($idComent);
            if($coment){
                $this->$view->response($coment, 200);
            }else{
                $this->$view->response("El comentario con el id=$idComent no existe", 404);
            } 
        }

        public function delete($params = null){
            $idComent = $params[':ID'];
            $success = $this->$model->delete($idComent);
            if($success > 0){
                $this->$view->response("El comentario con el id=$idComent se borro exitosamente", 200);
            }else{
                $this->$view->response("El comentario con el id=$idComent no existe", 404);
            }
           
        }

        public function add(){
            $body = $this->getData();

            //me hago de las valores de la variable que me trae el body

            $text = $body->text;
            $ranking = $body->ranking;

            //se lo mando al modelo
            $id = $this->model->add($text, $ranking);
            if($id > 0){
                $this->$view->response($this->model->getComent($id), 200);
                //generalmente cuando se hace insert en API devuelve la tarea
            }else{
                $this->$view->response("No se pudo insertar el comentario con el id=$id no existe", 500);
            }
        }

        public function update($params = null){
            $idComent = $params[':ID'];
            $body = $this->getData();
     
            $title = $body->title;
            $text = $body->text;
            $ranking = $body->ranking;

            $coment = $this->model->getComent($idComent);
            if(empty($coment)){
                $this->$view->response("El comentario con el id=$idComent no existe", 404);
            }else{
                $success = $this->model->update($text, $ranking, $idComent);

                if($success > 0){
                    $this->$view->response($this->model->getComent($id), 200);
                }else{
                    $this->$view->response("El comentario con el id=$idComent no fue actualizado", 204);
                }
            }
           
        }
    }