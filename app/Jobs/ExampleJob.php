<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ExampleJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $delayInSec;
    protected $callbackFunc;
    protected $key;
    protected $value;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($callbackFunc, $key, $value)
    {
        $this->callbackFunc = $callbackFunc;
        $this->key = $key;
        $this->value = $value;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        sleep(5);
        $res = $this->callbackFunc->set($this->key, $this->value);
        dump($res);
        echo("Hey sagar what a sudden surprise...");
    }
}
