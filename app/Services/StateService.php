<?php

namespace App\Services;

class StateService
{
    private static $userStates = [];

    public function getUserState($chatId)
    {
        return self::$userStates[$chatId] ?? ['state' => 'start', 'number' => null];
    }

    public function setUserState($chatId, $state, $number = null)
    {
        self::$userStates[$chatId] = [
            'state' => $state,
            'number' => $number
        ];
    }

    public function resetUserState($chatId)
    {
        self::$userStates[$chatId] = [
            'state' => 'start',
            'number' => null
        ];
    }
}
