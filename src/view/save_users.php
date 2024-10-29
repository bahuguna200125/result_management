<?php
require "../controller/user_controller.php";
require __DIR__ . '/../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$controller = new UserController();
$users = $controller->get_users();

if ($users) {

   
 
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1', 'User ID');
    $sheet->setCellValue('B1', 'First Name');
    $sheet->setCellValue('C1', 'Last Name');
    $sheet->setCellValue('D1', 'Email');
    $sheet->setCellValue('E1', 'Phone No.');

  
    $row = 2;
    foreach ($users as $user) {

    $userid=$user->get_user_id();
    $fname= $user->get_first_name();
    $lname= $user->get_last_name();
    $mail= $user->get_email();
    $phone_no=$user->get_phone_no();
    
        $sheet->setCellValue("A$row", $userid);
        $sheet->setCellValue("B$row", $fname);
        $sheet->setCellValue("C$row", $lname);
        $sheet->setCellValue("D$row", $mail);
        $sheet->setCellValue("E$row", $phone_no);
        
        $row++; 
    }

    $sheet->getColumnDimension("A")->setAutoSize(true);
    $sheet->getColumnDimension("B")->setAutoSize(true);
    $sheet->getColumnDimension("C")->setAutoSize(true);
    $sheet->getColumnDimension("D")->setAutoSize(true);
    $sheet->getColumnDimension("E")->setAutoSize(true);

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="All_Users.xlsx"');
    header('Cache-Control: max-age=0');

 
    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
} else {
    echo "No user data available.";
}
?>
