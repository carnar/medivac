<?php 

/**
* Scores validation
*/
class ScoreValidator 
{
	protected $validator;
	protected $rules = 	[
				    	'1' => 'required|numeric|max:10',
				    	'7' => 'required|numeric|max:10',
				    	'9' => 'required|numeric|max:10',
				    	'13' => 'required|numeric|max:10',
				    	'6' => 'required|numeric|max:10',
				    	'3' => 'required|numeric|max:10',
				    	'14' => 'required|numeric|max:10',
				     	'10' => 'required|numeric|max:10',
				    	'19' => 'required|numeric|max:10',
				     	'24' => 'required|numeric|max:10',
				    	'25' => 'required|numeric|max:10',
				     	'30' => 'required|numeric|max:10',
				    	'21' => 'required|numeric|max:10',
				     	'17' => 'required|numeric|max:10',
				    	'29' => 'required|numeric|max:10',
				     	'28' => 'required|numeric|max:10',
						];

	public function __construct($data)
	{
		$this->validator = Validator::make($data, $this->rules);
	}

	public function fails()
	{
		return $this->validator->fails();
	}

	public function passes()
	{
		return $this->validator->passes();
	}
}