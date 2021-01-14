<?php

namespace App\Http\Controllers;

use App\Models\Emails;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function store (Request $request)
    {
       /** todo
        * - Validate request
        * - store email
        * - store files
        * - dispatch send email job
        * - listen to the events
        */
        $this->validate($request, [
            'to' => 'required|email',
            'from' => 'required|email',
            'subject' => 'string|min:3|nullable',
            'body_message' => 'nullable',
            'file' => 'nullable'
        ]);

       try {

           $files = [];

//           collect($this->request->files)->map(function ($file) {
//
//               $files = array('file'=> );
//           });
//           store the file

           $data = [
               'sender' => $request->from,
               'recipient' => $request->to,
               'subject' => $request->subject,
               'body_message' => $request->body_message,

           ];

           Emails::created(

           );
       } catch (\Exception $exception) {

       }

    }
    public function show ($id)
    {
        /** todo
         * - get the email by $id
         *
        */

    }
    public function fetchAll()
    {
        /** todo
         * get all emails from system
         */

    }
    public function search()
    {
        /** todo
         * Search in emails
         */

    }

}
