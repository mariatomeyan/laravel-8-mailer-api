<?php
namespace App\Http\Contracts;

use PHPUnit\Util\Filesystem;

interface NotifierInterface {
  public function notify(String $recipients, String $message, $attachments);
}
