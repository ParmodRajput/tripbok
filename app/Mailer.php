<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mailer extends Model
{
	protected $table = 'mails';
    protected $fillable = [
    	'to', 'cc', 'bcc', 'subject', 'message'
	];
}
