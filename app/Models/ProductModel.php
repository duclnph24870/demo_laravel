<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Quy ước đặt tên model
 * 
 */

class ProductModel extends Model
{
    use HasFactory;

    // ### Thuộc tính này sẽ giúp model xác định được bảng cần lấy trong db
    // Model có hỗ trợ sẵn 1 số các method như: 
    // protected | public
    protected $table = 'products';

    // ### Cấu hình khóa chính: mặc định laravel sẽ lấy filed id là khóa chính
    // protected | public
    protected $primaryKey = 'id';

    // ### Khi khóa chính không phải auto_increment và không phải kiểu số thì có config sau
    // public
    public $incrementing = false;

    // ###Định nghĩa kiểu dữ liệu cho khóa chính mặc định là int
    // protected | public
    protected $keyType = 'string';

    // ### Cấu hính timestamp
    // Mặc định laravel sẽ ngầm hiểu là db đã có sẵn 2 trường 'created_at' và 'updated_at', khi sửa bản ghi laravel sẽ update trường này
    // Cấu hình vô hiệu hóa timestamp
    // public
    public $timestamps = false;

    // ### Muốn đổi tên 2 trường của timestamp
    const CREATED_AT = 'thoi_gian_tao';
    const UPDATED_AT = 'thoi_gian_cap_nhap';

    // ### Cấu hính giá trị mặc định
    protected $attributes = [
        'price' => 0
    ];

    // ### Khai báo những trường có thể thêm vào db; trừ 2 trường timestamps đặc biệt ra
    protected $fillable = ['name','price','description'];

    public function getProducts () {
        return DB::table($this->table)->get();
    }
}

/**
 * Query Eloquent Model (các phương thức được model hỗ trợ sẵn)
 * ModelName::all() = Lấy ra tất cả bản ghi
 * ModelName::find($id) = Lấy ra 1 bản ghi theo khóa chính (id)
 */

 /**
  * Khi trả về nhiều bản ghi thì laravel sẽ trả về collections, collections có rất nhiều phương thức hỗ trợ để xử lý
  * https://laravel.com/docs/10.x/collections#available-methods
  */
