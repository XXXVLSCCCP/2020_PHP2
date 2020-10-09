<?php
include_once('m/model.php');

class C_Page extends C_Base{//создаем наследника класса C_Base

public function action_index(){//создаем метод котороый будет создавать контент
    //и запускать шаблонизатор который заполняет шаблон с версткой
    $this->title .="Основная страница";
    $text=text_get();//текс бурется из файла с момощью метода text_get 
    // который находится в папке m model.php
    // $today=data();
    //запускаем наш шаблонизатор
    $this->content=$this->Template('v/v_index.php',array('text'=>$text));
}



public function action_edit(){//метод который открывает новую страницу с формой для 
    // измения текста

    $this->title .="Cтраница редактирования";

    if($this->isPost()){//если есть пост запрос то добавляем новый текст и презагружэем 
        //страницу

        text_set($_POST['text']);//перезаписывает текст в файле
        header('location:index.php');//перезагружает страницу

        exit();

    }

    $text=text_get();//добавляет новый текст в шаблон
    $this->content=$this->Template('v/v_edit.php',array('text'=>$text));

}
}

?>