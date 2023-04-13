<?php

namespace App\Http\Controllers\APIS\v1\ImapMail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Webklex\IMAP\Facades\Client;
use Webklex\PHPIMAP\ClientManager;

class ListController extends Controller
{
    // return all mailboxes
    public function MailBoxes(Request $request)
    {
        $cm = new ClientManager($options = []);

        $client = $cm->account('account_identifier');

        $oClient = $cm->make([
            "host" => "imap.gmail.com",
            "port" => 993,
            "encryption" => "ssl",
            "validate_cert" => true,
            "username" => "iletisim@tugrulyildirim.com",
            "password" => "Yaz1l1m2020",
            "protocol" => "imap"
        ]);

        $oClient->connect();

        $aFolder = $oClient->getFolders();

        return response()->json($aFolder);
    }
}
