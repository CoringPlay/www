<?php
class pconf{
	// Обязательно для приема платежей
	public $account_number = '';
	public $shop_id = '';
	public $shop_key = '';

	// Все что ниже нужно только для автовыплат
	public $api_id = ''; //API ID
	public $api_key = ''; //API Key
}