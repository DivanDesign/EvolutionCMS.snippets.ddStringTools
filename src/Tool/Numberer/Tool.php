<?php
namespace ddStringTools\Tool\Numberer;


class Tool extends \ddStringTools\Tool\Tool {
	private $isFloatAllowed = true;
	private $decimalsNumber = 0;
	private $isDecimalsFixed = false;
	
	// Internal property, do not use it as a parameter
	private $isFormattingEnabled = false;
	
	/**
	 * modify_exec
	 * @version 1.0 (2025-04-05)
	 * 
	 * @param $inputString {string}
	 * 
	 * @return {integer|float|string}
	 */
	protected function modify_exec($inputString){
		// Float
		if ($this->isFloatAllowed){
			$inputString = $this->parseFloat($inputString);
		// Integer
		}{
			$inputString = intval($inputString);
		}
		
		return $inputString;
	}
	
	/**
	 * parseFloat
	 * @version 1.0.1 (2025-04-06)
	 * 
	 * @param $inputString {string}
	 * 
	 * @return {float|string}
	 */
	private function parseFloat($inputString){
		// Required for making fixed decimals
		$this->isFormattingEnabled = $this->isDecimalsFixed;
		
		// If it is already float, no need to do anything
		if (!is_float($inputString)){
			// Advanced parsing of strings
			if (is_string($inputString)){
				// Delete all characters except numbers, minuses, dots and commas
				$inputString = preg_replace(
					'/[^\d\-\+.,]/',
					'',
					$inputString
				);
				// Replace commas to dots
				$inputString = str_replace(
					',',
					'.',
					$inputString
				);
			}
			
			$inputString = floatval($inputString);
		}
		
		// If we need a maximum number of decimal places
		if ($this->decimalsNumber != 0){
			// Format number with fixed decimal places and remove trailing zeros
			$inputString = number_format(
				$inputString,
				$this->decimalsNumber,
				'.',
				''
			);
			
			// No need to do it again below
			$this->isFormattingEnabled = false;
			
			if (!$this->isDecimalsFixed){
				// Remove trailing zeros
				$inputString = rtrim($inputString, '0');
				$inputString = rtrim($inputString, '.');
			}
		}
		
		// Formatting a number using fixed-point notation (e. g. `10.00`)
		if ($this->isFormattingEnabled){
			// Format number with fixed decimal places
			$inputString = number_format(
				$inputString,
				$this->decimalsNumber,
				'.',
				''
			);
		}
		
		return $inputString;
	}
}