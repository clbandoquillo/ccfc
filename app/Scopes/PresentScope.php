<?php


namespace App\Scopes;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class PresentScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $current = $this->getCurYearAndMonth();
        $builder->where('schoolyear',$current['year'])
        ->where('semester',$current['semester'])
        ->when($model->getTable() === 'acadClassesLive',function ($query){
            return $query->whereNotIn('divisioncode',array('ADMN', 'FYDP', 'GRAD', 'GRAD-B', 'GRAD-E', 'GRAD-N', 'LAW', 'NSTP', 'OTHE', 'PE', 'PHILO', 'RSTC', 'THEO'));
        });

    }



    private function getCurYearAndMonth(){
        $date = \Carbon\Carbon::now();

        $year = $date->year;
        $month = $date->month;


        if($month >= 6 && $month <= 10) $semester = 1; elseif($month == 3 || $month == 4) $semester = 3; else $semester = 2;

        return compact('year','semester');
    }
}
