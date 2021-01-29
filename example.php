require_once  "DRDAO.php";

$d = new DRDAO();

if(isset($_POST['city_name']) && !empty($_POST['city_name'])){
    extract($_POST); //extract variables from POST request
   
     // NOTE : Always validate and sanitize data before insert into database
   
    $value = array(
        "name"=>$city_name,
        "sid"=>$state_select_city,
        "cnt_id"=> $country_select_city,
        "city_cid"=> $city_category_city,
        "remark"=> $city_remarks,
    );
    // syntax : table_column_name => value
    
    // syntax :        Table name   values
    $val = $d->insert("master_city",$value);

   if($val['status']=="SUCCESS"){
     echo json_encode(['res'=>'CITY_ADD_SUCCESSFULLY']);//JSON response when success
   }else{
    echo json_encode(['res'=>'CITY_ADD_FAILED']);//JSON response when failed
   }
    
}
