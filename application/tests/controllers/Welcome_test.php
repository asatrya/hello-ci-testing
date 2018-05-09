<?php
/**
 * @author     Aditya Satrya
 * @license    MIT License
 * @copyright  2018 Aditya Satrya
 * @link       
 */

class Welcome_test extends TestCase
{
	public function test_index_no_member()
	{

		// 1. Arrange
		// Mock model class & set up data
		$this->request->setCallable(
			function ($CI) {
				$mock_member_m = $this->getMockBuilder('Member_m')
					->setMethods(array('get_member'))
					->getMock();

				$retval = array();
				$mock_member_m->expects($this->once())
					->method('get_member')
					->will($this->returnValue($retval));

				$CI->member_m = $mock_member_m;
			}
		);

		// 2. Act
		$output = $this->request('GET', 'welcome/index');

		// 3. Assert
		$this->assertContains('<title>Hello, anyone?</title>', $output);
		$this->assertContains('<h1>Hello, anyone?</h1>', $output);
	}

	public function test_index_many_member()
	{

		// 1. Arrange
		// Mock model class & set up data
		$this->request->setCallable(
			function ($CI) {
				$mock_member_m = $this->getMockBuilder('Member_m')
					->setMethods(array('get_member'))
					->getMock();

				$retval = array();
				$retval[] = (object)['id' => 1, 'name' => 'John Doe'];
				$retval[] = (object)['id' => 2, 'name' => 'Fox Freezy'];
				$mock_member_m->expects($this->once())
					->method('get_member')
					->will($this->returnValue($retval));

				$CI->member_m = $mock_member_m;
			}
		);

		// 2. Act
		$output = $this->request('GET', 'welcome/index');

		// 3. Assert
		$this->assertContains('<title>Hello, world!</title>', $output);
		$this->assertContains('<h1>Hello, world!</h1>', $output);
	}

	public function test_index_one_member()
	{
		// 1. Arrange
		// Mock model class & set up data
		$this->request->setCallable(
			function ($CI) {
				$mock_member_m = $this->getMockBuilder('Member_m')
					->setMethods(array('get_member'))
					->getMock();

				$retval = array();
				$retval[] = (object)['id' => 1, 'name' => 'John Doe'];
				$mock_member_m->expects($this->once())
					->method('get_member')
					->will($this->returnValue($retval));

				$CI->member_m = $mock_member_m;
			}
		);

		// 2. Act
		$output = $this->request('GET', 'welcome/index/1');

		// 3. Assert
		$this->assertContains('<title>Hello, John Doe!</title>', $output);
		$this->assertContains('<h1>Hello, John Doe!</h1>', $output);
	}
}
