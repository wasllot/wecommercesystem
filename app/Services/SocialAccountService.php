<?php

namespace App\Services;

use App\Repositories\SocialRepository;
use App\Repositories\UserRepository;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{

    /**
     * SocialService constructor.
     * @param UserRepository $user
     * @param SocialRepository $account
     */

    public function __construct(UserRepository $user, SocialRepository $account)
    {
        $this->user = $user;
        $this->account = $account;
    }

    /**
     * @param ProviderUser $providerUser
     * @param $provider
     * @return mixed
     */
    public function createOrGetUser(ProviderUser $providerUser, $provider)
    {
        $account = $this->getAccount($providerUser->getId());

        if ($account) {
            return $account->user;
        } else {
            $account = $this->account->create([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $provider,
                'access_token' => $providerUser->token
            ]);

            $user = $this->user->findBy('email', $providerUser->getEmail());

            if ($providerUser->getName()) {
                $name = $providerUser->getName();
            } else {
                $name = $provider;
            }
            if (!$user) {
                $user = $this->user->create([
                    'email' => $providerUser->getEmail(),
                    'name' => $name,
                    'password' => bcrypt(str_random(8)),
                    'is_activated' => 1
                ]);
            }
            $account->user()->associate($user);
            $account->save();
            return $user;
        }
    }

    /**
     * @return mixed
     */
    public function getAccount($id)
    {
        $account = $this->account->findBy('provider_user_id', $id);
        return $account;
    }
}
