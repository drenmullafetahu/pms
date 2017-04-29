<?php

require __DIR__.'/vendor/autoload.php';
define("OSF_EXEC","1");

define("ROOT_DIR", dirname(dirname(__file__)).DIRECTORY_SEPARATOR);
define("DIR_SEP", DIRECTORY_SEPARATOR);
define("OSF_LIB",ROOT_DIR.'Lib'.DIR_SEP);

require_once(ROOT_DIR . 'Lib/Cls/App.php');
new App();

require_once(OSF_LIB.'Cls/Registry.php');
$reg = new Registry();
App::init();
require_once(ROOT_DIR . 'Lib/Cls/Loader.php');
new Loader(ROOT_DIR);

use Lib\Cls\Session;
use Lib\Cls\Http;
$http = new Http();

$reg->set("http",$http);

use Lib\Database\Mysqli\DBMysqli;
use Lib\User\DB;
use Lib\Cls\Filters;
use Illuminate\Hashing\BcryptHasher;

use Carbon\Carbon;

$dbSettings1['name'] = "eukos";
$dbSettings1['user'] = "root";
$dbSettings1['password'] = "test.123";
$dbSettings1['host'] = "localhost";

$dbSettings2['name'] = "eukos_csms";
$dbSettings2['user'] = "root";
$dbSettings2['password'] = "test.123";
$dbSettings2['host'] = "localhost";



$dbConn = new DBMysqli();
$dbConn = $dbConn->connect($dbSettings1,1);
$db = new DB($dbConn);



$dbConn1 = new DBMysqli();
$dbConn1 = $dbConn1->connect($dbSettings2,1);
$db1 = new DB($dbConn1);

$hashing = new BcryptHasher();

$programID = array(1=>1,2=>3,3=>7,4=>5,5=>9);
$result = $dbConn->query("select * from students order by id asc limit 0,1000");
$userID = 301;
while($rows = $result->fetch_array()){
  $sql = "update students set program_id=".$rows['program_id'].' where student_id='.$rows['student_id'].';';
  echo $sql.'<br>';

//  $birthdate = (isset($rows['birthdate']) && $rows['birthdate'] && $rows['birthdate']!='') ? Carbon::parse($rows['birthdate'])->format('Y-m-d') : '';
//  $password = ($birthdate) ? $birthdate : $rows['student_id'];
//
//  $password = $hashing->make($password);
//
//  $sql = "INSERT INTO users (`id`,`username`,`email`,`role_id`,`active`,`password`,`password_changed`,`created_at`,`updated_at`)
//  values ('".$userID."','".$rows['student_id']."','".$rows['email']."','4','1','".$password."','".$rows['passchange']."','".$rows['insert_date']."','".$rows['insert_date']."');";
//echo $sql."\n";
//  //$dbConn1->query($sql);
//$programid = ($rows['program_id']) ? $programID[$rows['program_id']] : 0;
//  $sql1 = "INSERT INTO students (`user_id`,`program_id`,`student_id`,`name`,`last_name`,`parents_name`,`birthdate`,`birthplace`,`registration_year`
//  ,`created_at`,`updated_at`)
//    values ('".$userID."','".$programid."','".$rows['student_id']."','".Filters::remove(Filters::toHtml($rows['name'],'ISO-8859-1'))."','".Filters::remove(Filters::toHtml($rows['lastname'],'ISO-8859-1'))."'
//    ,'".Filters::remove(Filters::toHtml($rows['parent_name'],'ISO-8859-1'))."','".$rows['birthdate']."','".Filters::remove(Filters::toHtml($rows['birthplace'],'ISO-8859-1'))."'
//    ,'".$rows['registration_year']."','".$rows['insert_date']."','".$rows['insert_date']."');
//  ";
//  echo $sql1."\n";
//  //$dbConn1->query($sql1);
//$userID++;
}
?>