<?php

namespace App\Http\Controllers;

use App\Models\NetworkTraffic;
use App\Models\Network;
use App\Models\User;
use Illuminate\Http\Request;

class NetworkTrafficController extends Controller
{


    public function send(Request $request)
    {
        $data = $request->all();
        $networkTraffic = new NetworkTraffic();
        $networkTraffic->mac_origin = $data['mac_origem'];
        $networkTraffic->mac_destination = $data['mac_destino'];
        $networkTraffic->protocol_version = $data['ip_versao'];
        $networkTraffic->ip_origin = $data['ip_origem'];
        $networkTraffic->ip_destination = $data['ip_destino'];
        $networkTraffic->protocol = $data['protocolo'];
        $networkTraffic->payload = $data['payload'];
        $networkTraffic->application_protocol = $data['protocolo'];
        $networkTraffic->origin_port = $data['porta_origem'];
        $networkTraffic->destination_port = $data['porta_destino'];
        $networkTraffic->network_id = $data['network_id'];
        $networkTraffic->save();

        $network = Network::find($data['network_id']);
        $network->status = 'up';
        $network->mb_used = 1;
        $network->save();

        return ['status' => 'success'];
    }

}