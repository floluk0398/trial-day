<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class QuizCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quiz';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A quiz';

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
        // damit jedes mol der content wieder laar isch
        Storage::disk('local')->put('answers.txt', '');

        $name = $this->ask('What is your Name');
        $questions = trans('quiz.questions');



        $i = 0;     // man fong ba 0 un zu zählen!
        while ($i < count($questions)) {            // <= zu <
            $answer = $this->ask($questions[$i]);

            if($i == 0)
                Storage::disk('local')->put('answers.txt', "$name, {$questions[$i]}, $answer");
            else
                Storage::disk('local')->put('answers.txt', Storage::disk('local')->get('answers.txt'). PHP_EOL . "$name, {$questions[$i]}, $answer");


            $i++;           // damit die frogen weitergehen
        }

        return 0;
    }
}

/*
 * before array merge
 *
 * public function handle()
    {
        $name = $this->ask('What is your Name');
        $questions = str_replace('meet', 'met', trans('quiz.questions'));       //net sauber aso, evtl. in quiz.questions obändern

        $i = 0;     // man fong ba 0 un zu zählen!
        while ($i < count($questions)) {            // <= zu <
            $answer = $this->ask($questions[$i]);
            Storage::disk('local')->put('answers.txt', "$name, {$questions[$i]}, $answer");
            $i++;           // damit die frogen weitergehen
        }

        return 0;
    }
 *
 * */
