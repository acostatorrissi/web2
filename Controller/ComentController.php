<?php

    require_once "Model/CommentModel.php";
    require_once "./api/ApiController.php";

    //falta hacer el model de comentarios

    class ComentController extends ApiController{
        
        function __construct(){
            parent::__construct();
            $this->model = new ComentModel();
        }

        function ComentCSR($params = null){
            $this->view->showComentCSR();
        } //llama a la vista


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

            $texto = $body->text;
            $ranking = $body->ranking;
            $usser = $body->id_usser;
            $producto = $body->id_producto;

            //se lo mando al modelo
            $id = $this->model->add($texto, $ranking, $usser, $producto);
            if($id > 0){
                $this->$view->response($this->model->getComent($id), 200);
                //generalmente cuando se hace insert en API devuelve la tarea
            }else{
                $this->$view->response("No se pudo insertar el comentario con el id=$id no existe", 500);
            }
        }
    
    }

   