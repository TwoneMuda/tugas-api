<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Interaction;
use App\Models\Message;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        Model::unguarded(function (): void {
            $users = collect([
                [
                    'name' => 'Test User',
                    'email' => 'test@example.com',
                    'bio' => 'Akun demo untuk mencoba API.',
                ],
                [
                    'name' => 'Ayu Pratama',
                    'email' => 'ayu@example.com',
                    'bio' => 'Senang berbagi cerita dan foto.',
                ],
                [
                    'name' => 'Budi Santoso',
                    'email' => 'budi@example.com',
                    'bio' => 'Penggemar kopi dan teknologi.',
                ],
            ])->mapWithKeys(function (array $attributes): array {
                $user = User::firstOrCreate(
                    ['email' => $attributes['email']],
                    [
                        'name' => $attributes['name'],
                        'password' => 'password123',
                        'bio' => $attributes['bio'],
                    ],
                );

                return [$attributes['email'] => $user];
            });

            $posts = collect([
                [
                    'user' => 'test@example.com',
                    'content' => 'Halo! Ini postingan pertama untuk mencoba API.',
                ],
                [
                    'user' => 'ayu@example.com',
                    'content' => 'Menikmati suasana pagi yang cerah hari ini.',
                ],
                [
                    'user' => 'budi@example.com',
                    'content' => 'Sedang mencoba aplikasi sosial media baru.',
                ],
            ])->map(function (array $attributes) use ($users): Post {
                return Post::firstOrCreate(
                    [
                        'user_id' => $users[$attributes['user']]->id,
                        'content' => $attributes['content'],
                    ],
                );
            });

            Comment::firstOrCreate([
                'user_id' => $users['ayu@example.com']->id,
                'post_id' => $posts[0]->id,
                'comment' => 'Selamat mencoba!',
            ]);

            Comment::firstOrCreate([
                'user_id' => $users['budi@example.com']->id,
                'post_id' => $posts[1]->id,
                'comment' => 'Paginya terlihat menyenangkan.',
            ]);

            Interaction::firstOrCreate([
                'user_id' => $users['ayu@example.com']->id,
                'post_id' => $posts[0]->id,
                'type' => 'like',
            ]);

            Interaction::firstOrCreate([
                'user_id' => $users['budi@example.com']->id,
                'post_id' => $posts[1]->id,
                'type' => 'like',
            ]);

            Message::firstOrCreate([
                'sender_id' => $users['test@example.com']->id,
                'receiver_id' => $users['ayu@example.com']->id,
                'message' => 'Halo Ayu, apa kabar?',
            ]);

            Message::firstOrCreate([
                'sender_id' => $users['ayu@example.com']->id,
                'receiver_id' => $users['test@example.com']->id,
                'message' => 'Baik, terima kasih!',
            ]);
        });
    }
}
