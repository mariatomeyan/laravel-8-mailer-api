<?php
namespace App\Http\Contracts;

interface NotifierInterface {
  public function notify(String $recipients, String $message);
}
