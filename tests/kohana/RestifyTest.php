<?php defined('SYSPATH') OR die('Kohana bootstrap needs to be included before tests run');
/**
 * Tests Restify Module
 *
 * @package		Restify
 * @category	Tests
 * @author		Micheal Morgan <micheal@morgan.ly>
 * @copyright	(c) 2011 Micheal Morgan
 * @license		MIT
 */
class Kohana_RestifyTest extends Unittest_TestCase
{
	/**
	 * Tests request
	 * 
	 * @covers	Restify_Request::factory
	 * @covers	Restify_Request::set_data
	 * @covers	Restify_Request::set_url
	 * @covers	Restify_Request::set_method
	 * @covers	Restify_Request::response
	 * @covers	Restify_Response::has_error
	 * @covers	Restify_Response::get_content_type
	 * @covers	Restify_Response::get_content
	 * @access	public
	 * @return	void
	 */	
	public function test_request()
	{
		$restify = Model::factory('restify');
		
		foreach ($restify->http_methods() as $method)
		{			
			$data = array
			(
				'key1'	=> 'value1',
				'key2'	=> (string) rand()
			);
			
			$expected = json_encode(array
			(
				'method'	=> $method,
				'data'		=> $data
			));
			
			$request = Restify_Request::factory()
				->set_url(url::site('restify/test'))
				->set_method($method)
				->set_data($data);
			
			$response = $request->response();
			
			$this->assertSame($response->has_error(), FALSE);
			$this->assertSame($response->get_content_type(), 'application/json');
			$this->assertSame($response->get_content(), $expected);
		}
	}
}