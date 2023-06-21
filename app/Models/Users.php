<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\GroupModel;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function group () {
        return $this->hasOne(GroupModel::class,'id','group_id');
    }

    static function getAllUsers () {
        $min = 20;
        $max = 100;
        DB::enableQueryLog();
        // $users = DB::select('SELECT * FROM users WHERE id > ?',[0]);
        // $users = DB::select('SELECT * FROM users WHERE username=:username',['username' => 'zerono']);
        $users = DB::table('users')
        // ->select('id','username','password as mat_khau')
        // ->where('id','>',1)
        // ->where('id',1)
        // ### Các trường hợp có and và or phức tạp
        // ->where(function ($query) use ($min,$max) {
        //     $query->where('id', '>',$min)->Where('id', '<',$max);
        // })

        // ### Lấy trong khoảng từ 0 đến 18 (có thể áp dụng với cả date)
        // ->whereBetween('id',[0,18])

        // ### Lấy tất cả trừ các id từ 0 -> 18
        // ->whereNotBetween('id',[0,18])

        // ### Lấy theo date (ngày, tháng, năm có các query: whereMonth,whereDay,whereYear)
        // ->whereDate('updated_at','2022-10-12')

        // ### Trả về các bản ghi có value 2 cột thỏa mãn điều kiện, khi dùng điều kiện and thì truyền vào mảng
        // ->whereColumn('id','= | > | < | <>','username')
        // ->whereColumn([['id','=','username'],['id','> ','username']])

        // ### join bảng (leftJoin và rightJoin tương tự)
        ->select('users.*','groups.name as group_name')
        ->join('groups','users.group_id','=','groups.id')

        // ### Sắp xếp dữ liệu
        // ->orderBy('group_id','desc')
        // sắp xếp ngẫu nhiên 
        // ->inRandomOrder()

        // ## Giới hạn (limit và offset) phương thức take() và skip() có chức năng tương tự
        // ->limit(2)
        // ->offset(1)

        ->get();

        // dd(DB::getQueryLog());

        return $users;
    }
}
