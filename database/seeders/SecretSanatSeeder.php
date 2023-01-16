<?php

namespace Database\Seeders;

use App\Models\Santa;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SecretSanatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::query()->get()->toArray();
        $senders = $users;
        $recipient = $users;
        if (Santa::query()->count() == 0) {
            foreach ($senders as $user) {
                $notAssigned = true;
                while ($notAssigned) {
                    $randomUser = mt_rand(0, sizeof($recipient) - 1);

                    if ($user['id'] !== $recipient[$randomUser]['id']) {
                        Santa::create([
                            "sender_user_id" => $user['id'],
                            "recipient_user_id" => $recipient[$randomUser]['id']
                        ]);
                        $recipient[$randomUser]['recievingFrom'] = $user['email'];
                        unset($recipient[$randomUser]);
                        $recipient = array_values($recipient);
                        $notAssigned = false;
                    }
                }
            }
        }
    }
}
