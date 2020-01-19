<?php

use Illuminate\Database\Seeder;
use App\Restdata;

class RestdataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $param = [
            'message' => 'Google japan',
            'url' => 'https://www.google.com/',
          ];

          $restdata = new Restdata;
          $restdata->fill($param)->save();

          $param = [
            'message' => 'Yahoo japan',
            'url' => 'https://www.yahoo.co.jp/',
          ];
          $restdata = new Restdata;
          $restdata->fill($param)->save();

          $param = [
            'message' => 'MSN Japan',
            'url' => 'https://www.msn.com/ja-jp',
          ];

          $restdata = new Restdata;
          $restdata->fill($param)->save();
      //
    }
}
