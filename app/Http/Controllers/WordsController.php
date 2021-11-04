<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;
use App\Models\Record;
use App\Models\Word_record;
use Carbon\Carbon;
use DateTime;

class WordsController extends Controller
{
    public function index(Request $request)
    {
        $level = $request->level;
        return view('question', compact('level'));
    }

    public function getWords(Request $request)
    {
        $words = Word::where('level', $request->level)->inRandomOrder()->take(6)->get();
        return $words;
    }

    public function createRecord()
    {
        $record = Record::create(
            array(
                'user_id' => 1,
                'score' => null,
                'date' => null,
            )
        );
        return $record->id; 
    }

    public function saveResult(Request $request)
    {
        $word_record = Word_record::create(
            array(
                'word_id' => $request->word_id,
                'record_id' => $request->record_id,
                'result' => $request->result
            )
        );
    }

    public function updateRecord(Request $request)
    {
        Record::where('id', $request->id)->update(
            array(
                'score' => $request->score,
                'date' => Carbon::now(),
            )
        );
        return $request->id; 
    }

    public function showResult(Request $request)
    {
        $words = Word_record::where('record_id', $request->record_id)
        ->join('words','word_records.word_id','=','words.id')
        ->join('records','word_records.record_id','=','records.id')
        ->orderBy('word_records.id')
        ->get();

        return $words;
    }

}
