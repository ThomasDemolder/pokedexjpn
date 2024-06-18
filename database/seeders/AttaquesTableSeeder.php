<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attaque;

class AttaquesTableSeeder extends Seeder
{
    public function run()
    {
        $attaques = [
            ['nom' => 'Tetsu no Ken', 'degat' => 80, 'description' => 'Une attaque de type acier qui utilise la force brute pour frapper.', 'type_id' => 1],
            ['nom' => 'Kinzoku Sora', 'degat' => 90, 'description' => 'Une puissante onde de choc métallique qui fait vibrer l\'air.', 'type_id' => 1],
            ['nom' => 'Gin no Sen', 'degat' => 70, 'description' => 'Une attaque rapide comme l\'éclair avec des éclats métalliques.', 'type_id' => 1],
            ['nom' => 'Kurogane Ryu', 'degat' => 95, 'description' => 'Une attaque imitant la puissance d\'un dragon de métal.', 'type_id' => 1],
            ['nom' => 'Tetsu Yari', 'degat' => 85, 'description' => 'Une attaque qui concentre l\'énergie métallique en une pointe perçante.', 'type_id' => 1],
            ['nom' => 'Hagane no Ame', 'degat' => 100, 'description' => 'Une pluie de particules métalliques tranchantes.', 'type_id' => 1],
            ['nom' => 'Gin no Kaze', 'degat' => 75, 'description' => 'Une brise métallique tranchante qui coupe tout sur son passage.', 'type_id' => 1],
            ['nom' => 'Kurogane no Tsume', 'degat' => 90, 'description' => 'Des griffes d\'acier redoutables qui déchirent l\'ennemi.', 'type_id' => 1],
            ['nom' => 'Tetsu no Hibana', 'degat' => 65, 'description' => 'Une pluie d\'étincelles métalliques brûlantes.', 'type_id' => 1],
            ['nom' => 'Hagane no Yari', 'degat' => 105, 'description' => 'Une lance spirituelle forgée d\'acier pur.', 'type_id' => 1],
            ['nom' => 'Ken Geki', 'degat' => 80, 'description' => 'Une attaque de type combat qui utilise un puissant coup de poing.', 'type_id' => 2],
            ['nom' => 'Kiai Hou', 'degat' => 90, 'description' => 'Un cri de bataille puissant qui intimide et frappe l\'ennemi.', 'type_id' => 2],
            ['nom' => 'Kuma Tetsu', 'degat' => 75, 'description' => 'Un coup de poing féroce inspiré de la force d\'un ours.', 'type_id' => 2],
            ['nom' => 'Tora Gari', 'degat' => 95, 'description' => 'Une attaque féroce imitant les griffes d\'un tigre.', 'type_id' => 2],
            ['nom' => 'Kensei Rendan', 'degat' => 85, 'description' => 'Une série de coups rapides et puissants.', 'type_id' => 2],
            ['nom' => 'Ryu no Te', 'degat' => 100, 'description' => 'Une attaque imitant la force destructrice d\'une patte de dragon.', 'type_id' => 2],
            ['nom' => 'Yama Arashi', 'degat' => 70, 'description' => 'Un coup violent inspiré par la force d\'une tempête de montagne.', 'type_id' => 2],
            ['nom' => 'Kuro Obi', 'degat' => 90, 'description' => 'Un coup de ceinture noire, puissant et précis.', 'type_id' => 2],
            ['nom' => 'Kensei Ryu', 'degat' => 65, 'description' => 'Une technique de combat inspirée par les maîtres samouraïs.', 'type_id' => 2],
            ['nom' => 'Hagane Tetsu', 'degat' => 105, 'description' => 'Un coup dévastateur inspiré par la dureté de l\'acier.', 'type_id' => 2],
            ['nom' => 'Ryū no Honō', 'degat' => 90, 'description' => 'Une attaque de type dragon qui libère des flammes draconiques.', 'type_id' => 3],
            ['nom' => 'Tatsu no Hikari', 'degat' => 100, 'description' => 'Une puissante lumière émise par un dragon pour aveugler et frapper l\'ennemi.', 'type_id' => 3],
            ['nom' => 'Kōryū Ken', 'degat' => 85, 'description' => 'Un coup de poing renforcé par la puissance des dragons.', 'type_id' => 3],
            ['nom' => 'Ryūsei Geki', 'degat' => 95, 'description' => 'Une attaque rapide et précise comme une étoile filante.', 'type_id' => 3],
            ['nom' => 'Tatsu no Hane', 'degat' => 80, 'description' => 'Une attaque utilisant des plumes de dragon tranchantes comme des lames.', 'type_id' => 3],
            ['nom' => 'Ryū no Ikari', 'degat' => 110, 'description' => 'Une attaque dévastatrice née de la colère d\'un dragon.', 'type_id' => 3],
            ['nom' => 'Tatsu no Kiba', 'degat' => 75, 'description' => 'Un coup de crocs inspiré par les dents acérées d\'un dragon.', 'type_id' => 3],
            ['nom' => 'Ryū no Tsume', 'degat' => 90, 'description' => 'Des griffes de dragon redoutables qui lacèrent l\'ennemi.', 'type_id' => 3],
            ['nom' => 'Kōryū no Tsubasa', 'degat' => 65, 'description' => 'Une attaque où des ailes de dragon frappent l\'adversaire.', 'type_id' => 3],
            ['nom' => 'Ryūsei Ha', 'degat' => 105, 'description' => 'Une onde de choc inspirée par la force des dragons célestes.', 'type_id' => 3],
            ['nom' => 'Mizu no Yaiba', 'degat' => 80, 'description' => 'Une attaque de type eau qui forme une lame tranchante d\'eau.', 'type_id' => 4],
            ['nom' => 'Suijin no Jutsu', 'degat' => 90, 'description' => 'Une technique qui invoque l\'esprit de l\'eau pour attaquer l\'ennemi.', 'type_id' => 4],
            ['nom' => 'Kaiyō Arashi', 'degat' => 95, 'description' => 'Une tempête océanique puissante qui engloutit tout sur son passage.', 'type_id' => 4],
            ['nom' => 'Shizuku Rendan', 'degat' => 75, 'description' => 'Une rafale de gouttes d\'eau tranchantes qui frappe rapidement.', 'type_id' => 4],
            ['nom' => 'Mizuchi no Hebi', 'degat' => 85, 'description' => 'Un serpent d\'eau qui attaque avec une grande vitesse et précision.', 'type_id' => 4],
            ['nom' => 'Nagareboshi Mizu', 'degat' => 100, 'description' => 'Une étoile filante d\'eau qui percute l\'ennemi avec force.', 'type_id' => 4],
            ['nom' => 'Umi no Hikari', 'degat' => 70, 'description' => 'Une lumière éblouissante émise par l\'océan pour aveugler l\'adversaire.', 'type_id' => 4],
            ['nom' => 'Kuroshio no Kiba', 'degat' => 90, 'description' => 'Des crocs puissants formés par le courant noir.', 'type_id' => 4],
            ['nom' => 'Mizu no Tate', 'degat' => 65, 'description' => 'Un bouclier d\'eau qui protège et contre-attaque.', 'type_id' => 4],
            ['nom' => 'Suijin no Hashira', 'degat' => 105, 'description' => 'Un pilier d\'eau invoqué pour frapper l\'adversaire avec une force immense.', 'type_id' => 4],
        ];

        foreach ($attaques as $attaque) {
            Attaque::create($attaque);
        }
    }
}

