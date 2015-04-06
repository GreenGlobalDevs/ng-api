<?php

namespace Bella;

class indexController extends Coordinator {

    public function parse(){

        $this->setAccessibleScope(0);

        $h = $this->loadHandler();

        $search = Request::input('_search');
        $key = Request::input('_key');
        $sort = Request::input('_sort');
        $order = Request::input('_order');
        $start = Request::input('_start')*1;
        $end = Request::input('_end')*1;

        return $h->run($search, $key, $sort, $order, $start, $end);
    }

}

