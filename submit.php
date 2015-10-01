<?php
$servername='172.16.10.22';
$username='sampatti';
$password='clsdir';
$conn=mysql_connect($servername, $username, $password);
$dtbs=mysql_select_db('db_emp1638',$conn)or die("error");

		$post_date = file_get_contents("php://input");
		$data = json_decode($post_date);
print_r($data);
		$name= $data->name;
		$username= $data->userName;
		$password=$data->password;
		$cpassword=$data->cpassword;
		$email=$data->email;
		$contactno =$data->contactno;
		$country= $data->country->displayName;
		$state =$data->state->displayName;
		$city =$data->city->displayName;
		$fileImg=$data->file;
		$path=$data->path;
		$time=time();
		$dataFileVal=array();
function saveImage($base64img){
global $fileImg, $time, $dataFileVal;
    define('UPLOAD_DIR', '/mnt/backup/home/ssipolya/public_html/Angular Js/programs/curdByShivangi/img/');

   // $base64img = str_replace('data:image/png;base64,', '', $base64img);

	foreach($fileImg as $fileImg1)
	{  
		$dataPath[]=$base64img;
		$dataFile=$time.'_'.$fileImg1;
		$dataFileVal[]=$dataFile;
		$file = UPLOAD_DIR .$dataFile;
		file_put_contents($file, $data);
	}
	//print_r($dataFileVal);
}
	saveImage($path);
							
		  $ImgVal= implode(',',$dataFileVal);
		// $image=$data->image;

		$sql ="insert into forPracticalNg (name, username, password, cpassword,email,contactno, country,state,city, image) values('".$name."','".$username."','".$password."','".$cpassword."','".$email."','".$contactno."','".$country."','".$state."','".$city."','".$ImgVal."')";
			$qry_res =mysql_query($sql, $conn);
			

?>