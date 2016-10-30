<?php
namespace classes;

require 'classes/template.php';
Abstract Class Controller_Base {

	protected $registry;
	protected $template;
	protected $layouts;
	
	public $vars = array();

	function __construct($registry) {
		$this->registry = $registry;
		$this->template = new Template($this->layouts, get_class($this));
	}

	abstract function index();
	
}
