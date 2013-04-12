<?php

	error_reporting(E_ERROR);

$version = "0.3.5";
ini_set("memory_limit","256M");

require("config_default.php");
include("config.php");
//-----------------------
// Definiendo variables
//-----------------------
$page_navigation = "";
$breadcrumb_navigation = "";
$thumbnails = "";
$new = "";
$images = "";
$exif_data = "";
$messages = "";

//-----------------------
// Compruebe el entorno de PHP
//-----------------------
if (!function_exists('exif_read_data') && $display_exif == 1) {
	$display_exif = 0;
    $messages = "Error: PHP EXIF no está disponible. Set &#36;display_exif = 0; in config.php to remove this message";
}

//-----------------------
// FUNCTIONS
//-----------------------
function is_directory($filepath) {
	// $filepath debe ser la ruta del sistema completo para el archivo
	if (!@opendir($filepath)) return FALSE;
	else {
		return TRUE;
		closedir($filepath);
	}
}

function padstring($name, $length) {
	global $label_max_length;
	if (!isset($length)) $length = $label_max_length;
	if (strlen($name) > $length) {
      return substr($name,0,$length) . "...";
   } else return $name;
}
function getfirstImage($dirname) {
	$imageName = false;
	$ext = array("jpg", "png", "jpeg", "gif", "JPG", "PNG", "GIF", "JPEG");
	if($handle = opendir($dirname))
	{
		while(false !== ($file = readdir($handle)))
		{
			$lastdot = strrpos($file, '.');
			$extension = substr($file, $lastdot + 1);
			if ($file[0] != '.' && in_array($extension, $ext)) break;
		}
		$imageName = $file;
		closedir($handle);
	}
	return($imageName);
}
function readEXIF($file) {
		$exif_data = "";
		$exif_idf0 = exif_read_data ($file,'IFD0' ,0 );
        $emodel = $exif_idf0['Model'];

        $efocal = $exif_idf0['FocalLength'];
        list($x,$y) = split('/', $efocal);
        $efocal = round($x/$y,0);
       
        $exif_exif = exif_read_data ($file,'EXIF' ,0 );
        $eexposuretime = $exif_exif['ExposureTime'];
       
        $efnumber = $exif_exif['FNumber'];
        list($x,$y) = split('/', $efnumber);
        $efnumber = round($x/$y,0);

        $eiso = $exif_exif['ISOSpeedRatings'];
               
        $exif_date = exif_read_data ($file,'IFD0' ,0 );
        $edate = $exif_date['DateTime'];
		if (strlen($emodel) > 0 OR strlen($efocal) > 0 OR strlen($eexposuretime) > 0 OR strlen($efnumber) > 0 OR strlen($eiso) > 0) $exif_data .= "::";
        if (strlen($emodel) > 0) $exif_data .= "$emodel";
        if ($efocal > 0) $exif_data .= " | $efocal" . "mm";
        if (strlen($eexposuretime) > 0) $exif_data .= " | $eexposuretime" . "s";
        if ($efnumber > 0) $exif_data .= " | f$efnumber";
        if (strlen($eiso) > 0) $exif_data .= " | ISO $eiso";
        return($exif_data);
}
function checkpermissions($file) {
	global $messages;
	if (substr(decoct(fileperms($file)), -1, strlen(fileperms($file))) < 4 OR substr(decoct(fileperms($file)), -3,1) < 4) $messages = "Por lo menos un archivo o carpeta tiene permisos incorrectos.";
}

//-----------------------
// chekeo nueva version
//-----------------------
if (ini_get('allow_url_fopen') == "1") {
	$file = @fopen ("", "r");
	$server_version = fgets ($file, 1024);
	if (strlen($server_version) == 5 ) { //Si cadena recuperada es exactamente 5 caracteres luego continuar
		if (version_compare($server_version, $version, '>')) $messages = "";
	}
	fclose($file);
}

if (!defined("GALLERY_ROOT")) define("GALLERY_ROOT", "");
$thumbdir = rtrim('photos' . "/" .$_REQUEST["dir"],"/");
$thumbdir = str_replace("/..", "", $thumbdir); //Prevenir mirando las carpetas de nivel superior
$currentdir = GALLERY_ROOT . $thumbdir;

//-----------------------
// LEER LOS ARCHIVOS Y CARPETAS
//-----------------------
$files = array();
$dirs = array();
 if ($handle = opendir($currentdir))
 {
	while (false !== ($file = readdir($handle)))
    {
// 1. Leer Carpetas
		if (is_directory($currentdir . "/" . $file))
			{ 
				if ($file != "." && $file != ".." )
				{
					checkpermissions($currentdir . "/" . $file); // ver si los permisos estan correctos
					// Se establece en miniatura folder.jpg si se encuentran:
					if (file_exists("$currentdir/" . $file . "/folder.jpg"))
					{
						$dirs[] = array(
							"name" => $file,
							"date" => filemtime($currentdir . "/" . $file . "/folder.jpg"),
							"html" => "<li><a href='?dir=" .ltrim($_GET['dir'] . "/" . $file, "/") . "'><em>" . padstring($file, $label_max_length) . "</em><span></span><img src='" . GALLERY_ROOT . "createthumb.php?filename=$currentdir/" . $file . "/folder.jpg&amp;size=$thumb_size'  alt='$label_loading' /></a></li>");
					}  else
					{
					// imagen del conjunto de la primera imagen que se encuentran (en su caso):
						unset ($firstimage);
						$firstimage = getfirstImage("$currentdir/" . $file);
						if ($firstimage != "") {
						$dirs[] = array(
							"name" => $file,
							"date" => filemtime($currentdir . "/" . $file),
							"html" => "<li><a href='?dir=" . ltrim($_GET['dir'] . "/" . $file, "/") . "'><em>" . padstring($file, $label_max_length) . "</em><span></span><img src='" . GALLERY_ROOT . "createthumb.php?filename=$thumbdir/" . $file . "/" . $firstimage . "&amp;size=$thumb_size'  alt='$label_loading' /></a></li>");
						} else {
						// Si no folder.jpg o la imagen se encuentra, a continuación, mostrar el icono por defecto:
							$dirs[] = array(
								"name" => $file,
								"date" => filemtime($currentdir . "/" . $file),
								"html" => "<li><a href='?dir=" . ltrim($_GET['dir'] . "/" . $file, "/") . "'><em>" . padstring($file) . "</em><span></span><img src='" . GALLERY_ROOT . "images/folder_" . strtolower($folder_color) . ".png' width='$thumb_size' height='$thumb_size' alt='$label_loading' /></a></li>");
						}
					}
				}
			}	


// 3. CARGA DE ARCHIVOS
	        	if ($file != "." && $file != ".." && $file != "folder.jpg")
		  		{
		  			// JPG, GIF and PNG
		  			if (preg_match("/.jpg$|.gif$|.png$/i", $file))
		  			{
						//Read EXIF
						if ($display_exif == 1) $img_captions[$file] .= readEXIF($currentdir . "/" . $file);

						checkpermissions($currentdir . "/" . $file);
			  			$files[] = array (
			  				"name" => $file,
							"date" => filemtime($currentdir . "/" . $file),
							"size" => filesize($currentdir . "/" . $file),
				  			"html" => "<li><a href='" . $currentdir . "/" . $file . "' rel='lightbox[billeder]' title='$img_captions[$file]'><span></span><img src='" . GALLERY_ROOT . "createthumb.php?filename=" . $thumbdir . "/" . $file . "&amp;size=$thumb_size' alt='$label_loading' /></a></li>");
		  			}
					// Other filetypes
					$extension = "";
		        	if (preg_match("/.pdf$/i", $file)) $extension = "PDF"; // PDF
		        	if (preg_match("/.zip$/i", $file)) $extension = "ZIP"; // ZIP archive
		        	if (preg_match("/.rar$|.r[0-9]{2,}/i", $file)) $extension = "RAR"; // RAR Archive
		        	if (preg_match("/.tar$/i", $file)) $extension = "TAR"; // TARball archive
		        	if (preg_match("/.gz$/i", $file)) $extension = "GZ"; // GZip archive
		        	if (preg_match("/.doc$|.docx$/i", $file)) $extension = "DOCX"; // Word
		        	if (preg_match("/.ppt$|.pptx$/i", $file)) $extension = "PPTX"; //Powerpoint
		        	if (preg_match("/.xls$|.xlsx$/i", $file)) $extension = "XLXS"; // Excel
		        			        	
		        	if ($extension != "")
			  		{
		  				$files[] = array (
		  					"name" => $file,
							"date" => filemtime($currentdir . "/" . $file),
							"size" => filesize($currentdir . "/" . $file),
			  				"html" => "<li><a href='" . $currentdir . "/" . $file . "' title='$file'><em-pdf>" . padstring($file, 20) . "</em-pdf><span></span><img src='" . GALLERY_ROOT . "images/filetype_" . $extension . ".png' width='$thumb_size' height='$thumb_size' alt='$file' /></a></li>");
        			}
     			}   		
	}
  closedir($handle);
  } else die("ERROR: Could not open $currentdir for reading!");

//-----------------------
// ORDENAR ARCHIVOS Y CARPETAS
//-----------------------
if (sizeof($dirs) > 0) 
{
	foreach ($dirs as $key => $row)
	{
		if($row["name"] == "") unset($dirs[$key]); //Eliminar las entradas matriz vacía
		$name[$key] = strtolower($row['name']);
		$date[$key] = strtolower($row['date']);
	}	
	if (strtoupper($sortdir_folders) == "DESC") array_multisort($$sorting_folders, SORT_DESC, $name, SORT_DESC, $dirs);
	else array_multisort($$sorting_folders, SORT_ASC, $name, SORT_ASC, $dirs);
}
if (sizeof($files) > 0)
{
	foreach ($files as $key => $row)
	{
		if($row["name"] == "") unset($files[$key]); //Eliminar las entradas matriz vacía
		$name[$key] = strtolower($row['name']);
		$date[$key] = strtolower($row['date']);
		$size[$key] = strtolower($row['size']);
	}
	if (strtoupper($sortdir_files) == "DESC") array_multisort($$sorting_files, SORT_DESC, $name, SORT_ASC, $files);
	else array_multisort($$sorting_files, SORT_ASC, $name, SORT_ASC, $files);
}

//-----------------------
// DETERMINACIÓN DE COMPENSACIÓN
//-----------------------
	$offset_start = ($_GET["page"] * $thumbs_pr_page) - $thumbs_pr_page;
	if (!isset($_GET["page"])) $offset_start = 0;
	$offset_end = $offset_start + $thumbs_pr_page;
	if ($offset_end > sizeof($dirs) + sizeof($files)) $offset_end = sizeof($dirs) + sizeof($files);

	if ($_GET["page"] == "all")
	{
		$offset_start = 0;
		$offset_end = sizeof($dirs) + sizeof($files);
	}

//-----------------------
// PÁGINA DE NAVEGACIÓN
//-----------------------
if (!isset($_GET["page"])) $_GET["page"] = 1;
if (sizeof($dirs) + sizeof($files) > $thumbs_pr_page)
{
	$page_navigation .= "$label_page ";
	for ($i=1; $i <= ceil((sizeof($files) + sizeof($dirs)) / $thumbs_pr_page); $i++)
	{
		if ($_GET["page"] == $i)
			$page_navigation .= "$i";
			else
				$page_navigation .= "<a href='?dir=" . $_GET["dir"] . "&amp;page=" . ($i) . "'>" . $i . "</a>";
		if ($i != ceil((sizeof($files) + sizeof($dirs)) / $thumbs_pr_page)) $page_navigation .= " | ";
	}
	//Insertar enlace para ver todas las imágenes
	if ($_GET["page"] == "all") $page_navigation .= " | $label_all";
	else $page_navigation .= " | <a href='?dir=" . $_GET["dir"] . "&amp;page=all'>$label_all</a>";
}

//-----------------------
// La guía de navegación
//-----------------------
if ($_GET['dir'] != "")
{
	$breadcrumb_navigation .= "<a href='?dir='>" . $label_home . "</a> > ";
	$navitems = explode("/", $_REQUEST['dir']);
	for($i = 0; $i < sizeof($navitems); $i++)
	{
		if ($i == sizeof($navitems)-1) $breadcrumb_navigation .= $navitems[$i];
		else
		{
			$breadcrumb_navigation .= "<a href='?dir=";
			for ($x = 0; $x <= $i; $x++)
			{
				$breadcrumb_navigation .= $navitems[$x];
				if ($x < $i) $breadcrumb_navigation .= "/";
			}
			$breadcrumb_navigation .= "'>" . $navitems[$i] . "</a> > ";
		}
	}
} else $breadcrumb_navigation .= $label_home;

//Incluir enlaces ocultos para todas las imágenes ANTES página actual para mesa de luz es capaz de ver las imágenes en diferentes páginas
for ($y = 0; $y < $offset_start - sizeof($dirs); $y++)
{	
	$breadcrumb_navigation .= "<a href='" . $currentdir . "/" . $files[$y]["name"] . "' rel='lightbox[billeder]' class='hidden' title='" . $img_captions[$files[$y]["name"]] . "'></a>";
}


//-----------------------
// PANTALLA DE ARCHIVOS
//-----------------------
for ($i = $offset_start - sizeof($dirs); $i < $offset_end && $offset_current < $offset_end; $i++)
{
	if ($i >= 0)
	{
		$offset_current++;
		$thumbnails .= $files[$i]["html"];
	}
}

//Incluir enlaces ocultos para todas las imágenes DESPUÉS página actual para mesa de luz es capaz de ver las imágenes en diferentes páginas
for ($y = $i; $y < sizeof($files); $y++)
{	
	$page_navigation .= "<a href='" . $currentdir . "/" . $files[$y]["name"] . "' rel='lightbox[billeder]'  class='hidden' title='" . $img_captions[$files[$y]["name"]] . "'></a>";
}

//-----------------------
// SALIDA DE MENSAJES
//-----------------------
if ($messages != "") {
$messages = "<div id=\"topbar\">" . $messages . " <a href=\"#\" onclick=\"document.getElementById('topbar').style.display = 'none';\";><img src=\"images/close.png\" /></a></div>";
}

//Procesar el archivo PLANTILLA
	if(GALLERY_ROOT != "") $templatefile = GALLERY_ROOT . "templates/integrate.html";
	else $templatefile = "templates/" . $templatefile . ".html";
	if(!$fd = fopen($templatefile, "r"))
	{
		echo "Template $templatefile not found!";
		exit();
	}
	else
	{
		$template = fread ($fd, filesize ($templatefile));
		fclose ($fd);
		$template = stripslashes($template);
		$template = preg_replace("/<% title %>/", $title, $template);
		$template = preg_replace("/<% messages %>/", $messages, $template);
		$template = preg_replace("/<% author %>/", $author, $template);
		$template = preg_replace("/<% gallery_root %>/", GALLERY_ROOT, $template);
		$template = preg_replace("/<% images %>/", "$images", $template);
		$template = preg_replace("/<% thumbnails %>/", "$thumbnails", $template);
		$template = preg_replace("/<% breadcrumb_navigation %>/", "$breadcrumb_navigation", $template);
		$template = preg_replace("/<% page_navigation %>/", "$page_navigation", $template);
		$template = preg_replace("/<% bgcolor %>/", "$backgroundcolor", $template);
		$template = preg_replace("/<% gallery_width %>/", "$gallery_width", $template);
		$template = preg_replace("/<% version %>/", "$version", $template);
		echo "$template";
	}


?>
