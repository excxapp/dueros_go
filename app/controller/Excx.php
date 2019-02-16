<?php
namespace app\controller;
use app\controller\Bot;
use think\facade\Log;
use think\Controller;
use think\facade\Request;

class Excx  extends Controller
{
	protected $request;
	public function __construct(Request $request)
    {
		$this->request = $request;
    }
    
	public function post()
    {
    	$postData = file_get_contents('php://input');
    	// echo 111;exit;
    	file_put_contents('./public/logs.txt', json_encode([$postData, $_GET, $_POST], 320), FILE_APPEND);
        Log::write(json_encode($postData, 320), 'notice');
        $bot = new  Bot($postData);
        return $bot->run();
    }
    
}
