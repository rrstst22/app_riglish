<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word_record;
use PDF;

class PDFController extends Controller
{
    public function index(Request $request){

        $words = Word_record::where('record_id', $request->record_id)
        ->join('words','word_records.word_id','=','words.id')
        ->join('records','word_records.record_id','=','records.id')
        ->orderBy('word_records.id')
        ->get();

    	$pdf = PDF::loadView('result', ['words' => $words ]);

    	return $pdf->stream();

    }
}
