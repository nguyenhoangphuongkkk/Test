<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory,
    SoftDeletes;
    protected $table = "students";//đúng tên bảng trong cơ sở dữ liệ
    protected $fillable = ['id','email','name','image']; // định nghĩa những trường csdl gán trong model để add được giá trị lên
    
}
