<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'id' => 'af611d00-e410-4752-b630-57c4302b5c48',
            'area_id' => 1,
            'genre_id' => 1,
            'user_id' => 2,
            'name' => '仙人',
            'about' => '料理長厳選の食材から作る寿司を用いたコースをぜひお楽しみください。食材・味・価格、お客様の満足度を徹底的に追及したお店です。特別な日のお食事、ビジネス接待まで気軽に使用することができます。',
            'picture' => 'sushi.jpg',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'id' => 'e0ad2f7b-6c88-4850-9e88-610793cf20d9',
            'area_id' => 2,
            'genre_id' => 2,
            'user_id' => 2,
            'name' => '牛助',
            'about' => '焼肉業界で20年間経験を積み、肉を熟知したマスターによる実力派焼肉店。長年の実績とお付き合いをもとに、なかなか食べられない希少部位も仕入れております。また、ゆったりとくつろげる空間はお仕事終わりの一杯や女子会にぴったりです。',
            'picture' => 'yakiniku.jpg',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'id' => 'd2e85bda-0a88-4867-99e2-265048d68bd8',
            'area_id' => 3,
            'genre_id' => 3,
            'user_id' => 2,
            'name' => '戦慄',
            'about' => '気軽に立ち寄れる昔懐かしの大衆居酒屋です。キンキンに冷えたビールを、なんと199円で。鳥かわ煮込み串は販売総数100000本突破の名物料理です。仕事帰りに是非御来店ください。',
            'picture' => 'izakaya.jpg',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'id' => '17236d61-57b2-4fce-93d5-d63516efd72c',
            'area_id' => 1,
            'genre_id' => 4,
            'user_id' => 2,
            'name' => 'ルーク',
            'about' => '都心にひっそりとたたずむ、古民家を改築した落ち着いた空間です。イタリアで修業を重ねたシェフによるモダンなイタリア料理とソムリエセレクトによる厳選ワインとのペアリングが好評です。ゆっくりと上質な時間をお楽しみください。',
            'picture' => 'italian.jpg',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'id' => 'b6527d43-5c3c-4bf3-97c1-ef2430351699',
            'area_id' => 3,
            'genre_id' => 5,
            'user_id' => 2,
            'name' => '志摩屋',
            'about' => 'ラーメン屋とは思えない店内にはカウンター席はもちろん、個室も用意してあります。ラーメンはこってり系・あっさり系ともに揃っています。その他豊富な一品料理やアルコールも用意しており、居酒屋としても利用できます。ぜひご来店をお待ちしております。',
            'picture' => 'ramen.jpg',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'id' => 'dc3ae238-3133-49c0-9e87-1a2301fea4d3',
            'area_id' => 1,
            'genre_id' => 2,
            'user_id' => 2,
            'name' => '香',
            'about' => '大小さまざまなお部屋をご用意してます。デートや接待、記念日や誕生日など特別な日にご利用ください。皆様のご来店をお待ちしております。',
            'picture' => 'yakiniku.jpg',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'id' => 'ec325f7b-458b-4291-ac27-d0beef8ec315',
            'area_id' => 2,
            'genre_id' => 4,
            'user_id' => 2,
            'name' => 'JJ',
            'about' => 'イタリア製ピザ窯芳ばしく焼き上げた極薄のミラノピッツァや厳選されたワインをお楽しみいただけます。女子会や男子会、記念日やお誕生日会にもオススメです。',
            'picture' => 'italian.jpg',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'id' => '4653f44d-cdb1-46fb-8477-6d2cdc470511',
            'area_id' => 1,
            'genre_id' => 5,
            'user_id' => 2,
            'name' => 'らーめん極み',
            'about' => '一杯、一杯心を込めて職人が作っております。味付けは少し濃いめです。 食べやすく最後の一滴まで美味しく飲めると好評です。',
            'picture' => 'ramen.jpg',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'id' => 'b723525c-0c17-44fe-9bdb-414d6c3d60c6',
            'area_id' => 2,
            'genre_id' => 3,
            'user_id' => 2,
            'name' => '鳥雨',
            'about' => '素材の旨味を存分に引き出す為に、塩焼を中心としたお店です。比内地鶏を中心に、厳選素材を職人が備長炭で豪快に焼き上げます。清潔な内装に包まれた大人の隠れ家で贅沢で優雅な時間をお過ごし下さい。',
            'picture' => 'izakaya.jpg',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'id' => '27e61761-9b29-42ba-81ab-5a44e523de7e',
            'area_id' => 1,
            'genre_id' => 1,
            'user_id' => 2,
            'name' => '築地色合',
            'about' => '鮨好きの方の為の鮨屋として、迫力ある大きさの握りを1貫ずつ提供致します。',
            'picture' => 'sushi.jpg',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'id' => 'e45b5cc6-f376-4c9f-97cf-3fc28131f0d2',
            'area_id' => 2,
            'genre_id' => 2,
            'user_id' => 2,
            'name' => '晴海',
            'about' => '毎年チャンピオン牛を買い付け、仙台市長から表彰されるほどの上質な仕入れをする精肉店オーナーの本当に美味しい国産牛を食べてもらいたいという思いから誕生したお店です。',
            'picture' => 'yakiniku.jpg',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'id' => '88aef25f-16c6-45e3-9869-cff250475180',
            'area_id' => 3,
            'genre_id' => 2,
            'user_id' => 2,
            'name' => '三子',
            'about' => '最高級の美味しいお肉で日々の疲れを軽減していただければと贅沢にサーロインを盛り込んだ御膳をご用意しております。',
            'picture' => 'yakiniku.jpg',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'id' => '289b83eb-418c-4285-90d9-466877147acd',
            'area_id' => 1,
            'genre_id' => 3,
            'user_id' => 2,
            'name' => '八戒',
            'about' => '当店自慢の鍋や焼き鳥などお好きなだけ堪能できる食べ放題プランをご用意しております。飲み放題は2時間と3時間がございます。',
            'picture' => 'izakaya.jpg',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'id' => '79d63923-0127-492b-ab3e-6520a7df291c',
            'area_id' => 2,
            'genre_id' => 1,
            'user_id' => 2,
            'name' => '福助',
            'about' => 'ミシュラン掲載店で磨いた、寿司職人の旨さへのこだわりはもちろん、 食事をゆっくりと楽しんでいただける空間作りも意識し続けております。 接待や大切なお食事にはぜひご利用ください。',
            'picture' => 'sushi.jpg',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'id' => '1f6264ef-422a-4cc9-8d69-eb9e8ef314b8',
            'area_id' => 1,
            'genre_id' => 5,
            'user_id' => 2,
            'name' => 'ラー北',
            'about' => 'お昼にはランチを求められるサラリーマン、夕方から夜にかけては、学生や会社帰りのサラリーマン、小上がり席もありファミリー層にも大人気です。',
            'picture' => 'ramen.jpg',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'id' => '33978068-c58b-4274-8764-38f53c2be601',
            'area_id' => 2,
            'genre_id' => 3,
            'user_id' => 2,
            'name' => '翔',
            'about' => '博多出身の店主自ら厳選した新鮮な旬の素材を使ったコース料理をご提供します。一人一人のお客様に目が届くようにしております。',
            'picture' => 'izakaya.jpg',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'id' => 'bcd1a650-646e-4f09-a74c-d518f3aaf57f',
            'area_id' => 1,
            'genre_id' => 1,
            'user_id' => 2,
            'name' => '経緯',
            'about' => '職人が一つ一つ心を込めて丁寧に仕上げた、江戸前鮨ならではの味をお楽しみ頂けます。鮨に合った希少なお酒も数多くご用意しております。他にはない海鮮太巻き、当店自慢の蒸し鮑、是非ご賞味下さい。',
            'picture' => 'sushi.jpg',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'id' => '87e656e1-c404-4133-948a-281c361a1ef4',
            'area_id' => 1,
            'genre_id' => 2,
            'user_id' => 2,
            'name' => '漆',
            'about' => '店内に一歩足を踏み入れると、肉の焼ける音と芳香が猛烈に食欲を掻き立ててくる。そんな漆で味わえるのは至極の焼き肉です。',
            'picture' => 'yakiniku.jpg',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'id' => '46995491-e529-4995-9cf5-6b18494b148c',
            'area_id' => 3,
            'genre_id' => 4,
            'user_id' => 2,
            'name' => 'THE TOOL',
            'about' => '非日常的な空間で日頃の疲れを癒し、ゆったりとした上質な時間を過ごせる大人の為のレストラン&バーです。',
            'picture' => 'italian.jpg',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'id' => '5e54a6c3-fd24-4a00-8660-b874922f3383',
            'area_id' => 2,
            'genre_id' => 1,
            'user_id' => 2,
            'name' => '木船',
            'about' => '毎日店主自ら市場等に出向き、厳選した魚介類が、お鮨をはじめとした繊細な料理に仕立てられます。また、選りすぐりの種類豊富なドリンクもご用意しております。',
            'picture' => 'sushi.jpg',
        ];
        DB::table('shops')->insert($param);    }
}
