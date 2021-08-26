<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        // eager load projects with subject
        $user->load('actions.subject');

        $activities = $user->actions;

        $activitiesGroupedByDay = $activities
            ->map(function ($item) {
                $item->day = $item->created_at->format('M d, Y (D)');
                return $item;
            })
            ->groupBy('day')
            ->sortKeysDesc();

        $labels = $activitiesGroupedByDay->keys();
        $data = $activitiesGroupedByDay->map(function ($item) {
            return $item->count();
        })->values();

        $chart = $this->generateLineChartData($data, $labels);

        return view('users.activities.index', [
            'activitiesGroupedByDay' => $activitiesGroupedByDay,
            'chart' => $chart
        ]);
    }

    public function generateLineChartData($data, $labels): array
    {
        return [
            'series' => [
                [
                    'name' => 'No. of Activities',
                    'data' => $data
                ],
            ],
            'chart' => [
                'height' => 100,
                'type' => 'area',
                'zoom' => [
                    'enabled' => false,
                ],
                'toolbar' => [
                    'show' => false,
                ],
                'plotOptions' => [
                    'area' => [
                        'dataLabels' => [
                            'enabled' => false
                        ]
                    ],
                ],
                'animations' => [
                    'enabled' => false
                ],
            ],
            'colors' => ['#22863a'],
            'fill' => [
                'opacity' => 0.7,
                'type' => 'solid',
            ],
            'dataLabels' => [
                'enabled' => false
            ],
            'grid' => [
                'show' => false,
                'xaxis' => [
                    'lines' => [
                        'show' => false,
                    ]
                ],
                'yaxis' => [
                    'lines' => [
                        'show' => false,
                    ]
                ]
            ],
            'stroke' => [
                'curve' => 'smooth',
                'width' => 0,
            ],
            'xaxis' => [
                'show' => false,
                'type' => 'datetime',
                'categories' => $labels->toArray(),
                'lines' => [
                    'show' => false,
                ],
                'labels' => [
                    'show' => false
                ],
                'axisTicks' => [
                    'show' => false,
                    'color' => '#fff'
                ],
            ],
            'yaxis' => [
                'show' => false,
                'lines' => [
                    'show' => false,
                ],
                'labels' => [
                    'show' => false
                ],
            ],
//            'plotOptions' => [
//                'dataLabels' => [
//                    'enabled' => false
//                ]
//            ],
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
