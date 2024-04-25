<?php
/**
 * Created by IntelliJ IDEA.
 * User: vaibhavjaimini
 * Date: 1/2/19
 * Time: 6:40 PM
 */

namespace App\DAL;
use App\Jobs\ExampleJob;

use Illuminate\Support\Facades\Redis;

class RedisDAL {
    private $redis;
    public function __construct($connection = 'default'){
        $this->redis = Redis::connection($connection);
    }

    public function set($key, $value) {
        $callbackFunc = $this->redis;
        dispatch(new ExampleJob($callbackFunc, $key, $value))->onQueue('something');
        return "Done";
    }
}