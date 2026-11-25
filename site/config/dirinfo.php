<?PHP
function dirsize($dirpath){
    
    $thisdirstat = array("filesize"=>0,"files"=>0,"dirs"=>0);
    
    if (false ==($dirhandle = @opendir($dirpath))) return $thisdirstat ;
    while (false !== ($name = readdir($dirhandle))){
        if ($name == "." or $name == "..") continue;
        if (!is_dir($dirpath.DIRECTORY_SEPARATOR.$name)){
            $thisdirstat["filesize"] += filesize($dirpath.DIRECTORY_SEPARATOR.$name);
            ++$thisdirstat["files"];
            }
        else{
            ++$thisdirstat["dirs"];
            $subdirstat = dirsize($dirpath.DIRECTORY_SEPARATOR.$name);
            $thisdirstat["filesize"] += $subdirstat["filesize"]; 
            $thisdirstat["files"] += $subdirstat["files"]; 
            $thisdirstat["dirs"] += $subdirstat["dirs"]; 
        };//end if
    };//end while
    closedir($dirhandle);
    return $thisdirstat;

};//end function dirsize

function showdir($dirpath){
    
    $dirhandle = @opendir($dirpath)
        or exit("$dirpath don't find" );
    while (false !== ($name = readdir($dirhandle))){
        if ($name == "." or $name == "..") continue;
        if (!is_dir($dirpath.DIRECTORY_SEPARATOR.$name)){
            echo $dirpath.DIRECTORY_SEPARATOR.$name."<br>";
            }
        else{
            echo "<br>"."[".$dirpath.DIRECTORY_SEPARATOR.$name.DIRECTORY_SEPARATOR."]"."<br>";
            showdir($dirpath.DIRECTORY_SEPARATOR.$name);
        };//end if
    };//end while
    echo "<br>";
    closedir($dirhandle);
    
};//end funtion showdir
/* 
$dirpath = "D:\Program Files";

echo $dirpath.":<br>";
print_r(dirsize($dirpath));
echo "<p>";

echo $dirpath.":<br>";
showdir($dirpath); */
//$dirsize = dirsize("D:\Program Files");
//echo $dirsize["filesize"];

?>

