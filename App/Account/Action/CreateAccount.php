<?php
namespace App\Account\Infrastructure\Persistence;

use App\Account\Domain\Account;
use Illuminate\Http\Request;
use Tuezy\Action;

class CreateAccount extends Action{

    public function __construct(protected Account $account)
    {
    }

    public function execute(Request $request)
    {
        $request->validate(['name' => 'required']);
    }
}