<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(ThanhVienTableSeeder::class);
    }
}

class ProductTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('product')->insert(
            [array('name'=>'Quần đá banh','price'=>50000,'cate_id'=>2),
            array('name'=>'Quần Tennis','price'=>55000,'cate_id'=>2),
            array('name'=>'Quần võ thuật','price'=>25000,'cate_id'=>2),
            array('name'=>'Quần cầu lông','price'=>50000,'cate_id'=>2)
            ]);
    }
}

class CateNewsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('cate_news')->insert(
            [
                ['name'=>'Thế giới'],
                ['name'=>'Thể thao'],
                ['name'=>'Âm nhạc']
            ]);
    }
}

class NewsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('news')->insert(
            [
                ['title'=>'Đây là tiêu đề 1','intro'=>'Đây là Intro 1','cate_id'=>1],
                ['title'=>'Đây là tiêu đề 2','intro'=>'Đây là Intro 2','cate_id'=>1],
                ['title'=>'Đây là tiêu đề 3','intro'=>'Đây là Intro 3','cate_id'=>1],
                ['title'=>'Đây là tiêu đề 4','intro'=>'Đây là Intro 4','cate_id'=>1],
            ]);
    }
}

class ImagesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('image')->insert(
            [
                ['name'=>'hinh_quantennis_1.png','product_id'=>1],
                ['name'=>'hinh_quantennis_2.png','product_id'=>1],
                ['name'=>'hinh_quantennis_3.png','product_id'=>1],
                ['name'=>'hinh_quantennis_4.png','product_id'=>1],
            ]);
    }
}

class CarTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('cars')->insert(
            [
                ['name'=>'BMW','price'=>1],
                ['name'=>'Audi','price'=>1],
                ['name'=>'Honda','price'=>1],
                ['name'=>'Suzuki','price'=>1],
                ['name'=>'Porsche','price'=>1],
                ['name'=>'Huyndai','price'=>1],
            ]);
    }
}

class ColorTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('colors')->insert(
            [
                ['name'=>'red'],
                ['name'=>'black'],
                ['name'=>'blue'],
                ['name'=>'white'],
            ]);
    }
}

class CarColorTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('car_colors')->insert(
            [
                ['car_id'=>1,'color_id'=>1],
                ['car_id'=>2,'color_id'=>1],
                ['car_id'=>3,'color_id'=>1],
                ['car_id'=>4,'color_id'=>2],
                ['car_id'=>4,'color_id'=>3],
                ['car_id'=>4,'color_id'=>4],
                ['car_id'=>5,'color_id'=>1],
            ]);
    }
}

class ThanhVienTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('thanh_viens')->insert(
            [
                ['user'=>'teo','pass'=>Hash::make(12345),'level'=>1],
                ['user'=>'tun','pass'=>Hash::make(12345),'level'=>2],
                ['user'=>'tin','pass'=>bcrypt(12345),'level'=>2],
            ]);
    }
}
