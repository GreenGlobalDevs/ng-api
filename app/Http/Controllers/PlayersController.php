<?php namespace Rest\Http\Controllers;

use Storage;
use League\Flysystem\Filesystem;

use Request;

class PlayersController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Players Controller
    |--------------------------------------------------------------------------
    |
    */

    private $data;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $s = Storage::get('db.json');
        $data = json_decode($s);
        $this->data = $data->players;
    }

    public function index()
    {
        $entries = $this->data;

        $search = Request::input('_search').'';
        $key = Request::input('_key').'';
        $sort = Request::input('_sort').'';
        $order = Request::input('_order').'';
        $start = Request::input('_start')*1;
        $end = Request::input('_end')*1;

        if(!$start || !is_numeric($start) || $start<0){
            $start = 0;
        }
        if(!$end || !is_numeric($end) || $end<=$start){
            $end = count($entries);
        }

        $re = (object) [
            'error' => 0,
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

        $filtered = [];
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

        $re->result = $result;

        return response()->json($re);
    }

    public function one($id)
    {
        $re = (object) [
            'error' => 0,
            'player' => false
        ];

        $player = false;
        $entries = $this->data;

        for($i=0; $i<count($entries);$i++){
            $p = $entries[$i];
            if($p->id===$id){
                $player = $p;
                break;
            }
        }

        if(!!$player){
            $re->player = $player;
        }

        return response()->json($re);
    }

}
