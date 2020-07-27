<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Faculty_tables extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('faculty_tables')->insert([
           ['id'=>1,'NameFaculty'=>'Viện Kĩ Thuật-Công Nghệ','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
           ['id'=>2,'NameFaculty'=>'Viện Giáo dục','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
           ['id'=>3,'NameFaculty'=>'Viện Văn Hóa','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
           ['id'=>4,'NameFaculty'=>'Viện Kinh tế','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
           
            ]);
       
    }
}