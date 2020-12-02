<?php

    require_once "api/ApiController.php";
    require_once "Model/CommentModel.php";
    require_once "Helper/AuthHelper.php";
    require_once "Model/ProductModel.php";


    class CommentController extends ApiController{


        function __construct(){
            parent::__construct();
            $this->model = new CommentModel();
        }


        public function getComment($params=null){
            $id = $params[':ID'];
            $comments = $this->model->getCommentsOfProduct($id);
            if($comments || sizeof($comments) == 0){
                $this->view->response($comments, 200);
            }else{
                $this->view->response("No se pudieron cargar los comentarios", 404);
            }
        }

        public function delete($params = null){ //bien
            $id = $params[':ID'];
            $success = $this->model->delete($id);
            if($success > 0 ){
                $this->view->response("El comentario con el id=$id se borro exitosamente", 200);
            }else{
                $this->view->response("El comentario con el id=$id no existe", 404);
            }
        }

        public function add(){ //bien
            $body = $this->getData();
            // if(empty($body->texto) || empty($body->ranking)){
            // }
            //me hago de las valores de la variable que me trae el body
            $id = $this->model->add($body->texto, $body->ranking, $body->id_usser, $body->id_producto);
            $comment = $this->model->commentById($id);
            if($id){
                $this->view->response($comment, 200);
                //generalmente cuando se hace insert en API devuelve la tarea
            }else{
                $this->view->response("No se pudo insertar el comentario", 500);
            }
        }

        /*
        function getCommentsOfProduct($params = null){
            $id_producto = $params[':ID'];
            $comment = $this->model->getCommentsOfProduct($id_producto);

            if($comment)
                $this->view->response($comment, 200);
            else
                $this->view->response($comment, 404);
        }
        */
    
    }

   