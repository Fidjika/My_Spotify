<?php

namespace getInfo;

include_once 'config.php';

use BbbConnection\connect_to_bdd;
use PDO;

class getInfo {

    public function __construct() {
        
        // connection to bdd
        $this->bddAccess = new connect_to_bdd;
        $this->bdd       = $this->bddAccess->BddConnect();        
    }

    public function getArtiste(){
        $querry = $this->bdd->prepare("SELECT name FROM artists LIMIT 10");
        $querry->execute();
        return $querry->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // get name of artiste                                                                                                                                                                         
    public function getArtisteName($name) {
        
        $querry = $this->bdd->prepare("SELECT name FROM artists WHERE name LIKE '$name%'");
        $querry->execute();
        return $querry->fetchAll(PDO::FETCH_ASSOC);
        
    }

    // get artistes bio
    public function getArtisteBio($nameOfArtiste) {
        
        $querry = $this->bdd->prepare("SELECT bio FROM artists WHERE name LIKE '$nameOfArtiste'");
        $querry->execute();
        return $querry->fetchAll(PDO::FETCH_ASSOC);
        
    }
    
    // get artistes albums
    public function getAlbums($nameOfArtiste) {
        
        $querry = $this->bdd->prepare("SELECT albums.name FROM `albums` JOIN artists on albums.artist_id = artists.id WHERE artists.name LIKE '$nameOfArtiste'  ");
        $querry->execute();
        return $querry->fetchAll(PDO::FETCH_ASSOC);

    }

    // get artistes picture
    public function getArtistePicture($nameOfArtiste) {

        $querry = $this->bdd->prepare("SELECT photo FROM artists WHERE name LIKE '$nameOfArtiste'");
        $querry->execute();
        return $querry->fetchAll(PDO::FETCH_ASSOC);

    }

    // get picture from albums
    public function getAlbumPicture($nameOfAlbum) {

        $querry = $this->bdd->prepare("SELECT cover FROM albums WHERE name LIKE '$nameOfAlbum'");
        $querry->execute();
        return $querry->fetchAll(PDO::FETCH_ASSOC);

    }

    // get musique form albums
    public function getAlbumMusique($nameOfAlbum) {

        $querry = $this->bdd->prepare("SELECT tracks.name FROM tracks JOIN albums ON tracks.album_id = albums.id WHERE albums.name LIKE '$nameOfAlbum'");
        $querry->execute();
        return $querry->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getAlbumDesc($nameOfAlbum){

        $querry = $this->bdd->prepare("SELECT description FROM albums WHERE name LIKE '$nameOfAlbum'");
        $querry->execute();
        return $querry->fetchAll(PDO::FETCH_ASSOC);
    }

    // get genre form albums
    public function getAlbumGenre($nameOfAlbum) {

        $querry = $this->bdd->prepare("SELECT genres.name FROM genres JOIN genres_albums on genres.id = genres_albums.genre_id JOIN albums ON genres_albums.album_id = albums.id WHERE albums.name LIKE'$nameOfAlbum'");
        $querry->execute();
        return $querry->fetchAll(PDO::FETCH_ASSOC);

    }

    // get name of albums
    public function getAlbumName($name) {

        $querry = $this->bdd->prepare("SELECT name FROM albums WHERE name LIKE '$name%'");
        $querry->execute();
        return $querry->fetchAll(PDO::FETCH_ASSOC);

    }

    // get number of tracks form albums
    public function getNumberOfTracks($nameOfAlbum) {

        $querry = $this->bdd->prepare("SELECT track_no FROM tracks JOIN albums on tracks.album_id = albums.id  WHERE albums.name LIKE '$nameOfAlbum'");
        $querry->execute();
        return $querry->fetchAll(PDO::FETCH_ASSOC);

    }

    // get populariter form albums
    public function getAlbumPop($nameOfAlbum) {

        $querry = $this->bdd->prepare("SELECT popularity FROM albums WHERE name LIKE '$nameOfAlbum'");
        $querry->execute();
        return $querry->fetchAll(PDO::FETCH_ASSOC);

    }

    // get creation date for albums
    public function getAlbumReleaseDate($nameOfAlbum) {

        $querry = $this->bdd->prepare("SELECT release_date FROM albums WHERE name LIKE '$nameOfAlbum'");
        $querry->execute();
        return $querry->fetchAll(PDO::FETCH_ASSOC);

    }

    // get title of musique
    public function getMusiqueTitle($name) {

        $querry = $this->bdd->prepare("SELECT name FROM tracks WHERE name LIKE '$name%'");
        $querry->execute();
        return $querry->fetchAll(PDO::FETCH_ASSOC);

    }

    // get time of musique
    public function getMusiqueTime($nameOfMusique) {

        $querry = $this->bdd->prepare("SELECT duration FROM tracks WHERE name LIKE '$nameOfMusique'");
        $querry->execute();
        return $querry->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getMusiqueLiens($nameOfMusique){

        $querry = $this->bdd->prepare("SELECT mp3 FROM tracks WHERE name LIKE '$nameOfMusique'");
        $querry->execute();
        return $querry->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getMusic($name){

        $querry = $this->bdd->prepare("SELECT * FROM `tracks` WHERE name LIKE '$name%'");
        $querry->execute();
        return $querry->fetchAll(PDO::FETCH_ASSOC);

    }
};
