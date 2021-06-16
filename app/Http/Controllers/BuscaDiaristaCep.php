<?php

namespace App\Http\Controllers;

use App\Models\Diarista;
use App\Services\ViaCEP;
use Illuminate\Http\Request;

class BuscaDiaristaCep extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, ViaCEP $viaCEP)
    {
        $address =  $viaCEP->buscar($request->cep);

        if($address === false) {
            return response()->json(['erro' => 'CEP inválido!'], 400);
        }

        /*O Laravel já coloca na estrutura de JSON no retorno.*/
        return [
            'diaristas' => Diarista::buscaPorCodigoIbge($address['ibge']),
            'quantidade_diaristas' => Diarista::quantidadePorCodigoIbge($address['ibge'])
        ];
    }
}
