<?php

use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('hoclaravel',function(){
    echo "Chào mừng bạn đến với khóa học lập trình laravel tại khoa phạm";
});

Route::get('thongtin','PageController@showInfo');

Route::get('khoa-hoc',function(){
    return "Lập trình Laravel 5 tại khoa phạm";
});
Route::get('khoa-hoc/lap-trinh-php',function(){
    return "Khóa học lập trình php";
});

// Truyền giá trị vào tham số nhận được qua URL
Route::get('lap-trinh/{monhoc}/{thoigian}',function($monhoc,$thoigian){
    return "Khóa học lập trình: $monhoc lúc $thoigian giờ";
});
// Không biết tham số truyền vào tenmonan .Có thể gán giá trị mặc định vào tham số ẩn đó.
Route::get('mon-an/{tenmonan?}',function($tenmonan = "KFC"){
    return $tenmonan;
});
// điều kiện where ho ten không có số và số điện thoại là 10 số
// http://lythuyet.test:801/thong-tin/cuong/0123456789
Route::get('thong-tin/{hoten}/{sodienthoai}',function($hoten,$sodienthoai){
    return "Thông tin của bạn là: $hoten có số điện thoại là $sodienthoai";
})->where(['hoten'=>'[a-zA-Z]+','sodienthoai'=>'[0-9]{10}']);

Route::get('call-view',function(){
    $hoten = "Tuấn đẹp trai";
    $view = "Admin";
    return view('view',compact('hoten','view'));
});

Route::get('test-controller','PageController@testAction');

Route::get('ho-chi-minh',[
    'as'=>'hcm',function(){
        return "Hồ chí minh đẹp lắm bạn ơi";
    }
]);
Route::group(['prefix'=>'thuc-don'],function(){
    Route::get('bun-bo',function(){
        echo "Đây là trang bán bún bò";
    });
    Route::get('bun-mam',function(){
        echo "Đây là trang bán bún mắm";
    });
    Route::get('bun-moc',function(){
        echo "Đây là trang bán bún mộc";
    });
});

Route::get('goi-view',function(){
    return view('tintuc.them-tin-tuc');
});

Route::get('goi-layout',function(){
    return view('tintuc.layout');
});
// view::share sử dụng cho tất cả các view
View::share('title','Lập trình Laravel 5x');
// Sử dụng cho các view được chỉ định
View::composer(['tintuc.layout','tintuc.them-tin-tuc'],function($view){
    return $view->with('thongtin','Đây là trang cá nhân');
});

Route::get('check-view',function(){
    if(view()->exists('tintuc.them-tin-tuc'))
    {
        echo "Tồn tại view";
    }
    else{
        echo "Không tồn tại view";
    }
});

Route::get('goi-master',function(){
    return view('views.layout');
});

Route::get('url/full',function(){
    return URL::full();
});

Route::get('url/asset',function(){
    // return URL::asset('css/mystyle.css');
    return asset('css/mystyle.css',true);
});

// Nếu thêm true vào sẽ hiện đường dẫn https
// Ngược lại là http
Route::get('url/to',function(){
    return URL::to('thong-tin',['Cuong','0123456789'],true);
});
// Không cần true vẫn hiện https
Route::get('url/secure',function(){
    return secure_url('thong-tin',['Cuong','0123456789']);
});

Route::get('schema/create',function(){
    Schema::create('khoapham',function($table){
        $table->increments('id');
        $table->string('tenmonhoc');
        $table->integer('gia');
        $table->text('ghichu')->nullable();
        $table->timestamps();
    });
});

Route::get('schema/rename',function(){
    Schema::rename('khoapham','kpt');
});

Route::get('schema/drop',function(){
    Schema::drop('kpt');
});

Route::get('schema/drop-exists',function(){
    Schema::dropIfExists('khoapham');
});

Route::get('schema/change-col-attr',function(){
    Schema::table('khoapham',function($table){
        $table->string('tenmonhoc',50)->change();
    });
});

Route::get('schema/drop-col',function(){
    Schema::table('khoapham',function($table){
        $table->dropColumn(['tenmonhoc','gia']);
    });
});

Route::get('schema/create/cate',function(){
    Schema::create('category',function($table){
        $table->increments('id');
        $table->string('name');
        $table->timestamps();
    });
});
// Không xóa được những id đã được liên kết với khóa ngoại
// Route::get('schema/create/product',function(){
//     Schema::create('product',function($table){
//         $table->increments('id');
//         $table->string('name');
//         $table->integer('price');
//         $table->integer('cate_id')->unsigned();
//         $table->foreign('cate_id')->references('id')->on('category');
//         $table->timestamps();
//     });
// });

// Có thể xóa được các khóa ngoại
Route::get('schema/create/product1',function(){
    Schema::create('product',function($table){
        $table->increments('id');
        $table->string('name');
        $table->integer('price');
        $table->integer('cate_id')->unsigned();
        $table->foreign('cate_id')->references('id')->on('category')->onDelete('cascade');
        $table->timestamps();
    });
});
// Chọn tất cả
Route::get('query/select-all',function(){
    $data= DB::table('product')->get();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});
// Chọn cột
Route::get('query/select-cols',function(){
    $data= DB::table('product')->select('name')->where('id',4)->get();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});
// Where và orWhere
Route::get('query/where-or',function(){
    $data= DB::table('product')->where('cate_id',2)->orWhere('price',50000)->get();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});
// điều kiện 2 where
Route::get('query/where',function(){
    $data= DB::table('product')->where('cate_id',2)->Where('price',50000)->get();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});
Route::get('query/order',function(){
    // $data = DB::table('product')->orderBy('id','desc')->get();
    $data = DB::table('product')->select('name')->where('price','>',50000)->orderBy('price','asc')->get();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('query/take',function(){
    $data = DB::table('product')->skip(2)->take(2)->get();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});
//Lấy các dòng trong khoảng [3,5]
Route::get('query/between',function(){
    // $data = DB::table('product')->whereBetween('id',[3,5])->get();
    $data = DB::table('product')->whereNotBetween('id',[3,5])->get();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});
// Hiển thị dòng có id là 2 và 4
Route::get('query/where-in',function(){
    // $data = DB::table('product')->whereIn('id',[2,4])->get();
    $data = DB::table('product')->whereNotIn('id',[2,4])->get();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});
// where null
Route::get('query/where-null',function(){
    // $data = DB::table('product')->whereIn('id',[2,4])->get();
    $data = DB::table('product')->whereNull('created_at')->get();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('query/calculator',function(){
    $data=DB::table('product')->max('price');
    $data1=DB::table('product')->min('price');
    $data2=DB::table('product')->count();
    $data3=DB::table('product')->avg('id');
    $data4=DB::table('product')->sum('id');
    echo "Số lốn nhất :" . $data . "<br/>";
    echo "Số nhỏ nhất :" . $data1 . "<br/>";
    echo "Tổng số phần tử: " . $data2 . "<br/>";
    echo "Trung bình cộng: " . $data3 . "<br/>";
    echo "Sum là : " . $data4 . "<br/>";
});

Route::get('schema/create/cate',function(){
    Schema::create('cate_news',function($table){
        $table->increments('id');
        $table->string('name');
        $table->timestamps();
    });
});

Route::get('schema/create/news',function(){
    Schema::create('news',function($table){
        $table->increments('id');
        $table->string('title');
        $table->string('intro');
        $table->integer('cate_id')->unsigned();
        $table->timestamps();
    });
});

Route::get('schema/create/images',function(){
    Schema::create('images',function($table){
        $table->increments('id');
        $table->string('name');
        $table->integer('product_id')->unsigned();
        $table->timestamps();
    });
});

Route::get('query/join',function(){
    $data=DB::table('news')->select('title','name')->join('cate_news','news.cate_id','=','cate_news.id')->get();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('query/insert',function(){
    DB::table('product')->insert([
        'name'=>'Quần đi Biển2',
        'price'=>500000,
        'cate_id'=>2
    ]);
    return "Insert thành công";
});

Route::get('query/insertmulti',function(){
    DB::table('product')->insert([
        ['name'=>'Quần đi Biển2','price'=>500000, 'cate_id'=>2],
        ['name'=>'Quần đi Biển3','price'=>600000, 'cate_id'=>2],
        ['name'=>'Quần đi Biển4','price'=>700000, 'cate_id'=>2],
        ['name'=>'Quần đi Biển5','price'=>800000, 'cate_id'=>2],
    ]);
    return "Insert thành công";
});

Route::get('query/insert-get-id',function(){
    $id = DB::table('product')->insertGetId(
        ['name'=>'Quần Đi Bơi',
        'price'=>50000,
        'cate_id'=>2]
    );
    echo $id;
});

Route::get('query/update',function(){
    DB::table('product')->where('id','<',10)->update([
        'name'=>'Quần bơi',
        'price'=>'281598179']);
    return "Update thành công";
});

Route::get('query/delete',function(){
    // DB::table('product')->where('id',10)->delete();
    // Xóa tất cả dữ liệu trong bảng
    DB::table('product')->delete();
    return "Delete thành công";
});

Route::get('model/select-all',function(){
    $data = App\Product::all()->tojSon();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});
// FindOrFail Tìm thấy trả về giá trị .Không tìm thấy báo lỗi
Route::get('model/select-id',function(){
    $data = App\Product::findOrFail(4)->toArray();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});
// FirstOrFail Tìm thấy trả về giá trị .Không tìm thấy báo lỗi
Route::get('model/where',function(){
    $data = App\Product::where('price',523500000)->firstOrFail()->get()->toArray();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});
// select() đặt đằng sau get()
Route::get('model/take',function(){
    $data = App\Product::where('price',500000)->take(2)->select('name')->get()->toArray();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('model/count',function(){
    $data = App\Product::count();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('model/raw',function(){
    $data = App\Product::whereRaw('price = ? And id = ?',[500000,4])->get()->toArray();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('model/insert',function(){
    $product = new App\Product;
    $product->name = 'quẩn công sở';
    $product->price = 500000;
    $product->cate_id=2;
    $product->save();
    echo "Finish";
});

Route::get('model/create',function(){
    $data = array(
        'name' =>'Quẩn Jean kaki',
        'price'=> 100000,
        'cate_id' =>2,
    );
    App\Product::create($data);
    echo " Finish success";
});

Route::get('model/update',function(){
    $data = App\Product::find(5);
    $data->name='quần jean đen';
    $data->price= 10000000;
    $data->save();
    return "Thành công";
});

Route::get('model/delete',function(){
    // App\Product::find(5)->delete();
    App\Product::destroy(6);
    return "Xóa thành công";
});

Route::get('relation/one-many-1',function(){
    $data = App\Product::find(1)->images()->get()->toArray();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('relation/one-many-2',function(){
    $data = App\Image::find(4)->product()->get()->toArray();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('relation/many-many-1',function(){
    $data = App\Cars::find(4)->Color()->select('name')->get()->toArray();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('relation/many-many-2',function(){
    $data = App\Colors::find(1)->car()->select('name')->get()->toArray();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

Route::get('form/layout',function(){
    return view('form.layout');
});

Route::post('form/data',['as'=>'sendEmail',function(){
    return "Oke";
}]);

Route::get('form/dang-ky',function(){
    return view('form.dangky');
});

Route::post('form/dang-ky-thanh-vien',['as'=>'postDangKy',
        'uses'=>'KhoaPhamController@them']);
// Route::any('{all?}','KhoaPhamController@index')->where('all','(.*)');

Route::get('response/basic',function(){
    return "Đào tạo Tin Học Khoa Phạm";
});

Route::get('response/json',function(){
    $arr= array(
        'mon hoc' => 'Laravel Framework Verson 5.X',
        'giang vien' => 'Mr Vũ Quốc Tuấn',
        'thoi gian' => '2 tháng'
    );
    return Response::json($arr);
});

Route::get('response/xml',function(){
    $content = '<?xml version="1.0" encoding="UTF-8"?>
    <root>
        <trungtam>Khoa Pham Training</trungtam>
        <danhsach>
            <monhoc>Lập trình Laravel</monhoc>
            <monhoc>Lập trình Swift</monhoc>
        </danhsach>
    </root>';
    $status =200;
    $value ='text/xml';
    return response($content,$status)->header('Content-type',$value);
});

Route::get('response/redirect',function(){
    // return redirect('response/xml');
    return redirect()->route('resdemo')->with([
        'level'=>'info',
        'messages' => 'Chào bạn đây là thông báo nguy hiểm'
    ]);
});

Route::get('response/demo',['as'=>'resdemo',function(){
    return view('response.demo');
}]);
//Quay lại trang lúc trước
Route::get('response/redirect/back',function(){
    return redirect()->back();
});

Route::get('response/download',function(){
    $url = 'download/demo.rar';
    return Response::download($url);
});
// Xóa luôn file cần download ở trong public/download/demo.rar
Route::get('response/downloadAndDelete',function(){
    $url = 'download/demo.rar';
    return Response::download($url)->deleteFileAfterSend(true);
});

Route::get('response/macro/cap',function(){
    return response()->cap('Khóa học lập trình laravel');
});

Route::get('response/macro/contact',function(){
    return response()->contact('http://lythuyet.test:801/response/macro/cap');
});

Route::get('authen/login',['as'=>'getLogin','uses'=>'ThanhVienController@getLogin']);
Route::post('authen/login',['as'=>'postLogin','uses'=>'ThanhVienController@postLogin']);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('authentication/getRegister',['as'=>'getRegister',
    'uses'=>'Auth\RegisterController@getRegister'
]);

Route::post('authentication/postRegister',['as'=>'postRegister',
    'uses'=>'Auth\RegisterController@postRegister'
]);

Route::get('authentication/getLogin',['as'=>'getLogin',
    'uses'=>'Auth\LoginController@getLogin'
]);

Route::post('authentication/postLogin',['as'=>'postLogin',
    'uses'=>'Auth\LoginController@postLogin'
]);

Route::get('authentication/demo',function(){
    return view('views.layout');
});

Route::resource('hocsinh','HocSinhController');
