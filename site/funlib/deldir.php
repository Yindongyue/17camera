<?

/* $pair="R:\\web\\17pub\\ffff";
echo $pair;
deldirs($pair); */

 function deldirs($pathdir)
 {
if (file_exists($pathdir)) 
{
  $ess = deldir($pathdir);
  if($ess=="true")  echo "已经删除，请刷新有关页面。";
}
}
function deldir($dir)
{
$handle = opendir($dir);
while (false!==($FolderOrFile = readdir($handle)))
{
if($FolderOrFile != "." && $FolderOrFile != "..") 
{ 
if(is_dir("$dir/$FolderOrFile")) 
{ deldir("$dir/$FolderOrFile"); } // recursive
else
{ unlink("$dir/$FolderOrFile"); }
} 
}
closedir($handle);
if(rmdir($dir))
{ $success = true; }
return $success; 
} 
?> 
