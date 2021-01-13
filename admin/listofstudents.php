<?php
    session_start();
    include("connection.php");

    //this code doesnt allow you to access this page(index.php) without being logged in with session['email_address']
    if (!isset($_SESSION['email_address'])) {
        header("Location: login.php");
    }

    function pdfStudents() {
        $output = "";
        include("connection.php");
        $allStudents = mysqli_query($connect, "SELECT * FROM users ORDER BY lastname");
        
        while ($rowsAllStudents = mysqli_fetch_array($allStudents)) {
            $output .= '<tr>
                            <td>'.$rowsAllStudents["id"].'</td>
                            <td>'.$rowsAllStudents["lastname"].'</td>
                            <td>'.$rowsAllStudents["firstname"].'</td>
                            <td>'.$rowsAllStudents["program"].'</td>
                            <td>'.$rowsAllStudents["yearlevel"].'</td>
                        </tr>';
        }
        return $output;
    }

    //include main tcpdf lib
    require_once("TCPDF-main/tcpdf.php");

    //create new pdf document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    //set document info
    $pdf -> SetCreator(PDF_CREATOR);
    $pdf -> SetAuthor("Dev VH");
    $pdf -> SetTitle("List_of_Enrolled_Students");
    $pdf -> SetSubject("TCPDF TUTORIAL");
    $pdf -> SetKeywords("TCPDF", "PDF", "example", "test", "guide");

    // remove default header
    $pdf->setPrintHeader(false);

    //set default header data
    // $pdf -> setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', 
    //    PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf -> setFooterData(array(0,64,0), array(0,64,128));

    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

    // ---------------------------------------------------------

    $pdf->SetFont('helvetica', '', 12);
    $pdf->AddPage();
    $content = '';
    $content .= '
       <h1>Lorem Ipsum Colleges</h1>
       <h4>List of Enrolled Students</h4>
       <table border="1" cellspacing="0" cellpadding="5">
            <tr>
            <th width="11%"><b>ID</b></th>  
            <th width="17%"><b>Last Name</b></th>  
            <th width="17%"><b>First Name</b></th>  
            <th width="38%"><b>Program</b></th>  
            <th width="17%"><b>Year Level</b></th> 
            </tr>
    ';
    $content .= pdfStudents();
    $content .= '</table>';
    $pdf->writeHTML($content);






    // set default font subsetting mode
    // $pdf->setFontSubsetting(true);

    // // Set font
    // // dejavusans is a UTF-8 Unicode font, if you only need to
    // // print standard ASCII chars, you can use core fonts like
    // // helvetica or times to reduce file size.
    // $pdf->SetFont('dejavusans', '', 14, '', true);

    // // Add a page
    // // This method has several options, check the source code documentation for more information.
    // $pdf->AddPage();

    // // set text shadow effect
    // $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

    // // Set some content to print
    // $html = <<<EOD
    //     <h1>Lorem Ipsum Colleges</h1>
    //     <h4>List of Enrolled Students</h4>
    // EOD;

    // // Print text using writeHTMLCell()
    // $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

    // // column titles
    // $header = array('ID', 'Capital', 'Area (sq km)', 'Pop. (thousands)');

    // ---------------------------------------------------------

    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.

    ob_end_clean();
    //code from stackoverflow to show pdf file
    $pdf->Output('list_of_enrolled_students.pdf', 'I'); //title for download

?>