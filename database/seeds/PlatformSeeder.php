<?php

use Illuminate\Database\Seeder;
use App\Platform;
use App\Action;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("platforms")->truncate();
        DB::table("actions")->truncate();

        Platform::create(["id" => 1, "name" => "facebook", "logo" => "https://res.cloudinary.com/dmcqsiu6h/image/upload/v1592998852/icons/social_media_icons/facebook-circle_qluuns.svg"]);
        Platform::create(["id" => 2, "name" => "google", "logo" => "https://res.cloudinary.com/dmcqsiu6h/image/upload/v1592998852/icons/social_media_icons/google_lzlfdi.svg"]);
        Platform::create(["id" => 3, "name" => "youtube", "logo" => "https://res.cloudinary.com/dmcqsiu6h/image/upload/v1592998852/icons/social_media_icons/youtube_dcefl5.svg"]);
        Platform::create(["id" => 4, "name" => "instagram", "logo" => "https://res.cloudinary.com/dmcqsiu6h/image/upload/v1592998852/icons/social_media_icons/instagram_old_xujc2s.svg"]);
        Platform::create(["id" => 5, "name" => "twitter", "logo" => "https://res.cloudinary.com/dmcqsiu6h/image/upload/v1592998852/icons/social_media_icons/twitter_e8tqmc.svg"]);

        Action::create(["name" => "like", "icon" => "https://res.cloudinary.com/dmcqsiu6h/image/upload/v1592998838/icons/actions/like_nrbyq6.svg"]);
        Action::create(["name" => "comment", "icon" => "https://res.cloudinary.com/dmcqsiu6h/image/upload/v1592998838/icons/actions/comment_eyoqod.svg"]);
        Action::create(["name" => "report", "icon" => "https://res.cloudinary.com/dmcqsiu6h/image/upload/v1592998838/icons/actions/report_upciyi.svg"]);
        Action::create(["name" => "share", "icon" => "https://res.cloudinary.com/dmcqsiu6h/image/upload/v1592998838/icons/actions/share_zcephv.svg"]);
        Action::create(["name" => "rate", "icon" => "https://res.cloudinary.com/dmcqsiu6h/image/upload/v1592998838/icons/actions/rate_ezdlt5.svg"]);
        Action::create(["name" => "dislike", "icon" => "https://res.cloudinary.com/dmcqsiu6h/image/upload/v1592998838/icons/actions/dislike_gx6v0w.svg"]);
        Action::create(["name" => "retweet", "icon" => "https://res.cloudinary.com/dmcqsiu6h/image/upload/v1592998852/icons/social_media_icons/twitter_e8tqmc.svg"]);
    }
}
