<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class QuizStart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quiz:start {user} {age} {--difficulty=} {--istest=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        /* Plain Text */

        /*
            $this->line("Some text");
            $this->info("Hey, watch this !");
            $this->comment("Just a comment passing by");
            $this->question("Why did you do that?");
            $this->error("Ops, that should not happen.");
        */

        /*
            // Get single Parameters
            $username = $this->argument('user');
            $difficulty = $this->option('difficulty');

            // Get all
            $arguments = $this->arguments();
            $options = $this->options();

            // Stop execution and ask a question 
            $answer = $this->ask('What is your name?');

            // Ask for sensitive information
            $password = $this->secret('What is the password?');

            // Choices
            $name = $this->choice('What is your name?', ['Taylor', 'Dayle'], $default);

            // Confirmation

            if ($this->confirm('Is '.$name.' correct, do you wish to continue? [y|N]')) {
                //
            }
        */

        /* Example */
        $difficulty =  $this->option('difficulty');

        if(!$difficulty){
            $difficulty = 'easy';
        }

        $this->line('Welcome '.$this->argument('user').", starting test in difficulty : ". $difficulty);

        $questions = [
            'easy' => [
                'How old are you ?', "What is the name of your mother?",
                'Do you have 3 parents ?','Do you like Javascript?',
                'Do you know what is a JS promise?'
            ],
            'hard' => [
                'Why the sky is blue?', "Can a kangaroo jump higher than a house?",
                'Do you think i am a bad father?','why the dinosaurs disappeared?',
                "why don't whales have gills?"
            ]
        ];

        $questionsToAsk = $questions[$difficulty];
        $answers = [];

        foreach($questionsToAsk as $question){
            $answer = $this->ask($question);
            array_push($answers,$answer);
        }

        $this->info("Thanks for do the quiz in the console, your answers : ");

        for($i = 0;$i <= (count($questionsToAsk) -1 );$i++){
            $this->line(($i + 1).') '. $answers[$i]);
        }

    }
}
