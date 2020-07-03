<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionModel;

use function GuzzleHttp\Promise\all;

class QuestionController extends Controller
{
    //
    public function index(){
        $questions = QuestionModel::get_all();
        return view('question.index', compact('questions'));
    }
    public function create(){
        return view('question.form');
    }
    public function insert(Request $request){
        $data = $request->all();
        unset($data["_token"]);
        $data['created_at'] = $data['updated_at'] = date('Y-m-d H:i:s');
        QuestionModel::insert($data);
        return redirect()->action('QuestionController@index');
    }
    public function delete($id){
        $question = QuestionModel::delete($id);
        return redirect()->action('QuestionController@index');
    }
    public function edit($id){
        $question = QuestionModel::get_from($id)[0];
        return view('question.form_edit', compact('question'));
    }
    public function update(Request $request, $id){
        $data = $request->all();
        unset($data["_token"]);
        $data['id'] = $id;
        $data['updated_at'] = date('Y-m-d H:i:s');
        QuestionModel::update($data);
        return redirect()->action('QuestionController@index');
    }
}
