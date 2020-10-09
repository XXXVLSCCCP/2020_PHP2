<?php

abstract class C_Base extends C_Controller{

    protected $title;//переменная для названия
    protected $content;// переменная для контента
    protected $keyWord;//переменная ключ 
    //Модификатор protected (защищенный) 
    //разрешает доступ самому классу, наследующим его классам и родительским классам.


    protected function before(){// before запускается для того чтобы придать 
        //первоночальное значения переменным

        $this->title="::";
        $this->content="";
        $this->keyWords="";
    }

    public function render(){
        $vars=array('title'=>$this->title,'content'=>$this->content,'kw'=>$this->keyWords);
        $page=$this->Template('v/v_main.php',$vars);

        echo $page;
    }
}