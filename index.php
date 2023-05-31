<?php 

session_start();
include('assets/loader.html');
include('pages/databases/connectToBD.php');
require_once 'vendor/autoload.php';

if(isset($_SESSION['id'])){
    header('Location: pages/home');
}else if(isset($_SESSION['id'])){
    header('Location: pages/ADMIN.php');

}
else{
    
// init configuration
$clientID = '181763698264-8k0s1odm3jglvo4urbsqtauk9pghdusq.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/proyectos/trabajodegrado/index';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
   
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // get profile info
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $email =  $google_account_info->email;


    $consulta = "SELECT * FROM usuarios WHERE correo = ?";
    $sentencia = $mbd->prepare($consulta);
    $sentencia->bindParam(1,$email);
    $sentencia->execute();
    $data = $sentencia->fetch();
    $filas = $sentencia->rowCount();
    if($filas > 0){
        if($data['estado'] == 'activo'){
            session_start();
            if($data['rol'] == 'ADMIN'){
                $_SESSION['admin'] = $data['id'];
                header('Location: pages/ADMIN.php');
    
            }else{
                $_SESSION['id'] = $data['id'];
                header('Location: pages/home');
    
            }
        }else{
                header('Location: ./errorNoActivUser');
    
            }
    }else{
        echo 'no registrado';
    }
    
   
    // now you can use this profile info to create account in your website and make user logged in.
} else{
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/logo_sm.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Login</title>
</head>

<body>

    <div class=" flex items-center justify-center h-screen bg-gray-200">
        <div class="" style="z-index: 100;">
            <form id="formulario-login" method="post"
                class="bg-white form-sign-up shadow-md rounded px-8 pt-6 pb-10 mb-4  truncate">

                <div class="logo flex justify-center mb-5">
                    <img draggable="false" src="assets/images/logo_sm.png" alt="" width="130px">

                </div>
                <div class="mb-4">
                    <label class="block  text-gray-700 text-sm font-bold mb-2" for="username">
                        Correo
                    </label>
                    <input
                        class="border-gray-300 campo shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="username" minlength="8" type="email" placeholder="usuario@email.com" autocomplete="off" name="email">
                </div>
                <div class="relative">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Contraseña
                    </label>
                    <input
                        class=" campo border-gray-300 shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="password" type="password" placeholder="************" name="password">
                    <i class="fas fa-eye text-gray-600  flex items-center" id="boton-eye"
                        style="height:50%;position: absolute; right:10px;top:calc(50% - 3px); cursor:pointer"></i>

                </div>
                <div id="result-login"></div>
                <div class="">
                    <button id="boton-login"
                        class="mt-6 transition  duration-100 hover:text-white hover:bg-yellow-600 block border border-yellow-600 w-full  py-2 px-4 rounded focus:outline-none focus:bg-yellow-600 focus:text-white  bg-white text-yellow-600 font-bold"
                        type="button" name="boton">
                        Iniciar sesión
                    </button>
                    <a href="<?php echo $client->createAuthUrl() ?>"> <button
                            class=" transition  duration-100 mt-2 text-white hover:bg-gray-900 block border  w-full  py-2 px-4 rounded focus:outline-none bg-gray-800  "
                            type="button">
                            <i class="fa-brands fa-google mr-2"></i>Iniciar sesión con Google
                        </button> </a>
                    <!-- <div class="block text-center my-2 text-xs">Or</div>
                        <a href="singup" class="bg-blue-600 block rounded p-2 text-white text-center hover:bg-blue-700 transition duration-100">Crear cuenta</a> -->
                </div>


            </form>

            
            <p class="text-center text-gray-700 text-xs">
            Corporación Universitaria Rafael Núñez | Institución Universitaria | Vigilada Mineducación
            </p>
            
        </div>
    </div>
    <img src="assets/images/svg.png" draggable="false" alt=""
        style="position: absolute !important; bottom:0; width:100% ">
    <script src="assets/js/jquery.min.js"></script>

    <script src="assets/js/index.js"></script>
</body>

</html>
<?php } 
}?>