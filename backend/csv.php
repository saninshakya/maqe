<?php
include 'classes/coupon.php';

    $filename = "section2.csv";

    header('Pragma: public');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Content-Description: File Transfer');
    header('Content-Type: text/csv');
    header("Content-Disposition: attachement; filename={$filename}");
    header('Content-Transfer-Encoding: binary'); 
    $fp = fopen('php://output', 'w');
    fputs($fp, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));

    if ($fp)
    {
        fputcsv($fp, array("No.", "Code"));
          $coupons = Coupon::generateCoupons();
           if (count($coupons) > 0) {
                foreach ($coupons as $key => $value) {
                    fputcsv($fp, array($key+1, $value));

                }  
           }
    }

    fclose($fp);
?>