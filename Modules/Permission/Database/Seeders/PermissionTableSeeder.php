<?php

namespace Modules\Permission\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Permission\Entities\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $permissions = [
            ['title' => 'ویرایش کاربر' , 'slug' => 'user.update'],
            ['title' => 'حذف کاربر' , 'slug' => 'user.delete'],
            ['title' => 'ایجاد کاربر' , 'slug' => 'user.create'],
            ['title' => 'آپدیت شرایط' , 'slug' => 'term.update'],
            ['title' => 'پاک کردن شرایط' , 'slug' => 'term.delete'],
            ['title' => 'ایجاد شرایط' , 'slug' => 'term.create'],
            ['title' => 'ویرایش تنظیمات' , 'slug' => 'setting.update'],
            ['title' => 'ویرایش نقش' , 'slug' => 'role.update'],
            ['title' => 'حذف نقش' , 'slug' => 'role.delete'],
            ['title' => 'ایجاد نقش' , 'slug' => 'role.create'],
            ['title' => 'ویرایش صفحات' , 'slug' => 'page.update'],
            ['title' => 'پاک کردن صفحات' , 'slug' => 'page.delete'],
            ['title' => 'ایجاد صفحات' , 'slug' => 'page.create'],
            ['title' => 'ویرایش امکانات' , 'slug' => 'facility.update'],
            ['title' => 'حذف امکانات' , 'slug' => 'facility.delete'],
            ['title' => 'ایجاد امکانات' , 'slug' => 'facility.create'],
            ['title' => 'ویرایش آگهی' , 'slug' => 'estate.update'],
            ['title' => 'حذف آگهی' , 'slug' => 'estate.delete'],
            ['title' => 'ایجاد آگهی' , 'slug' => 'estate.create'],
        ];
        foreach ($permissions as $permission) {
            DB::table('permissions')->insert(
                [
                    'title' => $permission['title'],
                    'slug' => $permission['slug'],
                ]
            );
        }

        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            DB::table('permission_role')->insert(
                [
                    'role_id' => 1,
                    'permission_id' => $permission->id,
                ]
            );
        }
    }
}
