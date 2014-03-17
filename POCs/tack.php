<?php

class Tack implements JsonSerializable, IteratorAggregate
{
	/**
	 * x, y coordinates of tack on page as last saved by user
	 * length, width of tack
	 * id/name of tack
	 * content of tack
	 * feedback{} of tack
	 */
	const TACK_HTML_CLASS = 'generic_tack';

	private $array = array();

	public function __construct(array $array)
	{
		$this->array = $array;
		$this->array['html_class'] = TACK_HTML_CLASS;
	}

	public function JsonSerialize()
	{
		return $this->array;
	}

	public function getIterator()
	{
		return new ArrayIterator($this->array);
	}

	public function toHtml()
	{
		return $this->array;
	}

	public function setName($_name)
	{
		$this->array['name'] = $_name;
	}

	public function getName()
	{
		return $this->array['name'];
	}

	public function setContent($_content)
	{
		$this->array['content'] = $_content;
	}

	public function getContent()
	{
		return $this->array['content'];
	}

	public function setFeedback($_feedback)
	{
		$this->array['feedback'] = $_feedback;
	}

	public function getFeedback()
	{
		return $this->array['feedback'];
	}
}

$tack = new Tack(	[ 'name' => 'test_tack'
				, 'content' => 'http://www.youtube.com/embed/NM4Rph7eeP4'
				, 'feedback' => ['WHOAH'] 
				]);
echo json_encode($tack) . "\n";

// get the mongodb client
$m = new MongoClient();
echo $m . "\n";

// choose a database
$db = $m->test_database;
echo $db . "\n";

// select a collection to which to write
$c = $db->tacklr_by_user;
$tack_ = json_decode($tack->toHtml());
$c->insert($tack);

foreach($c->find() as $b)
{
	echo $b;
}
?>