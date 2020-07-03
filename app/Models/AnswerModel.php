<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class AnswerModel {
    public static function get_all(){
        $answers = DB::table('answers')->get();
        return $answers;
    }
    public static function get_from($question_id){
        $answers = DB::table('answers')->where('question_id', $question_id)->get();
        return $answers;
    }
    public static function  insert($data){
        $new_data = DB::table('answers')->insert($data);
        return $new_data;
    }
}