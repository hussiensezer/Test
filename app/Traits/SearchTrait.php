<?php

namespace App\Traits;

trait SearchTrait
{
    public function search($model, $columns)
    {
        foreach ($columns as $column) {
            $model->when($column['request'], function ($q) use ($column) {
                switch ($column['clause']) {
                    // Where
                    case 'where':
                        $q->where($column['column'], $column['operator'], $column['request']);
                        break;

                    // orWhere
                    case 'orWhere' :
                        $q->orWhere($column['column'], $column['operator'], $column['request']);
                        break;

                    // whereBetween
                    case 'whereBetween':
                        $q->whereBetween($column['column'], [$column['value']] );
                        break;

                    // whereNotBetween
                    case 'whereNotBetween':
                        $q->whereNotBetween($column['column'], $column['value']);
                        break;

                    //whereNull
                    case "whereNull":
                        $q->whereNull($column['column']);
                        break;

                    //whereNotNull
                    case "whereNotNull":
                        $q->whereNotNull($column['column']);
                        break;

                    //whereIn
                    case 'whereIn':
                        $q->whereIn($column['column'], $column['value']);
                        break;
                    //whereNotIn
                    case 'whereNotIn':
                        $q->whereNotIn($column['column'], $column['value']);
                        break;
                    //whereDate
                    case 'whereDate':
                        $q->whereDate($column['column'], $column['operator'], $column['date']);
                }

            });
        }

    }// End Search
}
