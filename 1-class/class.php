 <?php


class news extends genos {

    public $id;
    public $titre;
    public $texte;
    public $auteur_crea;
    public $auteur_maj;
    public $auteur;
    public $date_crea;
    public $date_maj;
    public $img;
    public $actif;
    public $suppr;


    public function __construct() {
        parent::__construct();
    }

}

class configuration extends genos {

    public $id;
    public $type;
    public $value;
    public $actif;
    public $suppr;


    public function __construct() {
        parent::__construct();
    }

}

class user extends genos
    {
        public $id;
        public $nom;
        public $pnom;
        public $email;
        public $login;
        public $mdp;
        public $date_crea;
        public $admin;
        public $actif;
        public $suppr;

        public function __construct(){
            parent::__construct();
            $this->nom      = "";
            $this->pnom     = "";
            $this->email    = "";
            $this->login    = "";
            $this->mdp      = "";
            $this->admin    = 0;
        }
}
        

class territoire extends genos {

    public $id;
    public $territoire;
    public $en_territoire;
    public $ue;
    public $topo;
    public $actif;
    public $suppr;

    public function __construct() {
        parent::__construct();
    }

}

class activite extends genos {

    public $id;
    public $activite;
    public $en_activite;
    public $actif;
    public $suppr;

    public function __construct() {
        parent::__construct();
    }

}

class news_activite extends genos{

    public $id;
    public $id_news;
    public $id_activite;
    public $actif;
    public $suppr;

    public function __construct(){
        parent::__construct();
    }
}

class news_territoire extends genos{

    public $id;
    public $id_news;
    public $id_territoire;
    public $actif;
    public $suppr;

    public function __construct(){
        parent::__construct();
    }
}

class territoire_activite extends genos{

    public $id;
    public $id_activite;
    public $id_territoire;
    public $actif;
    public $suppr;

    public function __construct(){
        parent::__construct();
    }
}

class upload extends genos{
    public $id;
    public $id_news;
    public $file;
    public $actif;
    public $suppr;

    public function __construct(){
        parent::__construct();
    }
}