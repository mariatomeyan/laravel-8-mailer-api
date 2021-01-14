<?php

namespace App\Jobs;

use App\Mail\SendBasicTextEmail;
use App\Mail\SendMail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use \Illuminate\Support\Facades\Mail;

class SendEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

     protected $to;
     protected $from;
     protected $subject;
     protected $attachments;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($to = [], $from = [], $subject = '',   Array $attachments = [])
    {
        $this->to = $to;
        $this->from = $from;
        $this->subject = $subject;
        $this->attachments = $attachments;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $textEmailTemplate = new SendBasicTextEmail (

          $this->from,
          $this->to,
          $this->subject
      );

      $refl = get_class($textEmailTemplate);
      $encoded_data = json_encode($textEmailTemplate);

     logger(get_class($textEmailTemplate));

     logger(json_encode($textEmailTemplate));
     $decode =  json_decode($encoded_data);

//     $newEmailInstance = new \ReflectionClass($refl);
//       $email = $newEmailInstance->newInstance($decode->from, $decode->to, $decode->subject, $decode->attachments);


      return Mail::queue($decode);
    }
}
