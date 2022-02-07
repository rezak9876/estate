<?php
namespace Modules\Facility\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

class FacilityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Facility\Entities\Facility::class;

    protected $default_title = [
        'پیش فروش',
        'مشارکتی',
        'معاوضه',
        'قابل تبدیل',
        'موقعیت اداری',
        'وام‌دار',
        'قیمت توافقی',
        'قدرالسهم',
        'پاساژ',
        'مال',
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => new Sequence($this->default_title)
        ];
    }
}

