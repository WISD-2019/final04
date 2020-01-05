<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach(range(1,20) as $number){
            User::create([
                'id'=>$number,
                'user_id'=>$number,
                'type'=>0,
>>>>>>> 00cc7b30a8e358e4363a771aa36b516573ca07b2
                'username'=>'abc'.$number,
                'password'=>'abcd'.$number,
                'name'=>$number,
                'email'=>$number.'@gmail.com',
                'age'=>$number,
                'sex'=>'男',
                'work'=>'後臺管理',
                'phone'=>'09123450'.$number,
                ]);
            }


}
}
