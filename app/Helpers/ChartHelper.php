<?php

namespace Core\Helpers;

class ChartHelper
{
    /**
     * @param $title
     * @return array
     */
    public static function bar($title,$xTitle): array
    {
        return [
            "responsive" =>true,
            "plugins" => [
                "legend" => ['position'=> 'top'],
                "title" => ["display"=> true,'text' => $title],
            ],
            "scales" => [
                'y' => [
                    "title" => [
                        "display" => true,
                        'text' => 'Counts'
                    ]
                ],
                'x' => [
                    "title" => [
                        "display" => true,
                        'text' => $xTitle
                    ],
                ],
            ]
        ];
    }

    /**
     * @param $title
     * @return array
     */
    public static function pie($title): array
    {
        return [
            "responsive" =>true,
            "plugins" => [
                "legend" => ['position'=> 'top'],
                "title" => ["display"=> true,'text' => $title]
            ]
        ];
    }

    public static function line($title,$sets)
    {
        $scales = [];
        foreach($sets as $set){
            $scales[$set["yAxisID"]] = [
                    "type" => "linear",
                    "display" => false,
                    "position" => "right",
                    "y" => [
                        "ticks" => [
                            "display" => false
                        ]
                    ]
            ];
        }
        return [
            "responsive" =>true,
            "interactions" => [
                "mode" => "index",
                "intersect" => false,
            ],
            "stacked" => false,
            "plugins" => [
                "title" => [
                    "display" => false,
                    "text" => $title
                ]
            ],
            "scales" => $scales
        ];
    }

    public static function datasets($data,$label,$labels)
    {
        return [
            'data' => $data,
            'label' => $label,
            'backgroundColor' => label_colors(count($labels)),
        ];
    }

    public static function lineDatasets($data,$label,$id)
    {
        return [
            'data' => $data,
            'label' => $label,
            'borderColor' => random_color(),
            "backgroundColor" => random_color(),
            "yAxisID" => $id,
        ];
    }
}
