<?php

    header("Content-type:text/html;charset=utf-8");
    $dbname='lujiaoxiang';
    $host='localhost';
    $user='root';
    $password='root';
    $link=@mysql_connect($host, $user, $password);
    if (!$link) {
        die("错误：".mysql_error($link));
    }
    if (!mysql_select_db($dbname, $link)) {
        die("错误：".mysql_error($link));
    }
    mysql_query("set names utf8");
    $id=$_GET['id'];
    $sql="select * from brand_news where id=$id";
    $query=mysql_query($sql);
    $rs=mysql_fetch_assoc($query);
    $fname='html/'.$rs['id'].'.html';
    $title="<h1 style='text-align:center;'>".$rs['title']."</h1>";
    $date="<div style='text-align:center;'>".$rs['date']."&nbsp;&nbsp;<text style='color:#ff552e;'>".$rs['type']."</text></div>";
    $context=$title.$date.str_replace("<img", "<img style='width:100%;'", $rs['context']);
    $pattern='/\<img.*\/\>/';
    $pattern2='/http.*\.jpeg|http.*\.jpg|http.*\.gif|http.*\.png/';
    $arr=checkStr2($context,$pattern)[0];
    $imgs='';
    foreach ($arr as $key => $value) {
        $imgs.=checkStr2($value,$pattern2)[0][0].'<br/>';
    }
    echo $imgs;
    $myfile = fopen($fname, "w") or die("Unable to open file!");
    fwrite($myfile, $context);
    fclose($myfile);


    function checkStr2($str,$str2)
    {
        return preg_match_all($str2,$str,$matches)?$matches:'';
    }

?>