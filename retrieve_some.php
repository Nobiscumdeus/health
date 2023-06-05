<?php
$data=json_decode(file_get_contents("data.json"),true);

$searchId=$_GET['searchId'];
$searchname=$_GET['searchName'];

$searchResult=array_filter($data,function($item) use($searchId,$searchName){
    return $item['id']===$searchId && $item['name']===$searchName;

});
echo json_encode($searchResult);

?>