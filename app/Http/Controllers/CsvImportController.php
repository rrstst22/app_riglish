<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SplFileObject;
use App\Models\Word;

class CsvImportController extends Controller
{
    public function import(Request $request)
    {
        setlocale(LC_ALL, 'ja_JP.UTF-8');

        //ファイルパスを取得
        $uploaded_file = $request->file('csv_file');
        $file_path = $request->file('csv_file')->path($uploaded_file);

        //SplRileObjectを使用しファイルを読み込み
        $file = new SplFileObject($file_path);
        $file->setFlags(SplFileObject::READ_CSV);

        $array = [];
        $row_count = 1;
        
        foreach ($file as $row)
        {
            //最終行の空白を処理
            if ($row === [null]) continue; 
            
            //1行目の題目は無視
            if ($row_count > 1)
            {
                        
                //一行分を配列へ格納
                $csvimport_array = [
                    'en' => $row[0], 
                    'jp' => $row[1], 
                    'level' => $row[2], 
                    'frequency' => $row[3],
                    'reputation' => $row[4]
                ];

                // $array配列へ格納（追加）
                array_push($array, $csvimport_array);
            }

            $row_count++;

        }
        
        //追加した配列の数をカウント
        $array_count = count($array);

        //もし配列の数が500未満なら
        if ($array_count < 500){

            //バルクインサート
            Word::insert($array);


        } else {
            
            //追加した配列が500以上なら、array_chunkで500ずつ分割
            $array_partial = array_chunk($array, 500);
    
            //分割した数をカウント
            $array_partial_count = count($array_partial);

            //分割した数の分だけインポートの繰り替えし
            for ($i = 0; $i <= $array_partial_count - 1; $i++){
                Word::insert($array_partial[$i]);
            }

        }

        return redirect('import')->with('flash_message', '完了しました');
    }
}
