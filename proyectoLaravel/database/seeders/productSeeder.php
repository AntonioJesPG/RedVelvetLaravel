<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productSeeder extends Seeder
{
    private $arrayProductos = array(
        array(
            'nombre' => 'Expresso',
            'descripcion' => 'Café',
            'imagen' => '1.jpeg',
            'precio' => '1',
        ),
        array(
            'nombre' => 'Ristretto',
            'descripcion' => 'Café',
            'imagen' => '2.jpg',
            'precio' => '1.2',
        ),
        array(
            'nombre' => 'Cortado',
            'descripcion' => 'Café',
            'imagen' => '3.jpg',
            'precio' => '1',
        ),
        array(
            'nombre' => 'Americano',
            'descripcion' => 'Café',
            'imagen' => '4.jpeg',
            'precio' => '1.5',
        ),
        array(
            'nombre' => 'Capuchino',
            'descripcion' => 'Café',
            'imagen' => '5.jpg',
            'precio' => '1.5',
        ),
        array(
            'nombre' => 'Lungo',
            'descripcion' => 'Café',
            'imagen' => '6.jpg',
            'precio' => '1.2',
        ),
        array(
            'nombre' => 'Carajillo',
            'descripcion' => 'Café',
            'imagen' => '7.jpg',
            'precio' => '1.2',
        ),
        array(
            'nombre' => 'Con Leche',
            'descripcion' => 'Café',
            'imagen' => '8.jpg',
            'precio' => '1.2',
        ),
        array(
            'nombre' => 'Bombón',
            'descripcion' => 'Café',
            'imagen' => '9.jpg',
            'precio' => '1.4',
        ),
        array(
            'nombre' => 'Tarta de limón',
            'descripcion' => 'Reposteria',
            'imagen' => '10.jpg',
            'precio' => '2',
        ),
        array(
            'nombre' => 'Tarta 3 chocolates',
            'descripcion' => 'Reposteria',
            'imagen' => '11.jpg',
            'precio' => '2.5',
        ),
        array(
            'nombre' => 'Tarta de zanahoria',
            'descripcion' => 'Reposteria',
            'imagen' => '12.jpg',
            'precio' => '2',
        ),
        array(
            'nombre' => 'Brownie',
            'descripcion' => 'Reposteria',
            'imagen' => '13.jpg',
            'precio' => '2',
        ),
        array(
            'nombre' => 'Tarta de queso',
            'descripcion' => 'Reposteria',
            'imagen' => '14.jpg',
            'precio' => '2.5',
        ),
        array(
            'nombre' => 'Tarta de fresas',
            'descripcion' => 'Reposteria',
            'imagen' => '15.jpg',
            'precio' => '2',
        ),
        array(
            'nombre' => 'Tarta red velvet',
            'descripcion' => 'Reposteria',
            'imagen' => '16.jpg',
            'precio' => '3',
        ),
        array(
            'nombre' => 'Galletas caseras',
            'descripcion' => 'Reposteria',
            'imagen' => '17.jpg',
            'precio' => '2',
        ),
        array(
            'nombre' => 'Barquillos',
            'descripcion' => 'Reposteria',
            'imagen' => '18.jpg',
            'precio' => '1.4',
        ),
        array(
            'nombre' => 'Tarta de manzana',
            'descripcion' => 'Reposteria',
            'imagen' => '19.jpg',
            'precio' => '2',
        )
    );


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->delete();
        foreach(	$this->arrayProductos	as $producto	)	{
            $p	=	new	Product;
            $p->nombre	=	$producto['nombre'];
            $p->tipo	=	$producto['descripcion'];
            $p->imagen	=	$producto['imagen'];
            $p->precio	=	$producto['precio'];
            $p->save();
        }
    }
}
