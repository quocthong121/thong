<?php
class Product extends Db
{
public function getAllProducts()
{
$sql = self::$connection->prepare("SELECT * FROM products");
$sql ->execute();
$items = array();
$items = $sql ->get_result()->fetch_all(MYSQLI_ASSOC);
return $items;
}
public function getProductById($id)
{
$sql = self::$connection->prepare("SELECT * FROM products WHERE id = ?");
$sql->bind_param("i",$id);
$sql->execute(); //return an object
 
$items = array();
$items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
return $items; //return an array
}
public function  getTenNewPD(){
    $sql = self::$connection->prepare("SELECT * FROM products ORDER BY id DESC LIMIT 0,10");
    $sql ->execute();
    $items = array();
    $items = $sql ->get_result()->fetch_all(MYSQLI_ASSOC);
    return $items;
}
public function  getLapTops(){
    $sql = self::$connection->prepare("SELECT * FROM `products`,`protypes` WHERE `products`.`type_id` = `protypes`.`type_id`AND `protypes`.`type_id` = 2");
    $sql ->execute();
    $items = array();
    $items = $sql ->get_result()->fetch_all(MYSQLI_ASSOC);
    return $items;
}
public function search($keyword)
{
$sql = self::$connection->prepare("SELECT * FROM products WHERE `name` LIKE ?");
$keyword = "%$keyword%";
$sql->bind_param("s",$keyword);
$sql->execute(); //return an object
$items = array();
$items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
return $items; //return an array
}
}