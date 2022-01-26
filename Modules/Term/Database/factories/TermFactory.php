<?php
namespace Modules\Term\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

class TermFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Term\Entities\Term::class;

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

