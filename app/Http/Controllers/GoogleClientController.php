<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Google_Client;
use Google_Service_Sheets;
use Google_Service_Drive;

class GoogleClientController extends BaseController

{
    protected $client;
    protected $serviceSheets;
    protected $serviceDrive;
    protected $spreadsheetId;
    protected $folderId;

    public function __construct()
    {
        try {
            $this->client = new Google_Client();
        $this->client = new Google_Client();
        $this->client->setApplicationName('Observatorio territorio y clima');
        $this->client->setScopes([
            Google_Service_Sheets::SPREADSHEETS,
            Google_Service_Drive::DRIVE
        ]);
        $this->client->setAccessType('offline');
        $this->client->setAuthConfig(base_path('credentials.json'));
        $this->serviceSheets = new Google_Service_Sheets($this->client);
        $this->serviceDrive = new Google_Service_Drive($this->client);

        $this->spreadsheetId = env('SPREADSHEET_ID');
        $this->folderId = env('FOLDER_ID');
        } catch (\Exception $e) {
            // Log or handle the exception
            app('log')->error('Error initializing Google Client: ' . $e->getMessage());
        }
    }
}
