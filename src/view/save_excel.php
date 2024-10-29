<?php
require "../controller/user_controller.php";
require __DIR__ . '/../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

  


    $controller= new UserController();
    $user_result = $controller->get_user_result_by_user_id($user_id);
    if ($user_result){
       $id = $user_result->get_id();
       $user_id= $user_result->get_user()->get_user_id();
       $email = $user_result->get_user()->get_email();
       $first_name= $user_result->get_user()->get_first_name();
       $last_name= $user_result->get_user()->get_last_name();
       $hindi = $user_result->getSubjectMark("hindi");
       $english = $user_result->getSubjectMark("english");
       $maths = $user_result->getSubjectMark("maths"); 
       $physics = $user_result->getSubjectMark("physics");
       $chemistry = $user_result->getSubjectMark("chemistry");
       $total= $user_result->getTotalMarks();
       $percent = $user_result->getPercentage();
       $result_status= $user_result->resultStatus();


     
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'NAME');

        $sheet->setCellValue('B1', $first_name.$last_name);

     
;
        $sheet->setCellValue('A2', 'Subject');

        $sheet->setCellValue('B2', 'Total Marks');
 
        $sheet->setCellValue('C2', 'Obtained Marks');
 

        $sheet->setCellValue('A3', 'HINDI');
        $sheet->setCellValue('B3', '100');
        $sheet->setCellValue('C3', $hindi);
  
        $sheet->setCellValue('A4', 'ENGLISH');
        $sheet->setCellValue('B4', '100');
        $sheet->setCellValue('C4', $english);

        $sheet->setCellValue('A5', 'MATHS');
        $sheet->setCellValue('B5', '100');
        $sheet->setCellValue('C5', $maths);

        $sheet->setCellValue('A6', 'PHYSICS');
        $sheet->setCellValue('B6', '100');
        $sheet->setCellValue('C6', $physics);

        $sheet->setCellValue('A7', 'CHEMISTRY');
        $sheet->setCellValue('B7', '100');
        $sheet->setCellValue('C7', $chemistry);


        $sheet->setCellValue('A8', 'TOTAL MARKS');
        $sheet->setCellValue('B8', '500');
        $sheet->setCellValue('C8', $total);


        $sheet->setCellValue('A9', 'PERCENTAGE');
        $sheet->setCellValue('B9', '%');
        $sheet->setCellValue('C9', $percent);


        $sheet->setCellValue('A10', 'RESULT STATUS');
        $sheet->setCellValue('B10', 'pass/fail');
        $sheet->setCellValue('C10', $result_status);

        $sheet->setCellValue('A11', 'MAIL ID ');
        $sheet->setCellValue('B11', $email);
        
        $sheet->getColumnDimension("B")->setAutoSize(true);
        $sheet->getColumnDimension("A")->setAutoSize(true);
        $sheet->getColumnDimension("C")->setAutoSize(true);
      

   
        // Set headers for download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="User_Result_' . $user_id . '.xlsx"');
        header('Cache-Control: max-age=0');

        // Generate and output the file
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    } else {
        echo "No results available for this user.";
    }
} else {
    echo "User ID not specified.";
}
?>
