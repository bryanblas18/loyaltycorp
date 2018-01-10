<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \VPS\Mailchimp;

class ContactController extends Controller
{
    function __construct(MailChimp $mc)
    {
       $this->mc = $mc;
       $this->mc->setApiKey(env('MAILCHIMP_APIKEY'));
    }

    function index($id) {
        $result = $this->mc->get('/lists/' . $id . '/members');
        return $result;
    }

    function save(Request $request, $id) {

        $data = [
            'email_address' => $request->email,
            'merge_fields' => [
                'FNAME' => $request->first_name,
                'LNAME' => $request->last_name,
            ],
            'status' => 'subscribed'
        ];

        $result = $this->mc->post('/lists/' . $id . '/members', $data );

        return $result;
    }

    function update(Request $request, $id, $hash) {

        $data = [
            'email_address' => $request->email,
            'merge_fields' => [
                'FNAME' => $request->first_name,
                'LNAME' => $request->last_name,
            ],
            'status' => 'subscribed'
        ];

        $result = $this->mc->patch('/lists/' . $id . '/members/' . $hash, $data);

        return $result;
    }

    function delete($id, $hash) {
        $result = $this->mc->delete('/lists/' . $id . '/members/' . $hash);
    }
}
