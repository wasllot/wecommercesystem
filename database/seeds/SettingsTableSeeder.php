<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Full repuesto',
                'keyword' => 'CMS, Car, Cars, Repuesto, Wasllot, Ruedas, Neumáticos, Aceite, Motor, Carro, Carros, tienda, online, eCommerce, Bootstrap,Template, Responsive, Fluid, Retina',
                'description' => 'Un sistema de ventas desarrollado en Laravel',
            ),
        ));
        
        
    }
}