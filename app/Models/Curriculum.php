<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Grade;
use App\Models\DeliveryTime;

class Curriculum extends Model
{
    use HasFactory;

    protected $table = 'curriculums';

    protected $fillable = ['title', 'grade_id', 'description', 'thumbnail', 'alway_delivery_flg', 'video_url' ];

    public $timestamps = false;

    // Curriculumモデルがgradesテーブルとリレーション関係を結ぶためのメソッド
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id', 'id');
    }

    public function getCurriculum()
    {
        // テーブルからデータを取得
        $curriculum = DB::table('curriculums')
            ->join('grades', 'curriculums.grades_id', '=', 'grades.id')
            ->select('curriculums.*', 'grades.name as name')
            ->paginate(5);
        return $curriculum;
    }


    //登録
    public function registcurriculum_create($thumbnail)
    {
        DB::table('curriculums')->insert([
            'thumbnail' => $thumbnail
        ]);
    }

    public function registcurriculums($data)
    {
        // 登録処理
        DB::table('curriculums')->insert([
            'thumbnail' => $data['thumbnail']
        ]);
    }

    //配信時間のやつ
    public function deliveryTimes()
    {
        return $this->hasMany(DeliveryTime::class, 'curriculums_id', 'id');
    }


}