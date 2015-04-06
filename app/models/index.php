<?php

namespace Bella;

class indexModel extends Handler {

    public function run($search='', $key='', $sort=false, $order=false, $start=0, $end=-1){
        $re = (object) [
            'error' => 1,
            'queries' => [],
            'result' => false
        ];

        $queries = (object) [
            '_search' => $search,
            '_key' => $key,
            '_sort' => $sort,
            '_order' => $order,
            '_start' => $start,
            '_end' => $end
        ];

        $result = (object) [

        ];

        $f = Config::get('settings')->storage_dir.'db.json';
        $data = File::read($f, true);
        if(!!$data && isset($data->players)){

            $entries = $data->players;
            $filtered = [];

            $re->error = 0;
            $re->queries = $queries;

            if(!!$key && !!$search){
                $q = strtolower($search);
                foreach($entries as $item){
                    if(property_exists($item, $key)){
                        $val = strtolower($item->$key);
                        if(!!$val && (strpos($q, $val)!==false || strpos($val, $q)!==false)){
                            array_push($filtered, $item);
                        }
                    }
                }
                $entries = $filtered;
            }

            $total = count($entries);

            $result->totalItems = $total;

            if($total>0){

                $one = $entries[0];

                $edited = [];

                if(!!$sort && property_exists($one, $sort)){

                    $mod = 'asc';
                    $edited = $entries;

                    if(!!$order && strtolower($order)=='desc'){
                        $mod = 'desc';
                    }
                    usort($edited, function($a, $b) use ($sort, $mod){
                        return $mod=='asc'?$a->$sort - $b->$sort:$b->$sort-$a->$sort;
                    });

                    $entries = $edited;
                }

                if($start>=0 && $start<$total && $end>$start){
                    $tmp = [];
                    $max = min($end, $total);
                    for($i=$start; $i<$max; $i++){
                        array_push($tmp, $entries[$i]);
                    }
                    $entries = $tmp;
                }

            }

            $result->entries = $entries;
        }

        $re->result = $result;

        Response::json($re);
    }
}

