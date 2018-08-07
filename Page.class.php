<?php

/**
 * Created by PhpStorm.
 * User: Derek
 * Date: 2018/8/1
 * Time: 0:14
 */
class Page
{
    public $offset;         //起点
    public $pageSize;       //一页条目数
//    public $res;            //结果集
    public $rowCount;       //行数
    public $currentPage;    //当前页
    public $pageCount;      //页数量
    public $maxShowPage;    //最大显示页数
    public $startPage;      //起始页
    public $endPage;        //中止页
    private $pdo;           //PDO实例

    //返回分页后展示的链接展示块
    public function displayPages()
    {
//        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"./bootstrap/css/bootstrap.min.css\"/>";

        $pageNav = "<ul class=\"pagination pull-right\">";

        if ($this->currentPage != 1) {
            $pageNav .= "<li><a href=\"{$_SERVER['PHP_SELF']}?p=1\">&laquo;</a></li>";
        }

        for ($i = $this->startPage; $i <= $this->endPage; $i++) {
            $pageNav .= "<li";

            if ($i == $this->currentPage) {
                $pageNav .= " class=\"active\"";
            }
            $pageNav .= ">";
            $pageNav .= "<a href=\"{$_SERVER['PHP_SELF']}?p={$i}\">" . $i;
            $pageNav .= "<span class=\"sr-only\">(current)</span></a></li>";

        }

        if ($this->currentPage != $this->pageCount && $this->pageCount > 1) {
            $pageNav .= "<li><a href=\"{$_SERVER['PHP_SELF']}?p={$this->pageCount}\">&raquo;</a></li>";
        }

        $pageNav .= "</ul>";

        return $pageNav;
    }

    //传入一个表以及它的primary key名字，定义的分页参数，用来计算偏移量，行数以及页数
    public function __construct($table, $id_name, $pageSize, $currentPage)
    {
        $this->maxShowPage = 5; //默认最大显示页数为5
        $this->pageSize = $pageSize;
        $this->currentPage = $currentPage;
        $this->offset = ($currentPage - 1) * $pageSize;
        $this->rowCount = $this->getRowCount($table, $id_name);
        $this->pageCount = ceil($this->rowCount / $pageSize);

        //计算起始页与中止页
        if ($this->pageCount < 5) { //总页数小于5的情况

            $this->startPage = 1;   //起始页总是1
            $this->endPage = $this->pageCount;  //中止页总是最后一页

        } else {    //总页数大于等于5的情况
            switch ($this->currentPage) {
                case 1:
                    $this->startPage = $this->currentPage;
                    break;
                case 2:
                    $this->startPage = $this->currentPage - 1;
                    break;
                default:
                    $this->startPage = $this->currentPage - 2;

            }
            //如果当前页距离最大页数距离大于2，则起始页离中止页距离总为5
            if ($this->pageCount - $this->currentPage >= 2) {
                $this->endPage = $this->startPage + $this->maxShowPage - 1;
            } else {  //否则距离小于2，中止页为最后一页
                $this->endPage = $this->pageCount;
            }
        }

    }

    public function getOffsetAdded($sql)
    {
        return $sql . " LIMIT {$this->offset},{$this->pageSize}";
    }

    //得到一个表的行数
    function getRowCount($table, $id_name)
    {

//        include("./sql/connection.php");

        $this->connect();

        $sqlCount = "SELECT COUNT({$id_name}) AS num FROM `{$table}`";

        try {

            $result = $this->pdo->prepare($sqlCount);
            if ($result->execute()) {
                $res = $result->fetch(PDO::FETCH_OBJ);
                $num = $res->num;
                $result = null;
                $this->disconnect();
                return $num;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            die("错误!!: " . $e->getMessage() . "<br>");
        }
    }

    //连接数据库函数
    private function connect()
    {
        /* read db info from config file into an array */
        $path = dirname(".");
        $db = parse_ini_file($path . DIRECTORY_SEPARATOR . "dbconfig.ini", true);
        $server = "Aliyun";

        /* assign array values to variables */
        $type = $db[$server]["type"];
        $host = $db[$server]["host"];
        $usr = $db[$server]["username"];
        $pwd = $db[$server]["pwd"];
        $dbname = $db[$server]["db"];
        $dsn = "$type:host=$host;dbname=$dbname";

        try {
            $this->pdo = new PDO($dsn, $usr, $pwd);
            $result = $this->pdo->prepare("SET NAMES utf8");
            if ($result->execute()) {
                $result = null;
                return true;
            } else return false;
        } catch (PDOException $e) {
            die("错误!!连接失败: " . $e->getMessage() . "<br>");
        }
    }

    //关闭连接
    public function disconnect()
    {
        $this->pdo = null;
    }

    function __destruct()
    {
    }
}
?>