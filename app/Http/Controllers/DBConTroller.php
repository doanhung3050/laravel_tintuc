<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DBConTroller extends Controller
{
    public function getAll () {
        $migrate = DB::table('migrations')->get();
        dd($migrate);
    }

    public function whereData (){
        $migrate = DB::table('migrations')->select('migration')->where('id', '>=','13')->get();
        foreach ($migrate as $m){
            echo "<li>$m->migration</li>";
        }
    }

    public function getOneData (){
        $migrate = DB::table('migrations')->select('migration')->where('id','13')->value('migration');
        echo $migrate;
    }

    public function findData() {
        $migrate = DB::table('migrations')->select('migration')->find('13');
        dd($migrate);
    }

    public function pluckData(){
        $migrate = DB::table('migrations')->pluck('migration','id');
        dd($migrate);
        foreach ($migrate as $m){
            echo "<li>$m</li>";
        }
    }

    public function countData(){
        $migrate = DB::table('migrations')->count();
        dd($migrate);
    }

    public function maxData(){
        $migrate = DB::table('migrations')->max('id');
        dd($migrate);
    }

    public function avgData(){
        $migrate = DB::table('migrations')
                ->where('id', '>=' ,'13')
                ->avg('id');
        dd($migrate);
    }

    public function existData(){
        $migrate =  DB::table('migrations')->where('id', 1)->doesntExist();
        dd($migrate);
    }

    public function distinctData(){
        $migrate = DB::table('migrations')->select('batch')->distinct()->get();
        dd($migrate);
    }

    public function addSelectData(){
        $migrate = DB::table('migrations')->select('id');

        $users = $migrate->addSelect('batch')->get();
        dd($users);
    }

    public function rawData(){
        $migrate = DB::table('migrations')
                     ->select(DB::raw('count(*) as migrate_count, batch'))
                     ->where('batch', '=', 1)
                     ->groupBy('batch')
                     ->get();
        dd($migrate);
    }

    public function innerJoinData(){
        $migrate = DB::table('banhkem')
            ->join('member', 'member.id', '=', 'banhkem.member_id')
            ->select('member.*', 'banhkem.name as banhkem_name', 'banhkem.price')
            ->get();

            dd($migrate);
    }

    public function khacData(){
        $migrate = DB::table('migrations')->where('id','<>','22')->get();
        dd($migrate);
    }

    public function likeData(){
        $migrate = DB::table('migrations')
                    ->where([
                        ['id','like','%2'],
                        ['id','like','2%']
                    ])->get();
        dd($migrate);
    }

    public function likeorData(){
        $migrate = DB::table('migrations')
                    ->where('id', 'like', '%2')
                    ->orWhere('id', 'like', '%3')
                    ->get();
        dd($migrate);
    }

    public function betweenData(){
        $migrate = DB::table('migrations')
                    ->whereBetween('id', [22, 23])
                    ->get();
        dd($migrate);
    }

    public function betNotweenData(){
        $migrate = DB::table('migrations')
                    ->whereNotBetween('id', [22, 23])
                    ->get();
        dd($migrate);
    }

    public function whereInData(){
        $migrate = DB::table('migrations')
                    ->whereIn('id', [20, 23])
                    ->get();
        dd($migrate);
    }

    public function whereNotInData(){
        $migrate = DB::table('migrations')
                    ->whereNotIn('id', [20, 23])
                    ->get();
        dd($migrate);
    }

    public function wherenull(){
        $migrate = DB::table('banhkem')
                    ->whereNull('updated_at')
                    ->get();
        dd($migrate);
    }

    public function whereNotNull(){
        $migrate = DB::table('banhkem')
                    ->whereNotNull('created_at')
                    ->get();
        dd($migrate);
    }

    public function whereMonth(){
        $migrate = DB::table('banhkem')
                // ->whereMonth('created_at', '3')
                // ->whereDay('created_at', '19')
                ->whereYear('created_at', '2020')
                ->get();
        dd($migrate);
        
    }

    public function whereColumm(){
        // $migrate = DB::table('banhkem')
        //        ->whereColumn('created_at', 'updated_at')
        //        ->whereColumn('created_at', '<' ,'updated_at')
        //        ->get();
        // dd($migrate);

        $migrate = DB::table('banhkem')
                ->whereColumn([
                    ['created_at', '=', 'updated_at'],
                    ['created_at', '<', 'updated_at'],
                ])->get();
                dd($migrate);
    }

    public function orderBy(){
        $migrate = DB::table('banhkem')
                    ->orderBy('price','desc')
                    ->get();
        dd($migrate);
    }

    public function lastest(){
        $migrate = DB::table('banhkem')
        ->latest()
        ->first();
        dd($migrate);
    }

    public function having(){
        $migrate = DB::table('banhkem')->select('member_id')
                ->groupBy('member_id')
                ->having('member_id', '>', '1')
                ->get();
        dd($migrate);
    }

    public function skipTake(){
        $migrate = DB::table('banhkem')->skip(3)->take(2)->get();
        dd($migrate);
    }

    public function insertData(){
        // DB::table('member')->insert([
        //     ['name' => 'hung'],
        //     ['name' => 'long']
        // ]);

        // DB::table('member')->insertOrIgnore([
        //     ['id' => '1', 'name' => 'long']
        // ]);

        $migrate = DB::table('member')->insertGetId(
            ['name' => 'john@exasssmple.com']
        );

        dd($migrate);
    }

    public function updateData(){ 
        // $migrate = DB::table('member')
        //       ->where('id', 1)
        //       ->update(['name' => 'hung111']);


        DB::table('banhkem')
        ->updateOrInsert(
            ['id' => '1', 'member_id' => '1'],
            ['price' => '22233333']
        );
    }

    public function increment(){
        $migrate = DB::table('banhkem')->increment('id', '50');
        dd($migrate);
    }

    public function delete(){
       DB::table('banhkem')->where('id', '57')->delete();
    }
}
