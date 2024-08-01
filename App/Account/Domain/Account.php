<?php
namespace App\Account\Domain;

use Tuezy\Model;

class Account extends Model{
    const USERNAME = 'username';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const STATUS = 'status';
    const NAME = 'name';


    const ACCOUNT_STATUS = [
        "Active" => "The account is fully functional and can access all its intended features and services.",
        "Inactive" => "The account is temporarily disabled and cannot access certain or all features until reactivated.",
        "Suspended" => "The account is temporarily disabled due to some violation of terms or other issues and requires intervention to be reactivated.",
        "Closed" => "The account has been permanently closed and cannot be reactivated.",
        "Pending" => "The account is in the process of being created or activated and is not yet fully functional.",
        "Locked" => "The account has been locked due to security reasons, such as multiple failed login attempts, and requires verification to be unlocked.",
        "Verified" => "The account has been verified, often through email or phone number verification.",
        "Unverified" => "The account has not completed the verification process."
    ];

    const STATUS_PENDING = 'pending';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_UNVERIFIED =  'Unverified';
    const STATUS_VERIFIED = 'verified';
    const STATUS_ACTIVE = 'active';
    const STATUS_SUSPENDED = 'suspended';
    const STATUS_CLOSED = 'closed';
    const STATUS_BLOCKED = 'blocked';


    const STATUS_VALUE = [
        self::STATUS_PENDING => 0,
        self::STATUS_INACTIVE => 1,
        self::STATUS_UNVERIFIED => 2,
        self::STATUS_VERIFIED => 3,
        self::STATUS_ACTIVE => 4,
        self::STATUS_SUSPENDED => 5,
        self::STATUS_CLOSED => 6,
        self::STATUS_BLOCKED => 7,
    ];


    protected $fillable = [
        self::USERNAME, self::PASSWORD, self::EMAIL, self::STATUS, self::NAME, self::ACCOUNT_STATUS,
    ];

}