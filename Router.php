<?php
class Router{

    private $get;
    private $post;
    private $controllers;
    private $data;
    private $request;
    private $actions;

    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->actions = [
            'index',
            'show',
            'create',
            'edit',
            'store',
            'update',
            'destroy'
        ];
        $this->controllers = [
            'index' => 'PersonController',
            'animal' => 'AnimalController',
            'boarding' => 'BoardingController',
            'person' => 'PersonController'
        ];
        $this->request = array();
        $this->data = $this->parseURI($_SERVER['REQUEST_URI']);
        $this->dispatch();  
        $this->run();      
    }

    //Decoupage URI
    private function parseURI ($serveur_uri){
        //Cherche la premiere occurence de ('?') dans la chaine.
        if(strpos($serveur_uri, "?")){
            //Permet de couper une chaine selon le charactere voulu (ici '?'), true veux dire qu'on renvoie ce qu'il y a avant le '?' est compris dans le renvoie.
            $serveur_uri = strstr($serveur_uri, '?', true);
        }
        //Permet de couper la chaîne de charactere dans un tableau selon le charactere choisi (ici "/").
        //Substr => retourne la chaine a partir du charactere donnée
        $serveur_uri = explode("/", substr($serveur_uri, 1));
        return $serveur_uri;
    }

    private function dispatch(){
        //Detection du model
        if(!array_key_exists($this->data[0], $this->controllers)) {
            $this->data[0] = 'index';
        }
        $this->request['controller'] = $this->controllers[$this->data[0]];

        //Detection de l'action
        if(count($this->data) >= 2 && $this->data[1]){
            if(!in_array($this->data[1], $this->actions)) {
                echo "ERROR ACTION NOT FOUND 404";
                die;
            }
            $this->request['action'] = $this->data[1];
        }
        else{
            $this->request['action'] = "index";
        }
        
        //Detection de l'id
        if(count($this->data) >= 3 && $this->data[2]){
            $this->request['id'] = $this->data[2];
        }
        else{
            $this->request['id'] = false;
        }

        //Detection Post/GET
        if($this->post && count($this->post)){
            $this->request['method'] = 'post';
        }
        else{
            $this->request['method'] = 'get';
        }
    }

    private function run () {
        //Nouvelle instance de notre controller
        $this->controller_instance = new $this->request['controller'];

        $data = $this->get;
        if($this->request['method'] == 'post'){
            $data = $this->post;
        }

        if($this->request['id']){
            $this->controller_instance->{$this->request['action']}($this->request['id'], $data);
        }
        else{
            $this->controller_instance->{$this->request['action']}($data);

        }
    }
}

?>