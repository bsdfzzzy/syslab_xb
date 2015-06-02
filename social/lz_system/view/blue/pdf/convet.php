<?php

$file_name = "UESTC20080110.pdf";
$temp_file_name = "temp_".$file_name;
$program_path = "pdf\\";
$input_path = "pdf\\input_path\\";
$output_path ="pdf\\output_path\\";
$temp_path = "pdf\\temp_path\\";

if(file_exists($input_path.$file_name) ){
	echo " start pdf2png...";
	#生成png图片
	system($program_path."Pdf2Png.exe ".$input_path.$file_name." ".$temp_path.substr($file_name,0,-4)); 
	var_dump($program_path."Pdf2Png.exe ".$input_path.$file_name." ".$temp_path.substr($file_name,0,-4));
	echo " start png2pdf...";
	#用png生成图片版pdf
	var_dump($program_path."Png2Pdf.exe ".$program_path."convert.exe ".$temp_path.substr($file_name,0,-4)." ".$temp_path.$temp_file_name);
	system($program_path."Png2Pdf.exe ".$program_path."convert.exe ".$temp_path.substr($file_name,0,-4)." ".$temp_path.$temp_file_name);
	echo " start png2pdf...";
	#用图片版pdf生成swf文件
	var_dump($program_path."pdf2swf.exe -t ".$temp_path.$temp_file_name." -s flashversion=9 -o ".$output_path.substr($file_name,0,-4).".swf");
	system($program_path."pdf2swf.exe -t ".$temp_path.$temp_file_name." -s flashversion=9 -o ".$output_path.substr($file_name,0,-4).".swf");
	var_dump("转换完成") ;
	$filesnames = scandir($temp_path);
	foreach ($filesnames as $value) {
		if(stripos($value,substr($file_name,1,-4)) ){
			system("del ".$temp_path.$value);
		}
	}
}
else{
	var_dump("文件不存在！！");
}

?>
