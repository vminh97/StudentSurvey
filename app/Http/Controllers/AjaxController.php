<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\faculty_table;
use App\branch;
use App\term;
use App\classer;
use App\subject;
use App\teacher;

class AjaxController extends Controller
{
    public function getBranch($id){
        $branchs = branch::where('id_faculty', $id)->get();
        echo "<option> Chọn ngành</option>";
        foreach($branchs as $br){
            echo "<option value='" . $br->id . "'>" . $br->NameBranch . "</option>";
        }
    }

    public function getTerm($id){
        $datas = term::where('id_branch', $id)->get();
        echo "<option> Chọn Học Phần</option>";
        foreach($datas as $dt){
            echo "<option value='" . $dt->id . "'>" . $dt->NameTerm . "</option>";
        }
    }

    public function getClass($id){
        $datas = classer::where('id_term', $id)->get();
        echo "<option> Chọn Học Phần</option>";
        foreach($datas as $dt){
            echo "<option value='" . $dt->id . "'>" . $dt->NameClass . "</option>";
        }
    }

    public function getSubject($id){
        $datas = subject::where('id_faculty', $id)->get();
        echo "<option> Chọn Bộ Môn</option>";
        foreach($datas as $dt){
            echo "<option value='" . $dt->id . "'>" . $dt->NameSubject . "</option>";
        }
    }

    public function getTeacher($id){
        $datas = teacher::where('id_subject', $id)->get();
        echo "<option> Chọn Giáo Viên</option>";
        foreach($datas as $dt){
            echo "<option value='" . $dt->id . "'>" . $dt->NameTeacher . "</option>";
        }
    }
}
