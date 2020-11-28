<?php

    require_once "Model/CommentModel.php";

    //falta hacer el model de comentarios

    class ApiController{
        
        private $model;
        private $view;

        private $data; 

        function __construct(){
            $this->model = new CommentModel();
            $this->view = new ApiView();
            $this->data = file_get_contents("php://input"); 
        }

        function getData(){ /* solo para prueba */
            return json_decode($this->data); 
        }

        /*
        function ComentCSR($params = null){
            $this->view->showComentCSR();
        } //llama a la vista
        */

        public function getComment($params = null){
            $id = $params[':ID'];
            $comment = $this->$model->getComment($id);

            if($comment){
                $this->$view->response($comment, 200);
            }else{
                $this->$view->response("El comentario con el id: $id no existe", 404);
            } 
        }

        public function getAll(){
            $comments = $this->$model->getAll();
            $this->$view->response($comments, 200);
        }


        public function delete($params = null){
            $id = $params[':ID'];
            $success = $this->$model->delete($id);
            if($success > 0){
                $this->$view->response("El comentario con el id=$id se borro exitosamente", 200);
            }else{
                $this->$view->response("El comentario con el id=$id no existe", 404);
            }
           
        }

        public function add(){
            $body = $this->getData();

            //me hago de las valores de la variable que me trae el body

            $texto = $body->text;
            $ranking = $body->ranking;
            $usser = $body->id_usser;
            $producto = $body->id_producto;

            //se lo mando al modelo
            $id = $this->model->add($texto, $ranking, $usser, $producto);
            if($id > 0){
                $this->$view->response($this->model->getComment($id), 200);
                //generalmente cuando se hace insert en API devuelve la tarea
            }else{
                $this->$view->response("No se pudo insertar el comentario con el id=$id no existe", 500);
            }
        }

        function getCommentsOfProduct($params = null){
            $id_producto = $params[':ID'];
            $comment = $this->model->getCommentsOfProduct($id_producto);

            if($comment)
                $this->view->response($comment, 200);
            else
                $this->view->response($comment, 404);
        }
    
    }

   