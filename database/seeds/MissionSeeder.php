<?php

use App\Action;
use App\Mission;
use Illuminate\Database\Seeder;

class MissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("missions")->truncate();
        DB::table("missions_actions")->truncate();

        factory(App\Mission::class, 30)
            ->create();

        $faker = Faker\Factory::create();

        $actions = App\Action::pluck('id');
        $missions = App\Mission::pluck('id');

        for ($i = 0; $i < 100; $i++) {
            DB::table('missions_actions')->insert([
                'missionId' => $faker->randomElement($missions),
                'actionId' => $faker->randomElement($actions),
            ]);
        }

        Mission::create([
            'id' => '31',
            'publishDate' => '2020-07-04',
            'deadlineDate' => '2020-08-04',
            'happy' => '1',
            'image' => 'https://foreignpolicy.com/wp-content/uploads/2019/11/GettyImages-943350298.jpg?w=800&h=533&quality=90',
            'screenshot' => 'https://res.cloudinary.com/dmcqsiu6h/image/upload/v1594828884/vewupo3epmyo3qciesj0.jpg',
            'level' => '3',
            'points' => '58',
            'proposedComments' => ["Eum possimus inventore officia cumque quod eum sunt. Molestias adipisci esse omnis autem veritatis praesentium. Repudiandae omnis inventore sequi est. Commodi debitis est aperiam doloremque."],
            'limit' => '581',
            'status' => '2',
            'name' => 'Facebook Post',
            'url' => 'https://www.facebook.com/permalink.php?story_fbid=10217758102769101&id=1377125678',
            'version' => '7',
            'platformId' => '1',
            'created_at' => '2020-07-14 19:27:30',
            'updated_at' => '2020-07-14 19:27:30',
        ]);
        DB::table('missions_actions')->insert([ 'missionId' => 31, 'actionId' => 1 ]);

        Mission::create([
            'id' => '32',
            'publishDate' => '2020-07-04',
            'deadlineDate' => '2020-08-04',
            'happy' => '0',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcR7N4OFppgmZflVN_h_nz6taDJsSCiEefbqCGmeob-zXv7s-HmY&usqp=CAU',
            'screenshot' => 'https://res.cloudinary.com/dmcqsiu6h/image/upload/v1594829047/hxgpv3bv2vncgyfoazhl.jpg',
            'level' => '4',
            'points' => '130',
            'proposedComments' => ["Eum possimus inventore officia cumque quod eum sunt. Molestias adipisci esse omnis autem veritatis praesentium. Repudiandae omnis inventore sequi est. Commodi debitis est aperiam doloremque."],
            'limit' => '660',
            'status' => '2',
            'name' => 'Google Place',
            'url' => 'https://search.google.com/local/writereview?placeid=ChIJ-8_FY5I_HBUR00HZC3OSFDQ',
            'version' => '7',
            'platformId' => '2',
            'created_at' => '2020-07-14 19:27:30',
            'updated_at' => '2020-07-14 19:27:30',
        ]);

        DB::table('missions_actions')->insert([ 'missionId' => 32, 'actionId' => 5 ]);

        Mission::create([
            'id' => '33',
            'publishDate' => '2020-07-04',
            'deadlineDate' => '2020-08-04',
            'happy' => '1',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRG-z371KAIDZhi1AWWYjF38PySPc8ST8RjQkABUF4oasBZriug&usqp=CAU',
            'screenshot' => 'https://res.cloudinary.com/dmcqsiu6h/image/upload/v1594829114/zc9mphe0nrehxfnsqj6c.jpg',
            'level' => '4',
            'points' => '44',
            'proposedComments' => ["Eum possimus inventore officia cumque quod eum sunt. Molestias adipisci esse omnis autem veritatis praesentium. Repudiandae omnis inventore sequi est. Commodi debitis est aperiam doloremque."],
            'limit' => '34',
            'status' => '2',
            'name' => 'YouTube Movie',
            'url' => 'GWIp3RdM52o',
            'version' => '7',
            'platformId' => '3',
            'created_at' => '2020-07-14 19:27:30',
            'updated_at' => '2020-07-14 19:27:30',
        ]);
        DB::table('missions_actions')->insert([ 'missionId' => 33, 'actionId' => 1 ]);


        Mission::create([
            'id' => '34',
            'publishDate' => '2020-07-04',
            'deadlineDate' => '2020-08-04',
            'happy' => '0',
            'image' => 'https://foreignpolicy.com/wp-content/uploads/2019/11/GettyImages-943350298.jpg?w=800&h=533&quality=90',
            'screenshot' => 'https://res.cloudinary.com/dmcqsiu6h/image/upload/v1593356672/okpv5iql0xpyjmopsmej.jpg',
            'level' => '4',
            'points' => '44',
            'proposedComments' => ["Eum possimus inventore officia cumque quod eum sunt. Molestias adipisci esse omnis autem veritatis praesentium. Repudiandae omnis inventore sequi est. Commodi debitis est aperiam doloremque."],
            'limit' => '22',
            'status' => '2',
            'name' => 'Instagram Image',
            'url' => 'https://www.instagram.com/p/B6qa2YQnaK2/?utm_source=ig_web_copy_link',
            'version' => '7',
            'platformId' => '4',
            'created_at' => '2020-07-14 19:27:30',
            'updated_at' => '2020-07-14 19:27:30',
        ]);
        DB::table('missions_actions')->insert([ 'missionId' => 34, 'actionId' => 1 ]);

        Mission::create([
            'id' => '35',
            'publishDate' => '2020-07-04',
            'deadlineDate' => '2020-08-04',
            'happy' => '1',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRG-z371KAIDZhi1AWWYjF38PySPc8ST8RjQkABUF4oasBZriug&usqp=CAU',
            'screenshot' => 'https://res.cloudinary.com/dmcqsiu6h/image/upload/v1594829047/hxgpv3bv2vncgyfoazhl.jpg',
            'level' => '1',
            'points' => '88',
            'proposedComments' => ["Eum possimus inventore officia cumque quod eum sunt. Molestias adipisci esse omnis autem veritatis praesentium. Repudiandae omnis inventore sequi est. Commodi debitis est aperiam doloremque."],
            'limit' => '76',
            'status' => '2',
            'name' => 'Twitter Post',
            'url' => 'https://twitter.com/ddosSLhyoRy9M3P/status/1284005475768512513',
            'version' => '7',
            'platformId' => '5',
            'created_at' => '2020-07-14 19:27:30',
            'updated_at' => '2020-07-14 19:27:30',
        ]);
        DB::table('missions_actions')->insert([ 'missionId' => 35, 'actionId' => 1 ]);

    }
}
