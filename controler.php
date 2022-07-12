<?php 

namespace Control;
include_once 'getInfo.php';

use getInfo\getInfo;

class control {

    public function __construct() {
        // instantiation class getInfo
        $this->inst = new getInfo;
    }

    public function createJson() {
        $b = [];

        foreach ($this->inst->getArtiste() as $artistes) {
            
            $photo = $this->inst->getArtistePicture($artistes['name']);
            $bio   = $this->inst->getArtisteBio($artistes['name']);
            
            foreach ($this->inst->getAlbums($artistes['name']) as $albumName) {
                
                $genre       = $this->inst->getAlbumGenre($albumName['name']);
                $photo       = $this->inst->getAlbumPicture($albumName['name']);
                $desc        = $this->inst->getAlbumDesc($albumName['name']);
                $pop         = $this->inst->getAlbumPop($albumName['name']);
                $releaseDate = $this->inst->getAlbumReleaseDate($albumName['name']);
                
                foreach ($this->inst->getAlbumMusique($albumName['name']) as $musiqueName) {
                    
                    $dureeMusique  = $this->inst->getMusiqueTime($musiqueName['name']);
                    $lienOfMusique = $this->inst->getMusiqueLiens($musiqueName['name']);
                };
            }; 
            array_push($b, array("artiste" => $artistes['name'], "photo" => $photo[0]["cover"], "bio" => $bio[0]['bio'], "album" => array("name" => $albumName['name'], "genre" => $genre[0]['name'], "photo" => $photo[0]['cover'], "description" => $desc[0]['description'], "popularité" => $pop[0]['popularity'], "date de sortie" => $releaseDate[0]['release_date'], "musique" => array("name" => $musiqueName['name'], "duree" => $dureeMusique[0]['duration'], "lien" => $lienOfMusique[0]['mp3']))));
        };
        $fp = fopen('script.json', 'w+');
        fwrite($fp, json_encode($b));
        fclose($fp);
    }
};

$instControl = new control;
var_dump($instControl->createJson());

?>