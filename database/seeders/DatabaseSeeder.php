<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $txt = "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.";

        /* User Data */
        $json = File::get(public_path() . '/files/users.json');
        $objs = json_decode($json);
        foreach($objs as $obj){
            DB::table('users')->insert([
                'name'       => $obj->name,
                'email'      => $obj->email,
                'phone'      => $obj->phone,
                'address'    => $obj->address,
                'password'   => Hash::make('password'),
                'created_at' => $obj->created_at,
            ]);
        }

        /* Admin User Data */
        $json = File::get(public_path() . '/files/admins.json');
        $objs = json_decode($json);
        foreach($objs as $obj){
            DB::table('admins')->insert([
                'name'       => $obj->name,
                'email'      => $obj->email,
                'phone'      => $obj->phone,
                'address'    => $obj->address,
                'nrc'        => $obj->nrc,
                'gender'     => $obj->gender,
                'password'   => Hash::make('password'),
                'created_at' => $obj->created_at,
            ]);
        }

        /* Category Data */
        $json = File::get(public_path() . '/files/categories.json');
        $objs = json_decode($json);
        foreach($objs as $obj){
            DB::table('categories')->insert([
                'name'       => $obj->name,
                'slug'       => Str::slug($obj->slug),
                'created_at' => $obj->created_at,
            ]);
        }

        /* Product Data */
        $json = File::get(public_path() . '/files/products.json');
        $objs = json_decode($json);
        foreach($objs as $obj){
            DB::table('products')->insert([
                'category_id' => $obj->category_id,
                'name'        => $obj->name,
                'price'       => $obj->price,
                'stock'       => rand(1, 50),
                'slug'        => Str::slug($obj->name),
                'image'       => Str::slug($obj->name).".jpg",
                'description' => $txt,
                'created_at'  => $obj->created_at,
            ]);
        }

        /* Roles and Permissions Table Seeder */
        $this->call(RolesAndPermissionsSeeder::class);
    }
}
