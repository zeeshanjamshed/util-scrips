<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

class TextFileController extends Controller
{
    //
    public function index(){
        return view('text');
    }
    public function testPost(Request $request){
        if ($request->hasFile('file')) {
            $file = $request->file->path();
            $text = file_get_contents($file);
            $myArray = [];
            $lines = explode(PHP_EOL, $text);
            $l = 0;
            foreach($lines as $line) {
                $myArray[$l] = explode("\t", $line);
                $l++;
            }
            // return $myArray;
            $path = $_SERVER['DOCUMENT_ROOT'] . "/text-files/";
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0775, true, true);
            }
            $myfile = $path . '/new-file.csv';
            $fp = fopen($myfile, "wb");
            $headers = array(
                '*ContactName','EmailAddress','POAddressLine1','POAddressLine2','POAddressLine3','POAddressLine4','POCity','PORegion','POPostalCode','POCountry','*InvoiceNumber','Reference','*InvoiceDate','*DueDate','Total','InventoryItemCode','*Description','*Quantity','*UnitAmount','Discount','*AccountCode','*TaxType','TaxAmount','TrackingName1','TrackingOption1','TrackingName2','TrackingOption2','Currency','BrandingTheme'
            );
            fputcsv($fp, $headers);
            $i = 0;
            foreach ($myArray as $x) {
                if(count($x) > 1){
                    if($i > 0){
                        $tmp_arr = array(
                            $x[0], "", $x[1], $x[2], $x[3], $x[4], "", "", "", "", $x[5], $x[6], $x[7], $x[8], $x[9], $x[10], $x[11], $x[12], $x[13], $x[14], $x[16], $x[17], $x[18], "", "", "", "", "", ""
                        );
                        fputcsv($fp, $tmp_arr);
                    }
                    $i++;
                }
            }
            fclose($fp);
            $data = file_get_contents($myfile);
            return $data;
        }else{
            return 'no file';
        }
    }
    public function testPost2(Request $request){
        if ($request->hasFile('file1') && $request->hasFile('file2')) {
            $file1 = $request->file1->path();
            $text1 = file_get_contents($file1);
            $myArray1 = [];
            $lines1 = explode(PHP_EOL, $text1);
            $l1 = 0;
            foreach($lines1 as $line) {
                $myArray1[$l1] = explode(",", $line);
                $l1++;
            }
            // return $myArray1;
            $file2 = $request->file2->path();
            $text2 = file_get_contents($file2);
            $myArray2 = [];
            $lines2 = explode(PHP_EOL, $text2);
            $l2 = 0;
            foreach($lines2 as $line) {
                $myArray2[$l2] = explode("\t", $line);
                $l2++;
            }
            // return $myArray2;
            $path = $_SERVER['DOCUMENT_ROOT'] . "/text-files/";
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0775, true, true);
            }
            $myfile = $path . '/awb.csv';
            $fp = fopen($myfile, "wb");
            $headers = array(
                '*Code','*Name','*Type','*Tax Code','Description','Dashboard','Expense Claims','Enable Payments','Balance'
            );
            fputcsv($fp, $headers);
            $i = 0;
            foreach ($myArray1 as $x) {
                if(count($x) > 1){
                    if($i > 0){
                        foreach($myArray2 as $a){
                            if(count($a) > 0 && $a[0] == $x[0]){
                                $b = $a[2];
                            }
                        }
                        $tmp_arr = array(
                            $x[0], $x[1], $x[2], $x[3], $x[4], $x[5], $x[6], $x[7], $b
                        );
                        fputcsv($fp, $tmp_arr);
                    }
                    $i++;
                }
            }
            fclose($fp);
            $data = file_get_contents($myfile);
            return $data;
        }else{
            return 'no file';
        }
    }
}
