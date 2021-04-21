<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class AnswersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'answers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List answers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $content = Storage::disk('local')->get('answers.txt');
        $data = $this->contentToArray($content);


        $this->table(['name', 'question', 'answer'], $data);

        return 0;
    }

    private function contentToArray($content)
    {
        $data = [];

        $row = explode(PHP_EOL, $content);

        foreach($row as $r) {
            $data[] = explode(',', $r);     // daten im richtigen format ongeben!
        }

        return $data;
    }
}
