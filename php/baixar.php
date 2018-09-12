<?php

   $anexo = $_GET["anexo"]; 
   if(isset($anexo) && file_exists($anexo)){
         switch(strtolower(substr(strrchr(basename($anexo),"."),1))){
            case "jpg": $x="image/jpg"; break;
            case "jpeg": $x="image/jpeg"; break;
            case "gif": $x="image/gif"; break;
            case "png": $x="image/png"; break;
            case "bmp": $x="image/bmp"; break;
            case "mp3": $x="audio/mpeg"; break;
            case "avi": $x="video/x-msvideo"; break;
            case "asf": $x="video/x-ms-asf"; break;
            case "txt": $x="text/plain"; break;
            case "doc": $x="application/msword"; break;           
            case "ppt": $x="application/vnd.ms-powerpoint"; break;
             case "xls": $x="application/vnd.ms-excel"; break;
            case "pdf": $x="application/pdf"; break;
            case "rar": $x="application/x-rar-compressed"; break;
            case "zip": $x="application/zip"; break;
            case "7z": $x="application/x-7z-compressed"; break;
            case "docx": $x="application/vnd.openxmlformats-officedocument.wordprocessingml.document"; break;
            case "pptx": $x="application/vnd.openxmlformats-officedocument.presentationml.presentation"; break;
            case "xlsx": $x="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"; break;
            case "odt": $x="application/vnd.oasis.opendocument.text"; break;
            case "php": 
            case "htm": 
            case "html": 
            case "sql": 
            case "js": 
         }
         header("Content-Type: ".$x); // informa o tipo do anexo ao navegador
         header("Content-Length: ".filesize($anexo)); // informa o tamanho do anexo ao navegador
         header("Content-Disposition: attachment; filename=".basename($anexo)); // informa ao navegador que é tipo anexo e faz abrir a janela de download, tambem informa o nome do anexo
         readfile($anexo); // lê o arquivo
         exit; // aborta pós-ações   
   }
?>