<?php
namespace Modules\Permission\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

class PermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Permission\Entities\Permission::class;


    protected $default_values =  [
        ['title' => 'ویرایش کاربر' , 'slug' => 'user.update'],
        ['title' => 'حذف کاربر' , 'slug' => 'user.delete'],
        ['title' => 'ایجاد کاربر' , 'slug' => 'user.create'],
        ['title' => 'ویرایش شرایط' , 'slug' => 'term.update'],
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
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $permission = $this->default_values[rand(0,16)];
        return [
            'title' => $permission['title'],
            'slug' => $permission['slug'],
        ];
    }
}

