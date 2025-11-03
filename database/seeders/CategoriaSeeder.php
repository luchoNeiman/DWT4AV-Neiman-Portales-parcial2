<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            ['categoria_id' => 1, 'nombre' => 'Hamburguesas', 'descripcion' => 'Elaboradas a base de hongos frescos y pan artesanal. Son el corazón de UMAMI: sabrosas, nutritivas y 100% plant-based.', 'created_at' => now(), 'updated_at' => now()],
            ['categoria_id' => 2, 'nombre' => 'Wraps', 'descripcion' => 'Alternativas livianas y frescas, rellenas de hongos y vegetales sazonados con especias naturales. Perfectas para una comida rápida y saludable.', 'created_at' => now(), 'updated_at' => now()],
            ['categoria_id' => 3, 'nombre' => 'Acompañamientos', 'descripcion' => 'Papas rústicas, bastones de shiitake crocantes y otras guarniciones diseñadas para acompañar cada combo sin perder el toque gourmet.', 'created_at' => now(), 'updated_at' => now()],
            ['categoria_id' => 4, 'nombre' => 'Condimentos UMAMI', 'descripcion' => 'Salsas y sales de hongos que potencian el sabor natural de cada plato. Pequeños detalles que hacen la diferencia.', 'created_at' => now(), 'updated_at' => now()],
            ['categoria_id' => 5, 'nombre' => 'Bebidas', 'descripcion' => 'Desde aguas funcionales con hongos medicinales (Reishi, Maitake) hasta limonadas y kombuchas naturales. Refrescantes, equilibradas y únicas.', 'created_at' => now(), 'updated_at' => now()],
            ['categoria_id' => 6, 'nombre' => 'Postres', 'descripcion' => 'Opciones dulces inspiradas en la fusión de lo natural y lo artesanal. Sabores suaves que cierran la experiencia UMAMI con estilo.', 'created_at' => now(), 'updated_at' => now()],
            ['categoria_id' => 7, 'nombre' => 'Combos UMAMI', 'descripcion' => 'Combinaciones pensadas para compartir o disfrutar solo, con precios accesibles y equilibrio perfecto entre sabor, nutrición y presentación.', 'created_at' => now(), 'updated_at' => now()],
            
        ]);
    }
}
