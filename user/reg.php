<?php
include '../.include.php';
$u =get('Username');
$e = get('Email');
$p = get('password');
$pr = get('password_confirm');
$s = get('optionsRadios');
$r=new Base\Res();

if(!$u||strlen($u)>50)$r->o('用户名无效');
if(!$e||strlen($e)>50)$r->o('邮箱无效');
if(!$p||strlen($p)>50)$r->o('密码无效');
if(!$s)$r->o('性别无效');
if($p!=$pr)$r->o('两次密码不同');
$table='Users';
        if($db->has($table,["uname" => $u])){
            $r->o('用户名已经被注册了');
        }
  $passwd = Base\Comm::PasswdMd5($p);
            $res=$db->insert($table,[
                "uname" => $u,
                "pword" =>  $passwd,
                "sex" =>  $s,
                "registerIP" =>  Base\Comm::getClientIP(),
            ],true);
if($res!=1)$r->o('注册失败！数据无效');
$r->j['result']='ok';
$r->o('注册成功!请使用软件登陆，可免费试用至本月底');