<?php

use Illuminate\Database\Seeder;
use App\Invalidesa;

class InvalidesaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        $row = 1;
          if (($handle = fopen("2013_pensio_invalidesa_2013.csv", "r")) !== FALSE) {
            $columnes = fgetcsv($handle, 1000, ",");
            
              while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                  $num = count($data);
                 // echo "[REG:$num] ";
                  $row++;
                  for ($c=2; $c < $num; $c++) {
                      //echo $data[$c] . "\t";
                      $invalidesa = new Invalidesa;
                      $invalidesa->dte=$data[0];
                      $invalidesa->barri=$data[1];
                      $invalidesa->invalids=$data[2];
                      $invalidesa->save();
                  }
                  
              }
              fclose($handle);
        }
    }
}
