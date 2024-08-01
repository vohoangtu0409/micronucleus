<?php
namespace App\Account\Domain;

interface AccountRepositoryInterface{
    public function getAll();
    public function getAccountById($id);

    public function createAccount(Account $account);

    public function updateAccount(Account $account);

    public function deleteAccount(Account $account);

    public function updatePassword(Account $account);

    public function updateProfile(Account $account);

    public function deleteProfile(Account $account);

    public function createProfile(Account $account);

    public function updateProfilePicture(Account $account);

    public function deleteProfilePicture(Account $account);

    public function updateEmail(Account $account);


}