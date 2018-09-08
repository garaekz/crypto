<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CryptoController extends Controller
{
   public function precio(Request $request)
   {
   		#Separo el input en arrays
   		$amount = explode(",", $request->amount);

   		#Consumimos el API de Cryptocompare para tomar el tipo de cambio
   		$api_url = "https://min-api.cryptocompare.com/data/pricemulti";
   		$client = new Client();
   		$response = $client->get($api_url, ['query' => 	['fsyms' => $request->crypto, 'tsyms' => $request->currency]]);
   		$body = $response->getBody();
        $content = $body->getContents();
        $tipo_cambio = json_decode($content,TRUE);

        #Datos crudos para mostrar un array de strings
        $datos_txt = [];
        #Array de datos para retornar en JSON
        $resultado = [];

        #En estos nested loops llenamos la info para mostrar y manejamos si la API consumida nos responde con error
        if (array_key_exists("Response", $tipo_cambio) && $tipo_cambio["Response"] == "Error") {
          return response()->json(["error" => "No se ha encontrado ningún código de criptomoneda con los datos proporcionados"]);
        }else{
        	foreach ($amount as $index => $cant) {
            #Validamos si es un numero positivo
            if (!ctype_digit($cant)) {
              return response()->json(["error" => "Alguna de las cantidades introducidas no es un numero positivo."]);
            }

            #Aqui se va a llenar el array con los datos
        		foreach ($tipo_cambio as $crypto => $monedas) {
        			foreach ($monedas as $key => $value) {
        				if (!array_key_exists($key, $resultado)) {
                  $resultado[$key][] = $index;
                }

                #Asignamos la cantidad a convertir
	        			if (!isset($resultado[$key][$index]["cantidad"])) {
	        				$resultado[$key][$index] = ["cantidad" => $cant];
	        			}
                #Calculamos la cantidad en criptomonedas
	        			$conversion = number_format($cant/$value, 10, '.', ',');
	        			$resultado[$key][$index]["conversion"][$crypto] = $conversion;

	        			#Enviamos los datos para mostrar en texto
        				$datos_txt[$cant][] = $cant." ".$key." = ".$conversion." ".$crypto;
        			}
        		}
        	}
        }
   		if ($request->format == 'text') {
   			return view('text', ['data' => $datos_txt]);
   		}else{
   			return response()->json($resultado);
   		}
   }
}
