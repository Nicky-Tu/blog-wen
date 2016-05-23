<?php
/**
 * Created by PhpStorm.
 * User: Renjun
 * Date: 2016/4/15
 * Time: 11:45
 */
class Database extends Exception{
    protected $host = '127.0.0.1';
    protected $user = 'user';
    protected $password = '123';
    protected $conn;

    public function __construct()
    {
        try{
            $this->conn = @mysql_connect($this->host,$this->user,$this->password);
            if(!$this->conn){
                $this->conn = @mysql_connect($this->host,$this->user);
                if(!$this->conn){
                    $this->conn = @mysql_connect($this->conn);
                    if(!$this->conn){
                        throw new Exception('数据库连接失败...');
                    }
                }
            }

        }catch(Exception $e){
            echo $e;
        }
    }
    public function query($dbname,$query){
        $rs=null;
        try{
            $db = @mysql_select_db($dbname,$this->conn);
            if($db){
                try{
                    mysql_query('set names utf8');
                    $rs = @mysql_query($query,$this->conn);
                    if(!$rs) {
                        throw new Exception('执行SQL操作失败...');
                    }

                }catch(Exception $e){
                    echo $e;
                }
            }
            else {
                throw new Exception('未搜索到与' . $dbname . '名称相符的数据库...');
            }
        }catch(Exception $e){
            echo $e;
        }
        return $rs;


    }
    public function destroy(){
        @mysql_close($this->conn);
    }
}