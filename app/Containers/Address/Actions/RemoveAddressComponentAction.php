<?php

namespace App\Containers\Address\Actions;

use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

class RemoveAddressComponentAction extends Action
{
    public function run($uuid)
    {
        Apiato::call('Address@RemoveAddressComponentTask', [$uuid]);
    }
}
