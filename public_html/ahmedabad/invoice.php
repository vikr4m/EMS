<?php
require('fpdf182/fpdf.php');
include "db.php";

$pdf = new FPDF('P','mm','A4'); 
$pdf->AddPage();

		$pdf->SetFont('Arial','',10);
		
		
		
		$pdf->Cell(12);
		
		
		$pdf->Image('receipt_logo.jpg',10,10,30);
		$pdf->Cell(0,5,'Office No.104, First Floor, Ratna Business Square',0,1,0);
		$pdf->Cell(0,5,'Old Natraj Cinema, Opposite H.K. College',0,1,0);
		$pdf->Cell(0,5,'Ashram Rd, Ahmedabad, Gujarat 380009',0,1,0);
		$pdf->Cell(0,5,'GSTIN: 24AAICC1423E1Z9',0,1,0);

		$pdf->Ln(5);		

$sid=$_REQUEST['sid'];
$i = 1;

$stmt = "SELECT * FROM `fees_receipt` ORDER BY invoice_no DESC LIMIT 1";

$stmt_exec = mysqli_query($conn, $stmt);
	if ($stmt_exec-> num_rows > 0) 
	{
		while ($row = $stmt_exec->fetch_assoc()) 
			
		{

			$pdf->Cell(20,5,'Invoice No:',0,0);
			$pdf->Cell(15,5,'AHEM -',0,0);
			$pdf->Cell(110,5,$row['invoice_no'] ,0,0,'L');
			$pdf->Cell(25,5,'Payment Date:',0,0,'L');
			$pdf->Cell(45,5,$row['date'],0,1,'L');

$pdf->Cell(25,5,'Receive From:',0,0);
$pdf->Cell(120,5,$row['name'] ,0,0,'L');
$pdf->Cell(20,5,'Contact No:',0,0);
$pdf->Cell(50,5,' 072659 91227',0,1,'L');


$pdf->setTextColor(255,255,255);
$pdf->Cell(10,10,'S.No',1,0,'',true);
$pdf->Cell(30,10,'HSN/SAC code',1,0,'',true);
$pdf->Cell(60,10,'Particulars',1,0,'',true);
$pdf->Cell(20,10,'Amount',1,0,'',true);
$pdf->Cell(20,10,'CGST',1,0,'',true);
$pdf->Cell(20,10,'SGST',1,0,'',true);
$pdf->Cell(30,10,'Total Amount',1,1,'',true);


				$sno = $i++;
				
				$amount = $row['amount'];
				$modeofpay = $row['modeofpay'];
				$cheque_neftno = $row['cheque_neftno'];
				$cf = $amount * 3/4 * 1/1.18;
				$sm = $amount/4;
				$a = $amount - $cf - $sm;
				$cgst = $a/2; 
				$sgst = $cgst;
				$total = $cf + $cgst + $sgst;


				$pdf->setTextColor(1,1,1);
				$pdf->SetFont('Arial','',10);
				$pdf->Cell(10,10,'1' ,1,0,'L');
				$pdf->Cell(30,10,'999259',1,0,'L');
				$pdf->Cell(60,10,'Coaching Service Fees',1,0,'L');
				$pdf->Cell(20,10,round($cf,1) ,1,0,'L');
				$pdf->Cell(20,10,round($cgst,1) ,1,0,'L');
				$pdf->Cell(20,10,round($sgst,1) ,1,0,'L');
				$pdf->Cell(30,10,round($total,1) ,1,1,'L');

				$sno = $i++;
				$pdf->setTextColor(1,1,1);
				$pdf->SetFont('Arial','',10);
				$pdf->Cell(10,10,'2' ,1,0,'L');
				$pdf->Cell(30,10,'4901',1,0,'L');
				$pdf->Cell(60,10,'Study Material (Printed Books)',1,0,'L');
				$pdf->Cell(20,10,round($sm,1) ,1,0,'L');
				$pdf->Cell(20,10,'0.0',1,0,'L');
				$pdf->Cell(20,10,'0.0',1,0,'L');
				$pdf->Cell(30,10,round($sm,1) ,1,1,'L');

				$pdf->setTextColor(0,0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,3,'',0,1);
$pdf->Cell(26,5,'Payment Mode: ',0,0);
$pdf->Cell(15,5,$modeofpay,0,1,'L');
$pdf->Cell(30,5,'Cheque/NEFT No: ',0,0);
$pdf->Cell(115,5,$cheque_neftno,0,0);
$pdf->Cell(25,5,'Grand Total: ',0,0,'R');
$pdf->Cell(25,5,$row['amount'],0,1,'L');

			}
}




$pdf->SetFont('Arial','',10);
$pdf->Cell(0,3,'',0,1);
$pdf->Cell(25,5,'Terms and Conditions:',0,1);
$pdf->Cell(25,5,'1.This reciept is subject to realisation of cheque',0,1);
$pdf->Cell(25,5,'2.This receipt should be carefully preserved and must be produced on demand.',0,1);
$pdf->Cell(25,5,'3.Fees once paid is not refundable/transferable under any circumstances',0,1);


$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,13,'',0,1);
$pdf->Cell(25,5,'Student/Parent Signature',0,0);
$pdf->Cell(0,5,'Authorized Signature',0,1,0);
$pdf->Cell(25,5,'',0,0);
$pdf->Cell(0,5,'Chahal Academy Pvt. Ltd.',0,1,0);

$pdf->Cell(0,10,'',0,1);



$pdf->SetFont('Arial','',10);
		$pdf->Cell(12);

		$pdf->Image('receipt_logo.jpg',10,143,30);
		$pdf->Cell(0,5,'Office No.104, First Floor, Ratna Business Square',0,1,0);
		$pdf->Cell(0,5,'Old Natraj Cinema, Opposite H.K. College',0,1,0);
		$pdf->Cell(0,5,'Ashram Rd, Ahmedabad, Gujarat 380009',0,1,0);
		$pdf->Cell(0,5,'GSTIN: 24AAICC1423E1Z9',0,1,0);
		$pdf->Ln(5);		

$sid=$_REQUEST['sid'];

$stmt = "SELECT * FROM `fees_receipt` ORDER BY invoice_no DESC LIMIT 1";
$stmt_exec = mysqli_query($conn, $stmt);
	if ($stmt_exec-> num_rows > 0) 
	{
		while ($row = $stmt_exec->fetch_assoc()) 
			
		{

				$pdf->Cell(20,5,'Invoice No:',0,0);
			$pdf->Cell(15,5,'AHEM -',0,0);
			$pdf->Cell(110,5,$row['invoice_no'] ,0,0,'L');
			$pdf->Cell(25,5,'Payment Date:',0,0,'L');
			$pdf->Cell(45,5,$row['date'],0,1,'L');

$pdf->Cell(25,5,'Receive From:',0,0);
$pdf->Cell(120,5,$row['name'] ,0,0,'L');
$pdf->Cell(20,5,'Contact No:',0,0);
$pdf->Cell(50,5,'(903)330-8708',0,1,'L');


$pdf->setTextColor(255,255,255);
$pdf->Cell(10,10,'S.No',1,0,'',true);
$pdf->Cell(30,10,'HSN/SAC code',1,0,'',true);
$pdf->Cell(60,10,'Particulars',1,0,'',true);
$pdf->Cell(20,10,'Amount',1,0,'',true);
$pdf->Cell(20,10,'CGST',1,0,'',true);
$pdf->Cell(20,10,'SGST',1,0,'',true);
$pdf->Cell(30,10,'Total Amount',1,1,'',true);


				$sno = $i++;
				
				$amount = $row['amount'];
				$modeofpay = $row['modeofpay'];
				$cheque_neftno = $row['cheque_neftno'];
				$cf = $amount * 3/4 * 1/1.18;
				$sm = $amount/4;
				$a = $amount - $cf - $sm;
				$cgst = $a/2; 
				$sgst = $cgst;
				$total = $cf + $cgst + $sgst;


				$pdf->setTextColor(1,1,1);
				$pdf->SetFont('Arial','',10);
				$pdf->Cell(10,10,'1' ,1,0,'L');
				$pdf->Cell(30,10,'999259',1,0,'L');
				$pdf->Cell(60,10,'Coaching Service Fees',1,0,'L');
				$pdf->Cell(20,10,round($cf,1) ,1,0,'L');
				$pdf->Cell(20,10,round($cgst,1) ,1,0,'L');
				$pdf->Cell(20,10,round($sgst,1) ,1,0,'L');
				$pdf->Cell(30,10,round($total,1) ,1,1,'L');

				$sno = $i++;
				$pdf->setTextColor(1,1,1);
				$pdf->SetFont('Arial','',10);
				$pdf->Cell(10,10,'2' ,1,0,'L');
				$pdf->Cell(30,10,'4901',1,0,'L');
				$pdf->Cell(60,10,'Study Material (Printed Books)',1,0,'L');
				$pdf->Cell(20,10,round($sm,1) ,1,0,'L');
				$pdf->Cell(20,10,'0.0',1,0,'L');
				$pdf->Cell(20,10,'0.0',1,0,'L');
				$pdf->Cell(30,10,round($sm,1) ,1,1,'L');

				$pdf->setTextColor(0,0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,3,'',0,1);
$pdf->Cell(26,5,'Payment Mode: ',0,0);
$pdf->Cell(15,5,$modeofpay,0,1,'L');
$pdf->Cell(30,5,'Cheque/NEFT No: ',0,0);
$pdf->Cell(115,5,$cheque_neftno,0,0);
$pdf->Cell(25,5,'Grand Total: ',0,0,'R');
$pdf->Cell(25,5,$row['amount'],0,1,'L');

			}
}




$pdf->SetFont('Arial','',10);
$pdf->Cell(0,3,'',0,1);
$pdf->Cell(25,5,'Terms and Conditions:',0,1);
$pdf->Cell(25,5,'1.This reciept is subject to realisation of cheque',0,1);
$pdf->Cell(25,5,'2.This receipt should be carefully preserved and must be produced on demand.',0,1);
$pdf->Cell(25,5,'3.Fees once paid is not refundable/transferable under any circumstances',0,1);


$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,13,'',0,1);
$pdf->Cell(25,5,'Student/Parent Signature',0,0);
$pdf->Cell(0,5,'Authorized Signature',0,1,0);
$pdf->Cell(25,5,'',0,0);
$pdf->Cell(0,5,'Chahal Academy Pvt. Ltd.',0,1,0);
$pdf->Output();
?>