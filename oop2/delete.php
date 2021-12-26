<?php 
session_start();
require 'deleteadmin.php';

$id = $_GET['id'];

$dadmin=new  dadmin($id);
$dadmin->delete();?>