<?php
//recibir.php
$connect = mysqli_connect("localhost", "root", "", "conexionarduino");
$columns = array('id', 'temperatura', 'humedad', 'gas','ejex','ejey','ejez', 'fecha2', 'hora');

$query = "SELECT * FROM recibidos WHERE ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'fecha2 BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (id LIKE "%'.$_POST["search"]["value"].'%" 
  OR temperatura LIKE "%'.$_POST["search"]["value"].'%" 
  OR humedad LIKE "%'.$_POST["search"]["value"].'%" 
  OR gas LIKE "%'.$_POST["search"]["value"].'%")
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = $row["id"];
 $sub_array[] = $row["temperatura"];
 $sub_array[] = $row["humedad"];
 $sub_array[] = $row["gas"];
 $sub_array[] = $row["ejex"];
 $sub_array[] = $row["ejey"];
 $sub_array[] = $row["ejez"];
 $sub_array[] = $row["fecha2"];
 $sub_array[] = $row["hora"];
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM recibidos";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>