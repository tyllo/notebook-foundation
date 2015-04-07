<?php

/*
 * здесь все неободмые манипуляции с контактом
 * в рамках задания
 */

class Controller_Contact extends Controller{

    // шаблом по умолчанию
    public $layout = 'layouts/clean.php';

    public function action_creat(){
        $contact = $this->model->getPostContact();
        if( !$contact['name'] ):
            $e = New Exception404('Хацкер не добавил имя');
            $e->start();
        endif;
        // создадим новую запись в базе
        $result = $this->model->creatContact($contact);
        // если ошибка создания записи
        if ( $result === FALSE ):
            $e = new Exception404('Ошибка записи контакта');
            $e->start();
        endif;
    }
    public function action_read(){
        if ($this->is_ajax()):
            $this->layout = 'show-user.php';
        else:
            $this->view->content = View::View('show-user.php');
        endif;
    }
    public function action_update(){}
    public function action_delete(){}
}