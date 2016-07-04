<?php

$conn = new mysqli("localhost","root","p455w0rd","kishoredb");
if($conn->connect_error){
    echo $conn->connect_error();
}else{

    echo "connected";
    var_dump($conn);
    _downloadcsv($conn);
}
function _uploadcsv() {
    ob_flush();
    if(($_FILES["file"]['type']== "text/csv")){
        $handle = fopen($_FILES['file']['tmp_name'], "r");
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $array1 = array('name','phoneno');
            $array2 = array_combine($array1, $data);
            $import = $this->dataObj->insertArrayFormat($array2, "","", "bncsv");
        }
        fclose($handle);
            if($import){
                $_SESSION['raise_message']['global'] = getmessage('SETTING_UPLOAD');
            }
    }else{
        die("Sorry, only csv type is allowed");
    }

    redirect(LBL_SITE_URL."/flexyadmin/testcsv/listing");

}



 function _downloadcsv($conn) {
        ob_clean();
        //global $conn;
        $sql        = "SELECT * FROM tblstudent WHERE 1";
        $array      = mysqli_query($conn, $sql);
        $f          = fopen('php://memory', 'w'); 
        $delimiter  = ",";
        $filename   = "test_csv";
        foreach ($array as $line) { 
        // generate csv lines from the inner arrays
        fputcsv($f, $line, $delimiter); 
        }
        // reset the file pointer to the start of the file
        fseek($f, 0);
        // tell the browser it's going to be a csv file
        header('Content-Type: application/csv');
        // tell the browser we want to save it instead of displaying it
        header('Content-Disposition: attachment; filename="'.$filename.'";');
        // make php send the generated csv lines to the browser
        fpassthru($f);
}


?>

