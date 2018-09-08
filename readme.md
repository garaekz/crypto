
# Crypto API
Un proyecto de conversión de criptomonedas consumiendo el API de Cryptocompare

## Instalación


Sigue los pasos comunes para poner en marcha una aplicación en Laravel 5


## Uso
El API endpoint será la ruta base donde corras la aplicación más `/api/precio`

### Parámetros
Los parámetros se dividen en dos tipos, necesarios y opcionales. A continuación la lista de parámetros con su descripción.

##### Necesarios

 - amount
	 - Este parámetro debe ser un número entero, no se aceptan negativos ni strings.
 - currency
	 - Debe ser en el formato de Abreviatura de divisa utilizado comunmente (**ISO** 4217).
 - crypto
	 - Debe ser las siglas utilizadas universalmente para las criptomonedas
	 - 
Todos los anteriores pueden ser múltiples valores separados por coma.


##### Opcionales

 - format
	 - Solo acepta un valor, `text`, este retornará la información en texto, de no contar con dicho parámetro se retornará en formato `JSON`.

Todos los parámetros se introducirán como parámetro de URL común.

### Ejemplos
En la barra de direcciones: `http://sitio.local/api/precio?amount=55212311,15151,32323,8988&currency=MXN,EUR&crypto=BTC,DASH,ETH`

Resultado:
```json
{  
	"MXN":[  
	{  
		"cantidad":"55212311",  
		"conversion":{  
			"BTC":"451.3765427279",  
			"DASH":"14,655.0879241928",  
			"ETH":"13,965.8497285867"  
		}  
	},  
	{  
		"cantidad":"15151",  
		"conversion":{  
			"BTC":"0.1238637883",  
			"DASH":"4.0215530399",  
			"ETH":"3.8324168180"  
		}  
	},  
	{  
		"cantidad":"32323",  
		"conversion":{  
			"BTC":"0.2642498335",  
			"DASH":"8.5795431923",  
			"ETH":"8.1760417668"  
		}  
	},  
	{  
		"cantidad":"8988",  
		"conversion":{  
			"BTC":"0.0734794884",  
			"DASH":"2.3856985494",  
			"ETH":"2.2734976147"  
		}  
	}  
	],  
	"EUR":[  
	{  
		"cantidad":"55212311",  
		"conversion":{  
			"BTC":"10,288.4619756523",  
			"DASH":"334,620.0666666667",  
			"ETH":"320,349.9332753119"  
		}  
	},  
	{  
	"cantidad":"15151",  
	"conversion":{  
			"BTC":"2.8232922073",  
			"DASH":"91.8242424242",  
			"ETH":"87.9083260806"  
		}  
	},  
	{  
	"cantidad":"32323",  
		"conversion":{  
			"BTC":"6.0231848734",  
			"DASH":"195.8969696970",  
			"ETH":"187.5427908326"  
		}  
	},  
	{  
	"cantidad":"8988",  
	"conversion":{  
			"BTC":"1.6748564688",  
			"DASH":"54.4727272727",  
			"ETH":"52.1496953873"  
		}  
	}  
	]  
}
```

En caso de agregarle el parámetro `format` con valor `text` (`&format=text`)mostrará el resultado en distinto formato, ejemplo:
En la barra de direcciones: `http://sitio.local/api/precio?amount=55212311,15151,32323,8988&currency=MXN,EUR&crypto=BTC,DASH,ETH&format=text`

Resultado:

```bash
55212311 MXN = 453.3030459770 BTC  
55212311 EUR = 10,307.1693527160 BTC  
55212311 MXN = 14,911.2844071385 DASH  
55212311 EUR = 340,837.7739366628 DASH  
55212311 MXN = 14,104.0223263893 ETH  
55212311 EUR = 323,844.8648014546 ETH  
  
15151 MXN = 0.1243924466 BTC  
15151 EUR = 2.8284257629 BTC  
15151 MXN = 4.0918567972 DASH  
15151 EUR = 93.5304648435 DASH  
15151 MXN = 3.8703332354 ETH  
15151 EUR = 88.8673822512 ETH  
  
32323 MXN = 0.2653776683 BTC  
32323 EUR = 6.0341367524 BTC  
32323 MXN = 8.7295285628 DASH  
32323 EUR = 199.5370084573 DASH  
32323 MXN = 8.2569322928 ETH  
32323 EUR = 189.5888321896 ETH  
  
8988 MXN = 0.0737931034 BTC  
8988 EUR = 1.6779018386 BTC  
8988 MXN = 2.4274047187 DASH  
8988 EUR = 55.4849064757 DASH  
8988 MXN = 2.2959907016 ETH  
8988 EUR = 52.7186345240 ETH
```

## Autor

* **David Garay** - *Contribuyente único* - [Garaekz](https://github.com/garaekz/)


## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
