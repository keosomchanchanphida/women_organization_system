<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Exception;
use Illuminate\Support\Str;

class ExportPDFController extends Controller
{
    public function export(Request $request)
    {
        $data = [
            'index' => $request->index,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'date_of_birth' => $request->date_of_birth,
            'date_joined_women_union' => $request->date_joined_women_union,
            'date_joined_youth_union' => $request->date_joined_youth_union,
            'date_joined_trade_union' => $request->date_joined_trade_union,
            'date_joined_political_party' => $request->date_joined_political_party,
            'village_of_birth' => $request->village_of_birth,
            'living_village' => $request->living_village,
            'tribe' => $request->tribe,
            'religious' => $request->religious,
            'major' => $request->major,
            'education' => $request->education,
            'career' => $request->career,
            'state_position' => $request->state_position,
            'political_position' => $request->political_position,
            'graduated_place' => $request->graduated_place,
            'status' => $request->status,
            'phone_number' => $request->phone_number,
            'duty' => $request->duty,
        ];
        $fieldCount = 0;
        foreach($data as $i){
            if($i) $fieldCount++;
        }
        $fontSize = 11;
        if($fieldCount > 20) $fontSize = 7;
        else if($fieldCount > 17) $fontSize = 8;
        else if($fieldCount > 15) $fontSize = 9;
        else if($fieldCount > 14) $fontSize = 10;
        $data['fontSize'] = $fontSize;
        $ids = $request->members;
        $data['members'] = Member::where(function($query) use($ids){
            foreach($ids as $id){
                $query->orWhere('id', '=', $id);
            }
        })->orderBy('id')->get();
        $pdf = PDF::loadView('admin.export', $data)->setPaper('a4', 'landscape');
        $filename = Str::random(25).'.pdf';
        $pdf->save(public_path().'/storage/'.$filename);
        return response('/download/'.$filename);
    }

    public function download(String $filename)
    {
        try{
            return response()->download(public_path().'/storage/'.$filename)->deleteFileAfterSend(true);
        }catch(Exception $e){
            return abort(404);
        }
    }
}
