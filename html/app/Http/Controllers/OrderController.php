<?php

namespace App\Http\Controllers;

use App\Models\{Order,Items, Customer};
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends CustomerController
{

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Pega a identidade do usuário
        $this->auth($request);
        // Pega o id do usuário
        $id = $this->customer_id;

        $orders = Order::select('id','order_id AS code','created_at')
        ->where('customer_id','=',$id)
        ->get();
        foreach($orders as $order){
            $items = Items::select(DB::raw('items.amount*products.price AS tot'))
            ->where('order_id','=',$order['id'])
            ->join('products', 'products.id', '=', 'items.product_id')
            ->get();
            $total = 0;
            foreach($items as $item){
                $total += $item['tot'];
                $order['total'] = number_format($total,2,",",".");
            }
        }

        // Retorna os pedidos
        return response()->json($orders, 200);
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(int $id,Request $request)
    {
        // Pega a identidade do usuário
        $this->auth($request);

        // Busca o pedido pelo seu id
        $order = Order::select('id','order_id AS code','created_at')
        ->where('customer_id','=',$this->customer_id)
        ->where('id','=',$id)
        ->first();

        // Verifica se o pedido existe e se é de propriedade do usuário
        if(!$order){
            // Caso contrário às duas condições retornamos 404
            return response()->json(['status' => 'Pedido não encontrado'], 404);
        }
        
        // Adiciona os items do pedido
        $order['items'] = Items::select(DB::raw('items.amount*products.price AS item_total'),'products.name','products.price','items.amount')
        ->where('order_id','=',$order['id'])
        ->where('items.amount','!=','0')
        ->join('products', 'products.id', '=', 'items.product_id')
        ->get();
        // Adiciona o total do pedido
        $total = 0;
        foreach($order['items'] as $item){
            $total += $item['item_total'];
            $order['total'] = number_format($total,2,",",".");
        }

        // Retorna os pedidos
        return response()->json($order, 200);
    }

}
