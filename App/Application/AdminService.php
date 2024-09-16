<?php
namespace App\Application;
require_once '../Domain/Users/UserEntity.php'; use App\Domain\Users\UserEntity;
require_once $_SERVER['DOCUMENT_ROOT'].'/App/Infrastructure/sdbh.php'; use sdbh\sdbh; 

class AdminService {

    /** @var UserEntity */
    public $user;

    public function __construct()
    {
        $this->user = new UserEntity();
    }

    public function addNewProduct()
    {
        if (!$this->user->isAdmin) return;

        $name = $_POST['name'];
        $price = $_POST['price'];

        if(empty($name) || empty($price)) {
            echo "Заполните поля Название и Цена!";
            return;
        }

        $tarif = $_POST['tarif'] != null ? serialize(
            json_decode('{ '. rtrim($_POST['tarif'], ",") .' }',true)
        ) : null;

        $dbh = new sdbh();
        $dbh->insert_row('a25_products',['NAME'=>$name,
                                                                'PRICE'=>$price,
                                                                'TARIFF'=>$tarif]);

        echo "Товар успешно добавлен!";
        return;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $instance = new AdminService();
    $instance->addNewProduct();
}