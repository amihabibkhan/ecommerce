<?php

namespace App\Http\Livewire;

use App\Product;
use App\Publication;
use App\SubCategory;
use App\Writer;
use Illuminate\Http\Request;
use Livewire\Component;

class BookShop extends Component
{

    private $request = [
        'pubs'=> [],
        'topics' => [],
        'selected_writers' => [],
        'sort_by' => '',
        'search' => null,
    ];

    public function mount($query_url = null){
        if($query_url){
            $this->request_response($query_url);
        }
    }


    protected $listeners = ['request'=>'request_response'];

    public function request_response($str){
        $path = parse_url($str,PHP_URL_PATH);

        $first_array = explode("&",$path);

        foreach ($first_array as $first_arr){

            $second_array = explode('=',$first_arr);

            if(array_key_exists(0,$second_array) && array_key_exists(1,$second_array)) {

                if ($second_array[0] == 'pubs%5B%5D' || $second_array[0] == 'pubs') {
                    array_push($this->request['pubs'], $second_array[1]);
                }

                if ($second_array[0] == 'topics%5B%5D' || $second_array[0] == 'topics') {
                    array_push($this->request['topics'], $second_array[1]);
                }

                if ($second_array[0] == 'selected_writers%5B%5D' || $second_array[0] == 'selected_writers') {
                    array_push($this->request['selected_writers'], $second_array[1]);
                }
                if ($second_array[0] == 'sort_by') {
                    $this->request['sort_by'] = $second_array[1];
                }
                if ($second_array[0] == 'search') {
                    $this->request['search'] = $second_array[1];
                }
            }
        }
    }


    public function render()
    {
        $request = (object) $this->request;

        $data['pubs'] = $data['selected_writers'] = $data['topics'] = [];

        if (isset($request->pubs)){
            $data['pubs'] = $request->pubs;
        }
        if (isset($request->selected_writers)){
            $data['selected_writers'] = $request->selected_writers;
        }
        if (isset($request->topics)){
            $data['topics'] = $request->topics;
        }

        if(isset($request->sort_by)) {
            if ($request->sort_by == 'name_a_to_z') {
                $order_by = 'title';
                $order_to = 'asc';
            } elseif ($request->sort_by == 'name_z_to_a') {
                $order_by = 'title';
                $order_to = 'desc';
            } elseif ($request->sort_by == 'price_high_to_low') {
                $order_by = 'regular_price';
                $order_to = 'desc';
            } elseif ($request->sort_by == 'price_low_to_high') {
                $order_by = 'regular_price';
                $order_to = 'asc';
            } elseif ($request->sort_by == 'new_first') {
                $order_by = 'created_at';
                $order_to = 'asc';
            } elseif ($request->sort_by == 'old_first') {
                $order_by = 'created_at';
                $order_to = 'desc';
            } else {
                $order_by = 'id';
                $order_to = 'desc';
            }
        }else{
            $order_by = 'id';
            $order_to = 'desc';
        }


        if (count($data['pubs']) > 0 && count($data['selected_writers']) > 0){
            $data['products'] = Product::whereHas('sub_categories', function ($query) use(&$data){
                if (count($data['topics']) > 0){
                    $query->whereIn('sub_categories.id', $data['topics']);
                }
            })
                ->whereIn('publication_id', $data['pubs'])
                ->whereIn('writer_id', $data['selected_writers'])
                ->orderBy($order_by, $order_to)
                ->paginate(24);

        } elseif (count($data['pubs']) > 0){
            $data['products'] = Product::whereHas('sub_categories', function ($query) use(&$data){
                if (count($data['topics']) > 0){
                    $query->whereIn('sub_categories.id', $data['topics']);
                }
            })
                ->whereIn('publication_id', $data['pubs'])
                ->orderBy($order_by, $order_to)
                ->paginate(24);

        }elseif (count($data['selected_writers']) > 0){
            $data['products'] = Product::whereHas('sub_categories', function ($query) use(&$data){
                if (count($data['topics']) > 0){
                    $query->whereIn('sub_categories.id', $data['topics']);
                }
            })
                ->whereIn('writer_id', $data['selected_writers'])
                ->orderBy($order_by, $order_to)
                ->paginate(24);

        }else{
            $data['products'] = Product::whereHas('sub_categories', function ($query) use(&$data){
                if (count($data['topics']) > 0){
                    $query->whereIn('sub_categories.id', $data['topics']);
                }
            })
                ->orderBy($order_by, $order_to)
                ->paginate(24);
        }

        if (isset($request->search)){
            $data['products'] = Product::where('title', 'like', '%' . $request->search . '%')
                ->orWhere('banglish_title', 'like', '%' . $request->search . '%')
                ->orWhere('product_code', 'like', $request->search)
                ->paginate(24);
        }

        return view('livewire.book-shop',$data);
    }
}
