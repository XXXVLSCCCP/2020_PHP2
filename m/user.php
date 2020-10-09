<?php
include_once "config/db.php";

class user{

    protected $db;

    public function __construct() {//создаем коннект к базе данных для общего пользования
        $this->db = M_Db::db();
    }

public function pass ($name, $password) {//шифруем пароль и логин
    return strrev(md5($name)) . md5($password);}//склеиваем наше имя и пароль и сразу шифруем md5
    //псоле переварачиваем в целях безопасности
    

// public function connecting(){
// $connect_str = DB_DRIVER . ':host='. DB_HOST . ';dbname=' . DB_NAME;
// return new PDO($connect_str,DB_USER,DB_PASS);
// }

public function get($id){//мы хотим получить все данные о нашем пользователе
    // когда будем делать личный кобинет хотим узнать информацию о пользователе
    $sth=$this->db->prepare("SELECT*FROM users WHERE id=?");
    $sth->execute(array("$id"));
    return (boolean)$sth->fetchAll(PDO::FETCH_ASSOC);

}
public function register($name,$login,$password){//метод проверки 
    //есть ли еще такой пользователь в системе
    $users=$this->db->prepare("SELECT * FROM users WHERE login=?");
    //при регистрации нужно узнать нет ли такого пользователя в системе
    $users->execute(array("$login"));
    $log=$users->fetchAll(PDO::FETCH_ASSOC);

    if(!$log){//если нет такого логина
        $stn=$this->db->prepare("INSERT INTO `users` (`id`,`name`, `login`, `password`) VALUES (null, ?,?,?)");
        $stn->execute(array("$name", "$login", " pass ($name, $password)"));
       return true;
    }
    //если есть то false
        false;
    

}

public function login($login,$password){// метод авторизации
    $user=$this->db->prepare("SELECT * FROM users WHERE login=?");
    $user->execute(array($login));//проверяем существует ли пользователь
    $login=$user->fetchALL(PDO::FETCH_ASSOC);

    if ($login) {//если логин существует то проверяем соответсявия вводимого пароля с
        // паролем из базы данных
        if ($user['password'] == $this->pass($user['name'], strip_tags($password))) {
            $_SESSION['user_id'] = $user['id'];// добавляем id в session
            return 'Добро пожаловать в систему, ' . $user['name'] . '!';
        } else {
            return 'Пароль не верный!';
        }
    } else {
        return 'Пользователь с таким логином не зарегистрирован!';
    }
}

public function logout () {//выход из системы 
    if (isset($_SESSION["user_id"])) {
        //закрываем session
        session_destroy();
        return true;
    } 
    return false;
    
}


}


?>