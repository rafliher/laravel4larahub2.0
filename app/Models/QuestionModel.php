<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class QuestionModel {
    public static function get_all(){
        $questions = DB::table('questions')->get();
        return $questions;
    }
    public static function get_from($question_id){
        $question = DB::table('questions')->where('id', $question_id)->get();
        return $question;
    }
    public static function  insert($data){
        $new_data = DB::table('questions')->insert($data);
        return $new_data;
    }
    public static function  delete($id){
        $sucession = DB::table('questions')->where('id', '=', $id)->delete();
        return $sucession;
    }
    public static function  update($data){
        $sucession = DB::table('questions')
            ->where('id', $data['id'])
            ->update(['title' => $data['title'], 'content' => $data['content'], 'updated_at' => $data['updated_at']]);
        return $sucession;
    }
}