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

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('permission_role')->truncate();
        DB::table('permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $permissions = [
            ['title' => 'ویرایش کاربر', 'slug' => 'users.edit'],
            ['title' => 'حذف کاربر', 'slug' => 'users.delete'],
            ['title' => 'ایجاد کاربر', 'slug' => 'users.create'],
            ['title' => 'آپدیت شرایط', 'slug' => 'terms.edit'],
            ['title' => 'پاک کردن شرایط', 'slug' => 'terms.delete'],
            ['title' => 'ایجاد شرایط', 'slug' => 'terms.create'],
            ['title' => 'ویرایش تنظیمات', 'slug' => 'settings.edit'],
            ['title' => 'ویرایش نقش', 'slug' => 'roles.edit'],
            ['title' => 'حذف نقش', 'slug' => 'roles.delete'],
            ['title' => 'ایجاد نقش', 'slug' => 'roles.create'],
            ['title' => 'ویرایش صفحات', 'slug' => 'pages.edit'],
            ['title' => 'پاک کردن صفحات', 'slug' => 'pages.delete'],
            ['title' => 'ایجاد صفحات', 'slug' => 'pages.create'],
            ['title' => 'ویرایش امکانات', 'slug' => 'facilities.edit'],
            ['title' => 'حذف امکانات', 'slug' => 'facilities.delete'],
            ['title' => 'ایجاد امکانات', 'slug' => 'facilities.create'],
            ['title' => 'ویرایش آگهی', 'slug' => 'estates.edit'],
            ['title' => 'حذف آگهی', 'slug' => 'estates.delete'],
            ['title' => 'اکسل آگهی', 'slug' => 'estates.excel'],
            ['title' => 'مشاهده پیام', 'slug' => 'chats.show'],
            ['title' => 'پاسخ به پیام', 'slug' => 'chats.send_chat'],
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
