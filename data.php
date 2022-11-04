<?php 
$products = [
    [
        'id' => 1,
        'name' => 'Tôn Ngộ Không ngoại truyện',
        'image' => 'demo.png',
        'price' => 500000,
        'category_id' => 1
    ],
    [
        'id' => 1,
        'name' => 'Tôn Ngộ Không ngoại truyện',
        'image' => 'demo.png',
        'price' => 500000,
        'category_id' => 3
    ],
    [
        'id' => 1,
        'name' => 'Tôn Ngộ Không ngoại truyện',
        'image' => 'demo.png',
        'price' => 500000,
        'category_id' => 1
    ],
    [
        'id' => 1,
        'name' => 'Tôn Ngộ Không ngoại truyện',
        'image' => 'demo.png',
        'price' => 500000,
        'category_id' => 2
    ],
    [
        'id' => 1,
        'name' => 'Tôn Ngộ Không ngoại truyện',
        'image' => 'demo.png',
        'price' => 500000,
        'category_id' => 1
    ], [
        'id' => 1,
        'name' => 'Tôn Ngộ Không ngoại truyện',
        'image' => 'demo.png',
        'price' => 500000,
        'category_id' => 2
    ],

];

$categories = [
    [
        'id' => 1,
        'name' => 'Men'
    ],
    [
        'id' => 2,
        'name' => 'Women'
    ],
    [
        'id' => 3,
        'name' => 'Baby'
    ]
];

function getProductByCate($catId)
{
    global $products;
    $res = [];
    foreach($products as $pro) {
        if ($pro['category_id'] == $catId) {
            $res[] = $pro;
        }
    }
    return $res;
}
?>