<?php
App::uses('ConsoleOutput', 'Console');

/**
 * Use as
 *
 *  App::uses('TestConsoleOutput', 'Tools.TestSuite');
 *
 *  $stdOut = new TestConsoleOutput();
 *  $this->MyShell = new MyShell($stdOut);
 *
 * @license http://opensource.org/licenses/mit-license.php MIT
 * @author Mark Scherer
 */
class TestConsoleOutput extends ConsoleOutput {

	/**
	 * Holds all output messages.
	 *
	 * @var array
	 */
	public $output = array();

	/**
	 * Overwrite _write to output the message to debug instead of CLI.
	 *
	 * @param string $message
	 * @return void
	 */
	protected function _write($message) {
		if (php_sapi_name() !== 'cli' && !empty($_GET) && !empty($_GET['debug'])) {
			debug($message);
		}
		$this->output[] = $message;
	}

	/**
	 * Helper method to return the debug output as string.
	 *
	 * @return string
	 */
	public function output() {
		return implode('', $this->output);
	}

}
