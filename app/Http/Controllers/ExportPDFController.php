<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Exception;
use Illuminate\Support\Str;

class ExportPDFController extends Controller
{
    public function export()
    {
        $pdf = PDF::loadView('admin.export')->setPaper('a4', 'landscape');
        $filename = Str::random(25).'.pdf';
        $pdf->save(public_path().'/storage/'.$filename);
        return response('/download/'.$filename);
    }

    public function download(String $filename)
    {
        try{
            return response()->download(public_path().'/storage/'.$filename);
        }catch(Exception $e){
            return abort(404);
        }
    }
}
