<?php

class View{
    /**
     * @param render
     * @param content
     * @param start
     * @param end
     * @param setTitle
     * @param getSiteTitle
     * @param setLayout
     */
    protected   $_head, 
                $_body, 
                $_siteTitle = SITE_TITLE, 
                $_outputBuffer, 
                $_layout = DEFAULT_LAYOUT;

    public function __construct(){

    }


    public function render($viewname){
        $viewArray = explode('/', $viewname);
        $viewString = implode(DS, $viewArray);

        if(file_exists(ROOT . DS . 'app' . DS . 'views' . DS . $viewString . '.php')){
            include(ROOT . DS . 'app' . DS . 'views' . DS . $viewString . '.php');
            include(ROOT . DS . 'app' . DS . 'views' . DS . 'layouts' . DS . $this->_layout . '.php');
        }else{
            die('Th view \"' . $viewname . '\" does not exist');
        }
    }


    public function content($type){
        if($type=='head'){
            return $this->_head;
        }elseif($type=='body'){
            return $this->_body;
        }

        return false;
    }

    public function start($type){
        $this->_outputBuffer = $type;
        ob_start();
    }
    public function end(){
        if($this->_outputBuffer == 'head'){
            $this->_head = ob_get_clean();
        }elseif($this->_outputBuffer == 'body'){
            $this->_body = ob_get_clean();
        }else{
            die('You must first run the start method');
        }
    }

    public function setTitle($title){
        $this->_siteTitle = $title;
    }

    public function getSiteTitle(){
        if($this->_siteTitle == '') return SITE_TITLE;
        return $this->_siteTitle;
    }

    public function setLayout($path){
        $this->_layout = $path;
    }


}