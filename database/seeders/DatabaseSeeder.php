<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model $santas;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory()->count(10)->create();
        $this->santas = $users->keyBy('id');
        /**
         * @var User $u
         */
        foreach ($users as $u) {
            $s = $this->findSanta($u);
            $u->secret_santa_id = $s->id;
            $u->save();
        }
    }

    protected function findSanta(User $user): User
    {
        $santa = $this->santas->random();
        if ($user->id === $santa->id) {
            return $this->findSanta($user);
        }
        $this->santas->forget($santa->id);
        return $santa;
    }
}
