<?php
/**
 * Created by PhpStorm.
 * User: Derek
 * Date: 2018/8/1
 * Time: 0:14
 */
class Page {
    public $offset;         //起点
    public $pageSize;       //一页条目数
//    public $res;            //结果集
    public $rowCount;       //行数
    public $currentPage;    //当前页
    public $pageCount;      //页数量

    function __construct($table, $id_name, $pageSize, $currentPage) {
        $this->pageSize = $pageSize;
        $this->currentPage = $currentPage;
        $this->offset = ($currentPage-1) * $pageSize;
        $this->rowCount = $this->getRowCount($table, $id_name);
        $this->pageCount = ceil($this->rowCount/$pageSize);
    }

    function getRowCount($table, $id_name) {

//        include("./sql/connection.php");

        /* read db info from config file into an array */
        $path =  dirname(".");
        $db = parse_ini_file($path . DIRECTORY_SEPARATOR . "dbconfig.ini", true);
        $server = "local";

        /* assign array values to variables */
        $type = $db[$server]["type"];
        $host = $db[$server]["host"];
        $usr = $db[$server]["username"];
        $pwd = $db[$server]["pwd"];
        $dbname = $db[$server]["db"];
        $dsn = "$type:host=$host;dbname=$dbname";

        try {
            $pdo = new PDO($dsn, $usr, $pwd);
            $result = $pdo->prepare("SET NAMES utf8");
            $result->execute();
        } catch (PDOException $e) {
            die("错误!!连接失败: " . $e->getMessage() . "<br>");
        }

        $sqlCount = "SELECT COUNT({$id_name}) AS num FROM `{$table}`";

        try {

            $result = $pdo->prepare($sqlCount);
            if ($result->execute()) {
                $res = $result->fetch(PDO::FETCH_OBJ);
                $num = $res->num;

                return $num;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            die("错误!!: " . $e->getMessage() . "<br>");
        }
    }



    function __destruct()
    {
    }
}