<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController
{


    /**
     * Customer id
     * 
     * @var int
     */
    protected $customer_id;

     /**
     * Auth user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function auth(Request $request)
    {
        // Obtém o passe do usuário
        $pass = $request->cnpj_cpf ?? $request->bearerToken();

        // Valida se o passe existe
        if(!$pass){
            return response()->json(['status' => '"cnpj_cpf" é obrigatório!'],400);
        }

        // Busca os dados do cliente pelo seu cpnj/cpf
        $customer = Customer::select('*')
        ->where('cnpj_cpf','=',$pass)
        ->first();
        
        // Valida se o passe é valido
        if(!$customer){
            return response()->json(['status' => 'Cliente não encontrado.'],401);
        }

        // Passa o id do usuário para instancia atual
        $this->customer_id = $customer->id;

        // Retorna a resposta válida
        return response()->json([
            'cnpj_cpf' => $customer->cnpj_cpf,
            'name' => $customer->name,
            'status' => true
        ],200);  
    }
}
