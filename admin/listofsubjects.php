<?php
    session_start();
    include("connection.php");

    //this code doesnt allow you to access this page(index.php) without being logged in with session['email_address']
    if (!isset($_SESSION['email_address'])) {
        header("Location: login.php");
    }

    //$_GET["program"]; value came from program.php
    $program = $_GET["program"];

    function pdfSubjects() {
        $program = $_GET["program"];
        $output = "";
        include("connection.php");
        $whereClause = ('WHERE "'.$program.'" = coursename '); // WHERE "'.$program.'" = coursename
        //$connect = mysqli_connect("localhost", "admin_vhvh", "admin", "newsystem");

        //query to print list of subjects in a program for a pdf file
        $programSubjects = mysqli_query($connect, 'SELECT * FROM subject 
            WHERE coursename = "'.$program.'"
            ORDER BY yearlevel, subjectcode ');
        
        while ($rowsProgramSubjects = mysqli_fetch_array($programSubjects)) {
            $output .= '<tr>
                            <td>'.$rowsProgramSubjects["subjectcode"].'</td>
                            <td>'.$rowsProgramSubjects["subjectname"].'</td>
                            <td>'.$rowsProgramSubjects["yearlevel"].'</td>
                        </tr>';
        }
        //query to print list of subjects in a program for a pdf file
        return $output;
    }

    //include main tcpdf lib
    require_once("TCPDF-main/tcpdf.php");

    //create new pdf document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    //set document info
    $pdf -> SetCreator(PDF_CREATOR);
    $pdf -> SetAuthor("Dev VH");
    $pdf -> SetTitle("List_of_Subjects");
    $pdf -> SetSubject("TCPDF TUTORIAL");
    $pdf -> SetKeywords("TCPDF", "PDF", "example", "test", "guide");

    // remove default header/footer
    $pdf->setPrintHeader(false);

    //set default header data
    // $pdf -> setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', 
    //     PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
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
        <h1>Lorem Ipsum Colleges</h1>';
    $content .='
        <h4>List of Subjects for ';
    $content .= ' '.$program.'
        </h4>';
    $content .='
        <table border="1" cellspacing="0" cellpadding="5">
            <tr>
                <th width="17%"><b>Subject Code</b></th>  
                <th width="66%"><b>Subject Name</b></th>  
                <th width="17%"><b>Year Level</b></th>  
            </tr>
    ';
    //$content .= "$program";
    $content .= pdfSubjects();
    $content .= '</table>';
    $pdf->writeHTML($content);

    // $content .= ' original codesORIGINALCODES ORIGORIGORIGORIGORIG
    //     <h1>Lorem Ipsum Colleges</h1>';
    // $content .='
    //     <h4>List of Subjects</h4>';
    // $content .='
    //     <table border="1" cellspacing="0" cellpadding="5">
    //         <tr>
    //             <th width="17%"><b>Subject Code</b></th>  
    //             <th width="66%"><b>Subject Name</b></th>  
    //             <th width="17%"><b>Year Level</b></th>  
    //         </tr>
    // ';




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
    $pdf->Output('list_of_subjects.pdf', 'I'); //title for download

?>