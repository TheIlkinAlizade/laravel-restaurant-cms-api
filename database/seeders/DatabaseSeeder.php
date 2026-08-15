<?php

namespace Database\Seeders;

use App\Models\BusinessInfo;
use App\Models\GalleryImage;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->seedBusinessInfo();
        $this->seedMenu();
        $this->seedGallery();
    }

    private function seedBusinessInfo(): void
    {
        $business = BusinessInfo::current();

        $business->setTranslations('name', [
            'az' => 'Kafe Aurora',
            'en' => 'Café Aurora',
            'ru' => 'Кафе Аврора',
        ]);
        $business->setTranslations('tagline', [
            'az' => 'Qəhvə, şirniyyat və rahat bir məkan',
            'en' => 'Coffee, pastries, and a place to slow down',
            'ru' => 'Кофе, выпечка и место, где можно отдохнуть',
        ]);
        $business->setTranslations('about_text', [
            'az' => 'Kafe Aurora kiçik bir küncdə başladı — tələsmədən yaxşı qəhvə içmək istəyənlər üçün. Bu gün də hər səhər təzə bişiririk və hər kəs üçün sakit bir yer saxlayırıq.',
            'en' => 'Café Aurora started as a small corner spot for people who wanted good coffee without the rush. Today we still roast with care, bake fresh every morning, and keep the doors open for anyone who needs a quiet seat and a warm cup.',
            'ru' => 'Кафе Аврора начиналось как маленькое уютное место для тех, кто хотел хороший кофе без спешки. Сегодня мы всё так же печём свежую выпечку каждое утро и держим двери открытыми для всех, кому нужен тихий уголок и тёплая чашка.',
        ]);

        $business->fill([
            'phone' => '+994 50 123 45 67',
            'whatsapp' => '+994501234567',
            'instagram_url' => 'https://instagram.com/cafeaurora',
            'address_line' => '28 Nizami Street',
            'city' => 'Baku',
            'map_lat' => 40.3777,
            'map_lng' => 49.8920,
            'hours' => [
                'mon' => '08:00-19:00',
                'tue' => '08:00-19:00',
                'wed' => '08:00-19:00',
                'thu' => '08:00-19:00',
                'fri' => '08:00-20:00',
                'sat' => '09:00-20:00',
                'sun' => '09:00-17:00',
            ],
        ]);

        $business->save();
    }

    private function seedMenu(): void
    {
        $categories = [
            [
                'name' => ['az' => 'Qəhvə', 'en' => 'Coffee', 'ru' => 'Кофе'],
                'items' => [
                    [
                        'name' => ['az' => 'Espresso', 'en' => 'Espresso', 'ru' => 'Эспрессо'],
                        'description' => [
                            'az' => 'Qatı və aromatik, tək çəkim',
                            'en' => 'Rich and aromatic single shot',
                            'ru' => 'Насыщенный ароматный эспрессо',
                        ],
                        'price' => 3.50,
                    ],
                    [
                        'name' => ['az' => 'Cappuccino', 'en' => 'Cappuccino', 'ru' => 'Капучино'],
                        'description' => [
                            'az' => 'Espresso, buxarlanmış süd və köpük',
                            'en' => 'Espresso with steamed milk and foam',
                            'ru' => 'Эспрессо с молочной пенкой',
                        ],
                        'price' => 5.00,
                    ],
                    [
                        'name' => ['az' => 'Latte', 'en' => 'Latte', 'ru' => 'Латте'],
                        'description' => [
                            'az' => 'Yumşaq və krem kimi, süd üstünlük təşkil edir',
                            'en' => 'Smooth and creamy, milk-forward',
                            'ru' => 'Мягкий и кремовый, с преобладанием молока',
                        ],
                        'price' => 5.50,
                    ],
                    [
                        'name' => ['az' => 'Flat White', 'en' => 'Flat White', 'ru' => 'Флэт Уайт'],
                        'description' => [
                            'az' => 'Qatı espresso, incə süd köpüyü',
                            'en' => 'Strong espresso, velvety micro-foam',
                            'ru' => 'Крепкий эспрессо, бархатная молочная пенка',
                        ],
                        'price' => 5.50,
                    ],
                ],
            ],
            [
                'name' => ['az' => 'Səhər Yeməyi', 'en' => 'Breakfast', 'ru' => 'Завтрак'],
                'items' => [
                    [
                        'name' => ['az' => 'Avokado Tost', 'en' => 'Avocado Toast', 'ru' => 'Тост с авокадо'],
                        'description' => [
                            'az' => 'Çovdar çörəyi, əzilmiş avokado, limon, çili',
                            'en' => 'Sourdough, smashed avocado, lemon, chili flakes',
                            'ru' => 'Ржаной хлеб, авокадо, лимон, хлопья чили',
                        ],
                        'price' => 9.00,
                    ],
                    [
                        'name' => ['az' => 'Omlet', 'en' => 'Classic Omelette', 'ru' => 'Классический омлет'],
                        'description' => [
                            'az' => 'Üç yumurta, göbələk, pendir, göy otlar',
                            'en' => 'Three eggs, mushroom, cheese, fresh herbs',
                            'ru' => 'Три яйца, грибы, сыр, свежая зелень',
                        ],
                        'price' => 8.00,
                    ],
                    [
                        'name' => ['az' => 'Granola Qab', 'en' => 'Granola Bowl', 'ru' => 'Гранола боул'],
                        'description' => [
                            'az' => 'Ev granolası, yoğurt, mövsümi meyvələr, bal',
                            'en' => 'House granola, yogurt, seasonal fruit, honey',
                            'ru' => 'Домашняя гранола, йогурт, сезонные фрукты, мёд',
                        ],
                        'price' => 7.50,
                    ],
                ],
            ],
            [
                'name' => ['az' => 'Əsas Yeməklər', 'en' => 'Mains', 'ru' => 'Основные блюда'],
                'items' => [
                    [
                        'name' => ['az' => 'Toyuq Sendviç', 'en' => 'Grilled Chicken Sandwich', 'ru' => 'Сэндвич с курицей гриль'],
                        'description' => [
                            'az' => 'Marinatlanmış toyuq, kərəviz salatı, chiabatta',
                            'en' => 'Marinated chicken, slaw, ciabatta bread',
                            'ru' => 'Маринованная курица, слоу, чиабатта',
                        ],
                        'price' => 12.00,
                    ],
                    [
                        'name' => ['az' => 'Qidalı Bulqur Salatı', 'en' => 'Bulgur Power Salad', 'ru' => 'Салат с булгуром'],
                        'description' => [
                            'az' => 'Bulqur, nar, badam, göy otlar, limon sousu',
                            'en' => 'Bulgur, pomegranate, almonds, herbs, lemon dressing',
                            'ru' => 'Булгур, гранат, миндаль, зелень, лимонная заправка',
                        ],
                        'price' => 10.00,
                    ],
                    [
                        'name' => ['az' => 'Pasta al Pesto', 'en' => 'Pasta al Pesto', 'ru' => 'Паста al Pesto'],
                        'description' => [
                            'az' => 'Ev pestosu, parmesan, çırtma pomidor',
                            'en' => 'House pesto, parmesan, cherry tomato',
                            'ru' => 'Домашнее песто, пармезан, черри',
                        ],
                        'price' => 11.00,
                    ],
                ],
            ],
            [
                'name' => ['az' => 'Şirniyyatlar', 'en' => 'Desserts', 'ru' => 'Десерты'],
                'items' => [
                    [
                        'name' => ['az' => 'Şokolad Kruassan', 'en' => 'Chocolate Croissant', 'ru' => 'Шоколадный круассан'],
                        'description' => [
                            'az' => 'Xırtıldayan, isti şokolad ilə',
                            'en' => 'Flaky, warm, filled with dark chocolate',
                            'ru' => 'Хрустящий, тёплый, с тёмным шоколадом',
                        ],
                        'price' => 4.50,
                    ],
                    [
                        'name' => ['az' => 'Cheesecake', 'en' => 'New York Cheesecake', 'ru' => 'Чизкейк Нью-Йорк'],
                        'description' => [
                            'az' => 'Krem pendirli, giləmeyvə sousu ilə',
                            'en' => 'Creamy classic, served with berry compote',
                            'ru' => 'Классический, с ягодным компоте',
                        ],
                        'price' => 6.50,
                    ],
                ],
            ],
            [
                'name' => ['az' => 'Soyuq İçkilər', 'en' => 'Cold Drinks', 'ru' => 'Холодные напитки'],
                'items' => [
                    [
                        'name' => ['az' => 'Ice Latte', 'en' => 'Iced Latte', 'ru' => 'Айс латте'],
                        'description' => [
                            'az' => 'Buzlu espresso, soyuq süd',
                            'en' => 'Chilled espresso over cold milk',
                            'ru' => 'Холодный эспрессо с молоком',
                        ],
                        'price' => 5.50,
                    ],
                    [
                        'name' => ['az' => 'Limonad', 'en' => 'House Lemonade', 'ru' => 'Домашний лимонад'],
                        'description' => [
                            'az' => 'Təzə limon, nanə, soda',
                            'en' => 'Fresh lemon, mint, soda',
                            'ru' => 'Свежий лимон, мята, содовая',
                        ],
                        'price' => 4.00,
                    ],
                ],
            ],
        ];

        foreach ($categories as $catIndex => $categoryData) {
            $category = new MenuCategory();
            $category->setTranslations('name', $categoryData['name']);
            $category->sort_order = $catIndex;
            $category->save();

            foreach ($categoryData['items'] as $itemIndex => $itemData) {
                $item = new MenuItem();
                $item->menu_category_id = $category->id;
                $item->setTranslations('name', $itemData['name']);
                $item->setTranslations('description', $itemData['description']);
                $item->price = $itemData['price'];
                $item->image_path = $itemData['image_path'] ?? 'menu-items/placeholder.jpg';
                $item->is_available = true;
                $item->sort_order = $itemIndex;
                $item->save();
            }
        }
    }

    private function seedGallery(): void
    {
        $images = [
            [
                'caption' => ['az' => 'Kafenin interyeri', 'en' => 'Our cozy interior', 'ru' => 'Уютный интерьер'],
                'category' => 'interior',
            ],
            [
                'caption' => ['az' => 'Səhər hazırlıqları', 'en' => 'Morning prep', 'ru' => 'Утренняя подготовка'],
                'category' => 'food',
            ],
            [
                'caption' => ['az' => 'Barista işində', 'en' => 'Our barista at work', 'ru' => 'Бариста за работой'],
                'category' => 'people',
            ],
            [
                'caption' => ['az' => 'Təzə bişmiş kruassanlar', 'en' => 'Freshly baked croissants', 'ru' => 'Свежая выпечка'],
                'category' => 'food',
            ],
            [
                'caption' => ['az' => 'Açıq hava oturacaqları', 'en' => 'Outdoor seating', 'ru' => 'Летняя терраса'],
                'category' => 'interior',
            ],
        ];

        foreach ($images as $index => $imageData) {
            $gallery = new GalleryImage();
            $gallery->image_path = 'gallery/placeholder-' . ($index + 1) . '.jpg';
            $gallery->setTranslations('caption', $imageData['caption']);
            $gallery->category = $imageData['category'];
            $gallery->sort_order = $index;
            $gallery->save();
        }
    }
}