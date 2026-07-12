<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:import-master-data')]
#[Description('Command description')]
class ImportMasterData extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $rows = $this->readCsv();

        $this->importPrefectures($rows);

        $this->importLines($rows);

        $this->importStations($rows);

        $this->createAdjaceStations();

        return Command::SUCCESS;
    }

    // CSV読み込み
    private function readCsv(){

        try{

        }
        catch(\Exception $e){

        }
    }

    // 都道府県登録
    private function importPrefectures(array $rows){

        try{

        }
        catch(\Exception $e){

        }
    }

    // 路線登録
    private function importLines(array $rows){

        try{

        }
        catch(\Exception $e){

        }
    }

    // 駅登録
    private function importStations(array $rows){

        try{

        }
        catch(\Exception $e){

        }
    }

    // 隣接駅生成
    private function createAdjaceStations(){

        try{

        }
        catch(\Exception $e){

        }
    }
}
