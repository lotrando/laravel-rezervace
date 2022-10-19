<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Mpdf\Mpdf as PDF;

class PdfController extends Controller
{
    public function protocol()
    {


        // Setup a filename 
        $documentFileName = "protocol.pdf";
 
        // Create the mPDF document
        $document = new PDF( [
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_header' => '3',
            'margin_top' => '10',
            'margin_bottom' => '10',
            'margin_footer' => '2',
            'default_font' => 'arial',
        ]);     
 
        // Set some header informations for output
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$documentFileName.'"'
        ];

        $document->SetSourceFile('docs/priloha.pdf');
 
        $document->WriteHTML(view('protocol'));

        // Save PDF on your public storage 
        Storage::disk('public')->put($documentFileName, $document->Output($documentFileName, "S"));
         
        // Get file back from storage with the give header informations
        return Storage::disk('public')->download($documentFileName, 'Request', $header); //
    }
}
