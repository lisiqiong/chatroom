<?php

/**
 * Class config  数据库配置类
 *  1.判断文件是否存在
 *  2.判断配置是否是否存在
 *  3.缓存配置
 */
namespace Libs\Common;
class Config
{
    /**
     * 用于取出单个数据
     * @param $name  dbconfig.php 数组下标
     * @param $file  文件
     */
    static public $conf=[];//储存资源

    /**
     * 取出文件所有配置
     * @param $file
     * @return mixed
     */
    public  function getAll(){
        $files = $this->scanFile("./conf");       
        $confs = [];
        $cons = '';
        foreach($files as $k=>$v){
            $cons = include_once($v);
            $confs = array_merge($confs,$cons);
        } 
        self::$conf = $confs;
        return $confs;
    }

    //获取目录下的所有配置文件
    public  function scanFile($path) {
        global $result;
        $files = scandir($path);
        $conf = [];
        foreach ($files as $file) {
            if ($file != '.' && $file != '..') {
                $conf = $path."/".basename($file);
                $result[] = $conf;
            }
        }
        return $result;
    }

}

//$conf = new config();
//$data = $conf->getAll();
//print_r($data);

