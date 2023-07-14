<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function prueba ()
    {
        echo 'hola esto es una prueba';
    }

    public function anime($nombreCompleto = null)
{
    //LOS 10 ANIMES MAS CONOCIDOS
    $animes = [
        [
         "Anime"=> "Attack on Titan",
         "Sipnosis"=> "La historia sigue a Eren Yeager y sus amigos en su lucha contra los titanes, enormes criaturas que devoran a los humanos.",
         "Episodios"=> "75",
         "Temporadas"=> "4",
         "Fecha de estreno"=> "6 de abril de 2013",
         "Plataforma Oficial"=> "Crunchyroll, Funimation"
        ],
        [
         "Anime"=> "My Hero Academia",
         "Sipnosis"=> "Izuku Midoriya se esfuerza por convertirse en un héroe en un mundo donde la mayoría de las personas tienen superpoderes llamados 'Quirks'.",
         "Episodios"=> "113",
         "Temporadas"=> "5",
         "Fecha de estreno"=> "3 de abril de 2016",
         "Plataforma Oficial"=> "Crunchyroll, Funimation"
        ],
        [
         "Anime"=> "Demon Slayer",
         "Sipnosis"=> "Tanjiro Kamado se convierte en un cazador de demonios después de que su familia es asesinada y su hermana se convierte en un demonio.",
         "Episodios"=> "26",
         "Temporadas"=> "1",
         "Fecha de estreno"=> "6 de abril de 2019",
          "Plataforma Oficial"=> "Crunchyroll, Funimation"
        ],
         [
         "Anime"=> "One Piece",
         "Sipnosis"=> "Monkey D. Luffy y su tripulación de piratas buscan el tesoro legendario conocido como 'One Piece' en un vasto mundo lleno de peligros y aventuras.",
         "Episodios"=> "Más de 1000",
         "Temporadas"=> "20",
          "Fecha de estreno"=> "20 de octubre de 1999",
         "Plataforma Oficial"=> "Crunchyroll, Funimation"
        ],
        [
         "Anime"=> "Naruto",
         "Sipnosis"=> "Naruto Uzumaki es un joven ninja que busca convertirse en el Hokage, el líder de su aldea, mientras lucha contra enemigos poderosos y descubre la verdad sobre su pasado.",
         "Episodios"=> "220 (Naruto), 500 (Naruto Shippuden)",
          "Temporadas"=> "9 (Naruto), 21 (Naruto Shippuden)",
         "Fecha de estreno"=> "3 de octubre de 2002 (Naruto), 15 de febrero de 2007 (Naruto Shippuden)",
         "Plataforma Oficial"=> "Crunchyroll, Hulu"
        ],
        [
         "Anime"=> "Death Note",
         "Sipnosis"=> "Light Yagami encuentra un cuaderno sobrenatural que le permite matar a cualquier persona cuyo nombre escriba en él, y decide usarlo para purgar el mundo de criminales.",
         "Episodios"=> "37",
         "Temporadas"=> "1",
         "Fecha de estreno"=> "3 de octubre de 2006",
         "Plataforma Oficial"=> "Netflix, Crunchyroll"
        ],
        [
         "Anime"=> "Fullmetal Alchemist=> Brotherhood",
         "Sipnosis"=> "Los hermanos Edward y Alphonse Elric buscan la Piedra Filosofal para restaurar sus cuerpos después de un fallido experimento de alquimia.",
         "Episodios"=> "64",
         "Temporadas"=> "1",
         "Fecha de estreno"=> "5 de abril de 2009",
         "Plataforma Oficial"=> "Crunchyroll, Funimation"
        ],
        [
         "Anime"=> "Hunter x Hunter",
         "Sipnosis"=> "Gon Freecss se embarca en un viaje para convertirse en un cazador, una élite de individuos con habilidades especiales y acceso a áreas restringidas.",
         "Episodios"=> "148",
          "Temporadas"=> "6",
         "Fecha de estreno"=> "2 de octubre de 2011",
         "Plataforma Oficial"=> "Crunchyroll, Funimation"
        ],
        [
         "Anime"=> "Black Clover",
         "Sipnosis"=> "Asta, un joven sin poderes mágicos en un mundo donde la magia es común, busca convertirse en el Rey Mago y proteger su reino.",
         "Episodios"=> "170",
         "Temporadas"=> "5",
         "Fecha de estreno"=> "3 de octubre de 2017",
         "Plataforma Oficial"=> "Crunchyroll, Funimation"
        ],
         [
         "Anime"=> "Tokyo Ghoul",
         "Sipnosis"=> "Ken Kaneki se convierte en mitad ghoul después de un encuentro con uno de ellos y debe lidiar con su nueva vida y los peligros que enfrenta.",
         "Episodios"=> "48",
         "Temporadas"=> "4",
         "Fecha de estreno"=> "4 de julio de 2014 (Tokyo Ghoul), 3 de abril de 2018 (Tokyo Ghoul:re)",
         "Plataforma Oficial"=> "Funimation, Hulu"
         ]    
    ];

    if ($nombreCompleto) {
        $animeEncontrado = null;
        foreach ($animes as $anime) {
            $nombreApellido = $anime['Anime'];
            if (stripos($nombreApellido, $nombreCompleto) !== false) {
                $animeEncontrado = $anime;
                break;
            }
        }

        if ($animeEncontrado) {
            return $this->response->setJSON($animeEncontrado);
        } else {
            return $this->response->setJSON(["error" => "anime no encontrado"]);
        }
    }

    return $this->response->setJSON($animes);
}
// Login
    public function login(){
        return view('login');
     }

      /*$this->db=\Config\Database::connect();
         echo "hola";*/

    /* public function testdb()
    {
       
        $this->db=\Config\Database::connect();
        $query=$this->db->query("SELECT id, Anime, Sipnosis, Episodios, Temporadas, Fecha_de_estreno, Plataforma_Oficial
        FROM series.Animes");
        $result=$query->getResult();
        return $this->response->setJSON($result);
    }*/

    
   public function testdb($id = null)       
    {
              
        $this->db=\Config\Database::connect();
        $query=$this->db->query("SELECT id, Anime, Sipnosis, Episodios, Temporadas, Fecha_de_estreno, Plataforma_Oficial
        FROM series.Animes where id='$id' ");
        $result=$query->getResult();
        return $this->response->setJSON($result);
    }


///AGREGAR DATOS
public function agregarDato()
{
    $datosRecibidos = $this->request->getJSON(true); 
    // Insertar los datos en la base de datos
    $conexion = \Config\Database::connect();
    $conexion->table('Animes')->set($datosRecibidos)->insert();
    //Mostrar mensaje de confirmacion 
    $respuesta = [
        'mensaje' => 'Los Datos se agregaron exitosamente'
    ];

    return $this->response->setJSON($respuesta);
}

////ACTUALIZAR LOS DATOS
public function actualizarDato($id)
{
    // Recopilar la información proporcionada en la solicitud POST.   
    $datosRecibidos = $this->request->getJSON(true); 
    $conexion = \Config\Database::connect();
    $conexion->table('Animes')->set($datosRecibidos)->where('id', $id)->update();
    
    //Mostrar mensaje de confirmacion 
    $respuesta = [
        'mensaje' => 'Los Datos se actualizaron correctamnete'
    ];
    return $this->response->setJSON($respuesta);
}

///ELIMINAR DATOS
public function eliminar($id)
{
    $conexion = \Config\Database::connect();
    $conexion->table('Animes')->where('id', $id)->delete();

    $respuesta = [
        'mensaje' => 'Eliminado correctamente'
    ];

    return $this->response->setJSON($respuesta);
}
}
