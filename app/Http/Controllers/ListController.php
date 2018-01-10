<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \VPS\Mailchimp;

class ListController extends Controller
{

    function __construct(MailChimp $mc)
    {
       $this->mc = $mc;
       $this->mc->setApiKey(env('MAILCHIMP_APIKEY'));
    }

    function index() {
        $result = $this->mc->get('/lists/');
        return $result;
    }

    function show($id) {
        $result = $this->mc->get('/lists/' . $id);
        return $result;
    }

    function save(Request $request) {

        $data = [
            'name' => $request->name,
            'contact' => [
                'company' => $request->company,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
                'country' => $request->country,
                'phone' => $request->phone
            ],
            'permission_reminder' => $request->permission_reminder,
            'campaign_defaults' => [
                'from_name' => $request->from_name,
                'from_email' => $request->from_email,
                'subject' => $request->subject,
                'language' => $request->language,
            ],
            'email_type_option' => true
        ];

        $result = $this->mc->post('/lists', $data );

        return $result;
    }

    function update(Request $request, $id) {
        $data = [
            'name' => $request->name,
            'contact' => [
                'company' => $request->company,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
                'country' => $request->country,
                'phone' => $request->phone
            ],
            'permission_reminder' => $request->permission_reminder,
            'campaign_defaults' => [
                'from_name' => $request->from_name,
                'from_email' => $request->from_email,
                'subject' => $request->subject,
                'language' => $request->language,
            ],
            'email_type_option' => true,
            'members' => []
        ];

        $result = $this->mc->post('/lists/' . $id, $data );

        return $result;
    }

    function delete($id) {
        $result = $this->mc->delete('/lists/' . $id);
        //return $result;
    }

}
