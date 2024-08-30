<?php

namespace App\Jobs;

use App\Mail\AccountActivationMail;
use App\Models\ActivationToken;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SendAccountConfirmationEmail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(protected User $user)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $token = Str::random(64);

            ActivationToken::create([
                'user_id' => $this->user->id,
                'token' => $token,
            ]);

            $activationLink = "http://127.0.0.1:8000/account-activation?token={$token}";

            Log::error($activationLink);
            Mail::to($this->user->email)->send(new AccountActivationMail($this->user->name,$activationLink));
        } catch (Exception $e) {
           Log::error("Error: ". $e->getMessage(). " in file: ". $e->getFile(). " on line ". $e->getLine());
        }


    }
}
