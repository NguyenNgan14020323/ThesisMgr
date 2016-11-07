<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 

<html xmlns="http://www.w3.org/1999/xhtml">  <head > 

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 

<link href="/style.css" rel="stylesheet" type="text/css" /> 

<title>Upload File XML</title> 

</head> 

<body> 

        <form enctype="multipart/form-data" action="upload_giangvien.php" method="post"> 
              <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/> 
              <table width="400"> 
              <tr> 
             <td><strong>File XML</strong>:</td> 
              <td><input type="file" name="file" /></td> 
             <td><input type="submit" value="Upload giangvien" /></td> 
              </tr> 
             </table>
         </form> 
         <form action="sendmail.php" method="post">
           <input type="submit" name="mail" value="Gửi mail toi giang vien">
         </form> 
         <form enctype="multipart/form-data" action="upload_hocvien.php" method="post"> 
              <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/> 
              <table width="400"> 
              <tr> 
             <td><strong>Học viên: </strong>:</td> 
              <td><input type="file" name="file1" /></td> 
             <td><input type="submit" value="Upload sinh vien" /></td> 
              </tr> 
             </table>
         </form> 
          <form enctype="multipart/form-data" action="upload_svbaove.php" method="post"> 
              <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/> 
              <table width="400"> 
              <tr> 
             <td><strong>Học viên: </strong>:</td> 
              <td><input type="file" name="file2" /></td> 
             <td><input type="submit" value="Upload svbaove" /></td> 
              </tr> 
             </table>
         </form>
         <form enctype="multipart/form-data" action="upload_khoa.php" method="post"> 
              <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/> 
              <table width="400"> 
              <tr> 
             <td><strong>Học viên: </strong>:</td> 
              <td><input type="file" name="file3" /></td> 
             <td><input type="submit" value="Upload khoa" /></td> 
              </tr> 
             </table>
         </form> 
         <form enctype="multipart/form-data" action="upload_bomon.php" method="post"> 
              <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/> 
              <table width="400"> 
              <tr> 
             <td><strong>Học viên: </strong>:</td> 
              <td><input type="file" name="file4" /></td> 
             <td><input type="submit" value="Upload bomon" /></td> 
              </tr> 
             </table>
         </form> 
         <form enctype="multipart/form-data" action="upload_phongtn.php" method="post"> 
              <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/> 
              <table width="400"> 
              <tr> 
             <td><strong>Học viên: </strong>:</td> 
              <td><input type="file" name="file5" /></td> 
             <td><input type="submit" value="Upload phongtn" /></td> 
              </tr> 
             </table>
         </form>
          <form enctype="multipart/form-data" action="upload_detai.php" method="post"> 
              <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/> 
              <table width="400"> 
              <tr> 
             <td><strong>Học viên: </strong>:</td> 
              <td><input type="file" name="file6" /></td> 
             <td><input type="submit" value="Upload detai" /></td> 
              </tr> 
             </table>
         </form>


</body> 

</html> 