<?php

    require_once "api/ApiController.php";
    require_once "Model/CommentModel.php";
    require_once "Helper/AuthHelper.php";
    require_once "Model/ProductModel.php";


    class CommentController extends ApiController{

        private $helper;
        private $productModel;

        function __construct(){
            parent::__construct();
            $this->model = new CommentModel();
            $this->productModel = new ProductModel();
            $this->helper = new AuthHelper();
        }

        /*
        function ComentCSR($params = null){
            $this->view->showComentCSR();
        } //llama a la vista
        */

        public function getComment($params = null){ //bien
            $id = $params[':ID'];
            $product = $this->productModel->getProductById($id);
            if(empty($product)){
                $this->view->response("El producto con el id: $id no existe", 404);
                die();
            }
            $comment = $this->model->getComment($id);

            if($comment){
                $this->view->response($comment, 200);
            }
        }


        public function delete($params = null){ //bien
            $this->helper->adminCheckLog();
            $id = $params[':ID'];

            $success = $this->model->delete($id);
            if($success > 0){
                $this->view->response("El comentario con el id=$id se borro exitosamente", 200);
            }else{
                $this->view->response("El comentario con el id=$id no existe", 404);
            }
           
        }

        public function add(){ //bien
            $this->helper->checkLog();
            $body = $this->getData();

            //me hago de las valores de la variable que me trae el body

            $texto = $body->text;
            $ranking = $body->ranking;
            $usser = $body->id_usser;
            $producto = $body->id_producto;

            //se lo mando al modelo
            $id = $this->model->add($texto, $ranking, $usser, $producto);
            if($id > 0){
                $this->view->response($this->model->commentById($id), 200);
                //generalmente cuando se hace insert en API devuelve la tarea
            }else{
                $this->view->response("No se pudo insertar el comentario con el id=$id no existe", 500);
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

   