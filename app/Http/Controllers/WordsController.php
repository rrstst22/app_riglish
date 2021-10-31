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
    public function getWords()
    {
        $words = Word::where('level', 'novice')->inRandomOrder()->take(10)->get();
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
                'result' => $request->result,
            )
        );
    }

    public function updateRecord(Request $request)
    {
        Record::where('id', $request->id)->update(
            array(
                'record->score' => $request->score,
                'record->date' => Carbon::now(),
            )
        );
        return $request->id; 
    }

}
