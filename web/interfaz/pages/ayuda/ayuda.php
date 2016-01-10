<?
include('../php/Area_personal.class.php') ;
include('../php/BD.class.php');

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Area Persona | Gran Manzana</title>
      <?php require_once('../../head.php'); ?>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php require_once('../../header.php'); ?>
        <?php require_once('../../left-column.php'); ?>

        <div class="content-wrapper">
            <section class="content-header">
              <h1>
                Ayuda
                <small>Control de Ayuda</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="http://pruebas.granmanzana.es/areapersonal/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Ayuda</li>
              </ol>
            </section>
            
            <section class="content">
                <div class="row">
                  <div class="col-md-12">
                    
                    <!-- Que es GranManzana -->
                    <div class="box box-solid collapsed-box">
                      <div class="box-header">
                        <button class="btn btn-box-tool" data-widget="collapse">
                          <i class="fa fa-plus"></i> <h3 class="box-title">&nbsp; ¿Que es Gran Manzana? </h3>    
                        </button> 
                      </div><!-- /.box-header -->
                      <div class="box-body" style="display: none">
                        <p class="lead"></p>
                      
                        <!-- AYUDA 01-->
                         
                          <div class="box-body">
                          <p> El Grupo RGM es una empresa de publicidad que crea este portal de anuncios para el uso y disfrute de los usuarios particulares, con la satifacción de que este sitio les resulte de la máxima utilidad a la hora de encontrar lo que busca o vender lo que desea vender.</p>
                          <h3>SERVICIOS GRATUITOS:</h3>
                          <p>Como objetivo general nos hemos propuesto que el público de cualquier sector, ya sea el profesional, el empresarial o el particular tenga la oportunidad de intercambiar todo aquello que interese para sus fines como el comprar, el vender, el ofrecer sus servicios, o simplemente informar de todo aquello que se considera información útil nuestros visitantes y usuarios.</p>
                          <p>Ofrecemos:</p>
                          <ul>
                            <li>Anuncios de inmobiliaria: alquiler y venta de viviendas, oficinas, locales, naves industriales, plazas de garaje, trasteros, fincas rústicas, parcelas rústicas, parcelas urbanas y solares, vacaciones y pisos compartidos.</li>
                            <li>Anuncios de motor: turismos, todoterrenos, vehículos industriales, motos, quads, tuning y accesorios, vehículos clásicos, caravanas, autocaravanas, etc.</li>
                            <li>Anuncios de trabajo: ofertas de trabajo, demandas, formación</li>
                            <li>Anuncios de segunda mano: mobiliario y hogar, ropa y complementos, coleccionismo y antigüedades, imagen y sonido, informática y móviles, tiempo libre, joyería y relojes, etc.</li>
                            <li>Anuncios de contactos: amistad, él busca a ella, él busca a él, ella busca a él, ella busca a ella, otras relaciones</li>
                            <li>Sección de segunda mano: mobiliario, electrodomésticos, ropa, informática...</li>
                            <li>Anuncios de agricultura: maquinaria y accesorios, ganadería y agricultura</li>
                            <li>Anuncios de mascotas: perros (venta, regalo y montas), animales varios, accesorios...</li>
                            <li>Anuncios de caza y pesca: Caza, pesca, cotos, perros de caza, etc.</li>
                          </ul>
                          </div><!-- /.box-body -->
                        
                      
                        
                      </div><!-- /.box-body -->
                    </div>

                    <!-- Mi area de gestión -->
                    <div class="box box-solid collapsed-box">
                      <div class="box-header">
                        <button class="btn btn-box-tool" data-widget="collapse">
                          <i class="fa fa-plus"></i> <h3 class="box-title">&nbsp; Mi área de gestión</h3>    
                        </button> 
                      </div><!-- /.box-header -->
                      <div class="box-body" style="display: none">
                        <p class="lead">Aqui encontraras ayuda sobre el acceso a tu area privada, ademas de información para cualquier duda relacionada con los productos que tengas contratados.</p>
                      
                        <!-- AYUDA 01-->
                        <div class="box box-default collapsed-box">  
                          <div class="box-header with-border">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title text-light-blue">&nbsp; ¿Cómo accedo a mi área privada?</h3></button>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                            Para acceder al area privada pulsa sobre el boton Ingresas en la parte superior de la pantalla (recuerda poner tu email y contraseña y darle al botón “Acceder”).
                          </div><!-- /.box-body -->
                        </div> 
                      
                        <!-- AYUDA 02-->
                        <div class="box box-default collapsed-box">
                          <div class="box-header with-border">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title text-light-blue">&nbsp; No recuerdo mi contraseña/No puedo entrar en mi menú</h3></button>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                           ¡No te quedes sin entrar en GranManzana y recupera tu contraseña en pocos segundos! justo al ingresasr verás el link “He olvidado mi contraseña” que te permitirá restablecerla enviándote un correo electrónico. 
                          </div><!-- /.box-body -->
                        </div>
                      
                        <!-- AYUDA 03-->
                        <div class="box box-default collapsed-box">
                          <div class="box-header with-border">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i> <h3 class="box-title text-light-blue">&nbsp; Como crearme una cuenta en GranManzana.es</h3></button>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                            ¡Créate una cuenta y empieza a disfrutar de la experiencia GranManzana.es¿Cómo? Pulsa el botón registrarse de la Home!  (arriba a la derecha) y accede al enlace “Crear Cuenta Nueva”.  Rellena los campos que te pedimos… ¡y estarás registrado en pocos segundos!
                          </div><!-- /.box-body -->
                        </div>

                        <!-- AYUDA 04-->
                        <div class="box box-default collapsed-box">
                          <div class="box-header with-border">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title text-light-blue">&nbsp; ¿Cómo veo los contactos interesados en mi anuncio?</h3></button>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                            ¿Has recibido algún mensaje de alguien que está interesado en tu anuncio?  ¿no sabes cómo verlo? Inicia sesión con tu cuenta y pulsa en el apartado “Mensajes” ubicado en el menú izquierdo.
                          </div><!-- /.box-body -->
                        </div>
                        
                        <!-- AYUDA 05-->
                        <div class="box box-default collapsed-box">
                          <div class="box-header with-border">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title text-light-blue">&nbsp; ¿Cómo me doy de baja?</h3></button>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                            Nos da mucha pena que quieras irte de GranManzana.es ¿Podemos convencerte de lo contrario? En caso de no ser así, entra en tu cuenta y dirígete al apartado “Perfil” situado en el menú izquierdo. Tan sólo selecciona la opción “DAR DE BAJA MI ÁREA PERSONAL” (parte inferior derecha) y sigue los pasos que te pedimos. ¡Esperamos verte de vuelta en un futuro!
                          </div><!-- /.box-body -->
                        </div>
                      
                        <!-- AYUDA 06-->
                        <div class="box box-default collapsed-box">
                          <div class="box-header with-border">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title text-light-blue">&nbsp; ¿Cómo puedo gestionar mis notificaciones?</h3></button>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                            En GranManzana.es, ¡tú decides lo que te interesa! Si entras en tu cuenta, en el apartado “Notificaciones” podrás gestionar la información que deseas recibir. Tan sólo tienes que marcar o desmarcar las opciones que consideres y… ¡no te olvides de guardar los cambios para que queden configurados!   
                          </div><!-- /.box-body -->
                        </div>

                      </div><!-- /.box-body -->
                    </div>

                    <!-- Gestión de mis anuncios -->
                    <div class="box box-solid collapsed-box">
                      
                      <div class="box-header">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title">&nbsp; Gestión de Anuncios</h3></button>
                      </div><!-- /.box-header -->
                      
                      <div class="box-body" style="display: none">
                        <p class="lead">¿Necesitas ayuda con tus anuncios? Aquí encontrarás ayuda para publicar, modificar, eliminar o cualquier otra gestion que tengas que realizar con ellos.</p>
                        
                        <!-- AYUDA 01-->
                        <div class="box box-default collapsed-box"> 
                          <div class="box-header with-border">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i> <h3 class="box-title text-light-blue">&nbsp; ¿Cómo puedo publicar mi anuncio?</h3></button>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                            ¡Publicar un anuncio en GranManzana es muy fácil! En cualquier página de la web (arriba a la derecha) podrás ver el botón “Pon tu anuncio”. Accede y rellena los campos que te pedimos. 
                          </div><!-- /.box-body -->
                        </div> 

                        <!-- AYUDA 02-->
                        <div class="box box-default collapsed-box">
                          <div class="box-header with-border">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title text-light-blue">&nbsp; ¿Cómo puedo borrar mi anuncio?</h3></button>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                           Para borrar tu anuncio, entra en tu cuenta personal (puedes hacerlo a través del botón de la parte superior) y acceder al apartado “Anuncios”. Tan sólo deberás seleccionar el anuncio que deseas borrar y pulsar la opción “Eliminar” (tu anuncio se borrará en pocos minutos).  
                          </div><!-- /.box-body -->
                        </div>

                        <!-- AYUDA 03-->
                        <div class="box box-default collapsed-box">
                          <div class="box-header with-border">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title text-light-blue">&nbsp; ¿Cuántas fotografías puedo insertar en mi anuncio?</h3></button>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                           En GranManzana sabemos que las fotos son muy importantes a la hora de publicar un anuncio… ¡por eso puedes subir hasta 14 imágenes! Recuerda que los formatos permitidos son GIF, PNG y JPEG.
                          </div><!-- /.box-body -->
                        </div>

                        <!-- AYUDA 05-->
                        <div class="box box-default collapsed-box">
                          <div class="box-header with-border">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title text-light-blue">&nbsp; ¿Como puedo modificar mi anuncio?</h3></button>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                            Si quieres modificar un anuncio tan sólo debes accedes a tu cuenta e ir al apartado de gestión de “Anuncios” y seleccionar la opción “Modificar”. Para salvar los cambios debes pulsar en "Guardar".
                          </div><!-- /.box-body -->
                        </div>

                      </div><!-- /.box-body -->
                    </div>

                    <!-- Modificación de datos -->
                    <div class="box box-solid collapsed-box">
                      
                      <div class="box-header">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title">&nbsp; Modificación de datos</h3></button>
                      </div><!-- /.box-header -->
                      
                      <div class="box-body" style="display: none">
                        <p class="lead">¿Necesitas cambiar algún dato? Aquí te decimos como hacerlo.</p>
                        
                        <!-- AYUDA 01-->
                        <div class="box box-default collapsed-box"> 
                          <div class="box-header with-border">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title text-light-blue">&nbsp; ¿Cómo cambio lo datos de mis anuncios?</h3></button>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                            Puedes cambiar el nombre que aparece en tus anuncios accediento a tu cuenta personal y en el menú de la izquierda pulsa en “Perfil”.
                          </div><!-- /.box-body -->
                        </div> 

                        <!-- AYUDA 02-->
                        <div class="box box-default collapsed-box"> 
                          <div class="box-header with-border">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title text-light-blue">&nbsp; ¿Cómo cambio la geolocalización de mis anuncios?</h3></button>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                            Puedes cambiar el código postal que aparece en tus anuncios accediendo a tu cuenta personal y en el menú de la izquierda pulsa en “Anuncios”, Editar.
                          </div><!-- /.box-body -->
                        </div> 
      
                      </div><!-- /.box-body -->
                    </div>

                    <!-- Consutas técnicas -->
                    <div class="box box-solid collapsed-box">
                      
                      <div class="box-header">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title">&nbsp; Consultas Técnicas</h3></button>
                      </div><!-- /.box-header -->
                      
                      <div class="box-body" style="display: none">
                        <p class="lead"> ¿Problemas técnicos? Aquí encontaras ayuda si algo parece que no te funciona correctamente en GranManzana</p>
                        
                        <!-- AYUDA 01-->
                        <div class="box box-default collapsed-box"> 
                          <div class="box-header with-border">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title text-light-blue">&nbsp; No puedo poner mi anuncio</h3></button>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                            Si tienes problemas para poner tu anuncio, quizás se deba a alguno de estos casos:
                            <ul>
                              <li>¿Has completado todos los campos obligatorios del formulario?</li>
                              <li>¿Tienes actualizada la versión de tu navegador? Si no es así te recomendamos que la tengas.</li>
                            </ul>
                            Y si ya los has probado y sigues sin poder acceder, contacta con nosotros a través de formulario que encontrarás más abajo, nuestro equipo contactará contigo para ayudarte
                          </div><!-- /.box-body -->
                        </div> 

                        <!-- AYUDA 02-->
                        <div class="box box-default collapsed-box"> 
                          <div class="box-header with-border">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title text-light-blue">&nbsp; No puedo contactar con un vendedor</h3></button>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                            Si no puedes contactar por teléfono con el vendedor, ¡no te preocupes! Puedes enviarle un mensaje utilizando el formulario de contacto que verás en el lateral derecho del detalle del anuncio.
                          </div><!-- /.box-body -->
                        </div> 

                        <!-- AYUDA 03-->
                        <div class="box box-default collapsed-box"> 
                          <div class="box-header with-border">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title text-light-blue">&nbsp; No puedo acceder a mi cuenta</h3></button>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                            Si no puedes acceder a tu cuenta, quizás sea por uno de estos casos:
                            <ul>
                              <li>Al escribir tu email, ¿hay algún espacio en blanco?</li>
                              <li>¿Has puesto alguna mayúscula/minúscula, si corresponde, en la contraseña?</li>
                            </ul>
                            ¡Esperamos haberte ayudado!
                          </div><!-- /.box-body -->
                        </div> 
      
                        <!-- AYUDA 04-->
                        <div class="box box-default collapsed-box"> 
                          <div class="box-header with-border">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title text-light-blue">&nbsp; No puedo darme de baja de las comunicaciones</h3></button>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                            <p>En tu cuenta personal, concretamente en el apartado de <b>“Notificaciones”</b> (menú izquierdo) encontrarás las comunicaciones que te enviamos (y si quieres puedes darlas de baja):</p>
                            <p>- <b>Alertas:</b> Son envíos diarios o semanales y te enviamos contenido nuevo relacionado con tu búsqueda. Puedes habilitar o deshabilitar estas notificaciones.</p>
                            <p>- <b>Estadísticas:</b> ¡La información es poder! Desde GranManzana te enviamos, cada semana, un informe sobre el estado de tus anuncios (visitas, contactos etc.). Te recomendamos tener siempre esta notificación activada, de este modo sabrás cómo evolucionan tus anuncios y si hace falta que los revises.</p>
                            <p>- <b>Boletines y promociones:</b> Esta notificación va relacionada con información comercial y podrás habilitarla o deshabilitarla.</p>
                          </div><!-- /.box-body -->
                        </div> 
    
                      </div><!-- /.box-body -->
                    </div>

                    <!-- He contratado un producto y... -->
                    <div class="box box-solid collapsed-box">
                      
                      <div class="box-header">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title">&nbsp; He contratado un producto y...</h3></button>
                      </div><!-- /.box-header -->
                      
                      <div class="box-body" style="display: none">
                        <p class="lead"> ¿Problemas técnicos? Aquí encontaras ayuda si algo parece que no te funciona correctamente en GranManzana</p>
                        
                        <!-- AYUDA 01-->
                        <div class="box box-default collapsed-box"> 
                          <div class="box-header with-border">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title text-light-blue">&nbsp; He subido mi anuncio y no lo veo</h3></button>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                           ¿Has subido tu anuncio y todavía no lo ves? Recuerda que la página debe actualizarse: espera unos minutitos para que aparezca en las primeras posiciones.
                          </div><!-- /.box-body -->
                        </div> 

                        <!-- AYUDA 02-->
                        <div class="box box-default collapsed-box"> 
                          <div class="box-header with-border">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title text-light-blue">&nbsp; He destacado mi anuncio y no lo veo</h3></button>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                            ¿Has destacado tu anuncio y no lo ves? Recuerda que la página debe actualizarse: espera unos minutitos para que aparezca resaltado.
                          </div><!-- /.box-body -->
                        </div> 

                        <!-- AYUDA 03-->
                        <div class="box box-default collapsed-box"> 
                          <div class="box-header with-border">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title text-light-blue">&nbsp; He tenido problemas con el pago</h3></button>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                            Nuestro objetivo es ayudarte en todo lo que podamos y si tienes problemas con el pago de alguno de nuestros productos de viabilidad, no dudes en contactar con nosotros a través de nuestro formulario de contacto que encontraras mas abajo al rellenar tu email. ¡Cuánto antes lo solucionemos, mejor!
                          </div><!-- /.box-body -->
                        </div> 
      
                      </div><!-- /.box-body -->
                    </div>
                    
                    <!-- Compra y Vende seguro -->
                    <div class="box box-solid collapsed-box">
                      
                      <div class="box-header">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title">&nbsp; Compra y Vende seguro</h3></button>
                      </div><!-- /.box-header -->
                      
                      <div class="box-body" style="display: none">
                        <p class="lead"> En los portales de GranManzana se realizan miles de encuentros entre compradores y vendedores, sin embargo, nos han informado de varios intentos de estafa; te indicamos unas sencillas normas para evitar ese tipo de fraudes, e incluimos algunas recomendaciones para una Venta y Compra Segura.</p>
                        
                        <!-- AYUDA 01-->
                        <div class="box box-default collapsed-box"> 
                          <div class="box-header with-border">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title text-light-blue">&nbsp; Como comprar seguro</h3></button>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                          En GranManzana revisamos todos los anuncios pero es importante no bajar la guardia. ¿Qué te recomendamos?:
                          <ol>
                            <li>Desconfía de los precios excesivamente baratos. A todos nos gusta encontrar gangas pero a veces no es oro todo lo que reluce.</li>
                            <li>Realizar la transacción personalmente, es la mejor opción, es decir, pagar y recoger el artículo en el mismo instante. Es aconsejable llegar a un acuerdo para poder ver el producto e inspeccionarlo antes de la compra. antes de comprar, asegúrate de que el producto cumple con lo que esperas de él; así evitarás posibles inconvenientes…. ¡y algún que otro disgusto!</li>
                            <li>No envíes dinero a través de Western Unión, Moneygram, Bidpay u otros tipos de pago similares, ya que no pueden garantizar transacciones con desconocidos.</li>
                            <li>Nosotros (GranManzana) nunca intervenimos en la compra-venta. Así pues, no tengas en cuenta mensajes que te llegan suplantándonos diciendo que haremos de intermediarios.</li>
                            <li>Desconfía de los vendedores que evitan quedar personalmente o sólo admiten transferencias como forma de pago. Igualmente sospecha de aquellos vendedores que dicen que residen o están en el extranjero (Nigeria, Londres, Alemania, Costa de Marfil, etc.). Si no está en España te aconsejamos que lo descartes a no ser que lo veas muy claro.</li>
                            <li>No envíes dinero como entrada, señal, garantía, gastos de envío o por cualquier otra razón. Podría darse el caso de que el comprador haga el pago y que desaparezca todo rastro del contacto del vendedor.</li>
                            <li>Desconfía de vendedores que no quieren hablar a través de nuestro propio chat. A las primeras de cambio intentarán continuar la comunicación directamente por email para que así nosotros no los podamos controlar</li>
                          </ol>
                          ¡Esperamos que encuentres útiles estos consejos!
                          </div><!-- /.box-body -->
                        </div> 

                        <!-- AYUDA 02-->
                        <div class="box box-default collapsed-box"> 
                          <div class="box-header with-border">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title text-light-blue">&nbsp; Como vender seguro</h3></button>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                            Desde GranManzana nos gustaría darte estos consejos que pueden ayudarte a la hora de vender un artículo en el portal:
                            <ol>
                              <li>La mejor opción es realizar la transacción personalmente, es decir, cobrar y entregar el artículo en el mismo instante.</li>
                              <li>Contra-reembolso. Si eliges esta opción para vender un artículo, te informamos que el comprador solo podrá inspeccionar el artículo si tú lo autorizas indicándolo expresamente.</li>
                              <li>No admitas transacciones monetarias vía Western Unión, Moneygram, Bidpay o tipos de pago similares, ya que no pueden garantizar transacciones con desconocidos.</li>
                              <li>Desconfía de los compradores que evitan quedar personalmente o hablar por teléfono (lo quieren hacer todo por email). Igualmente sospecha de los que dicen que residen o están en el extranjero (Nigeria, Londres, Alemania, Costa de Marfil, etc.). Si no está en España te aconsejamos que lo descartes a no ser que lo veas muy claro.</li>
                              <li>Desconfía cuando el comprador te ofrezca una cantidad superior a la solicitada o que acepta comprar muy rápidamente sin haber visto el producto o preguntan para saber más detalles (especialmente si estamos hablando de productos caros).</li>
                              <li>Nosotros (GranManzana) nunca intervenimos en la compra-venta. Así pues, no tengas en cuenta mensajes que te llegan suplantándonos diciendo que haremos de intermediarios.</li> 
                            </ol>
                              ¡Si tienes alguna otra duda cuenta con nosotros para aconsejarte!

                          </div><!-- /.box-body -->
                        </div> 

                        <!-- AYUDA 03-->
                        <div class="box box-default collapsed-box"> 
                          <div class="box-header with-border">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title text-light-blue">&nbsp; Como detectar anuncios falsos</h3></button>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                            En GranManzana no queremos que tengas disgustos y por ello queremos darte algunas pautas que podrían ayudarte a detectar anuncios falsos:
                            <ol>
                              <li>Precios excesivamente baratos, es demasiado llamativo para ser verdad.</li>
                              <li>El vendedor/comprador reside en el extranjero</li>
                              <li>Anuncios con palabras en  inglés o otras lenguas extranjeras; normalmente  mal redactados, o con una mala traducción al castellano.</li>
                              <li>Teléfonos que no existen, poblaciones y provincias que no concuerdan (london/barcelona,...)</li>
                              <li>E-mail o nº de teléfono extranjero en el texto del anuncio.</li>
                            </ol>
                            ¡Si tienes alguna otra duda cuenta con nosotros para aconsejarte!

                          </div><!-- /.box-body -->
                        </div> 

                        <!-- AYUDA 04-->
                        <div class="box box-default collapsed-box"> 
                          <div class="box-header with-border">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title text-light-blue">&nbsp; Me han estafado, ¿qué hago?</h3></button>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                            <p>Si te han estafado, tienes que saber que en GranManzana nos preocupamos (¡y mucho!) por este tipo de casos y colaboramos activamente con todos los cuerpos policiales para facilitar la información requerida, tanto del anuncio como del autor de la estafa.</p>
                            <p>Te recomendamos que procedas a interponer la denuncia a las autoridades pertinentes lo antes posible y también te recordamos que GranManzana no interviene en ninguna transacción comercial entre comprador y vendedor, por lo que no tenemos ningún agente intermediario.</p>
                            <p>Si tienes alguna relacionada con este tema, cuenta con nosotros para aconsejarte.</p>

                          </div><!-- /.box-body -->
                        </div> 
      
                      </div><!-- /.box-body -->
                    </div>

                    <!-- Conecta con los interesados más rápido -->
                    <div class="box box-solid collapsed-box">
                      
                      <div class="box-header">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title">&nbsp; Conecta con los interesados más rápido</h3></button>
                      </div><!-- /.box-header -->
                      
                      <div class="box-body" style="display: none">
                        <p class="lead"> Conecta con los interesados más rápido </p>
                        
                        <!-- AYUDA 01-->
                        <div class="box box-default collapsed-box"> 
                          <div class="box-header with-border">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title text-light-blue">&nbsp; ¿Cómo puedo añadir un anuncio a mi lista de favoritos?</h3></button>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                            <p>Si has encontrado lo que buscabas pero tienes curiosidad por si todavía puedes encontrar algo mejor… ¡Añádelo a tu lista de favoritos! ¿Cómo? Pulsa en la opción “Guardar favorito” (icono con forma de estrella) que encontrarás abajo a la derecha de cualquier anuncio.</p> 
                            <p>Si tienes cuenta en GranManzana podrás consultar tu lista de anuncios favoritos en el apartado “Favoritos”.</p>
                            <p>¡No dejes pasar las buenas oportunidades que te ofrece GranManzana!</p>

                          </div><!-- /.box-body -->
                        </div>                     
      
                      </div><!-- /.box-body -->
                    </div>
    
                    <!-- Reglas de publicación -->
                    <div class="box box-solid collapsed-box">
                      
                      <div class="box-header">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title">&nbsp; Reglas de publicación</h3></button>
                      </div><!-- /.box-header -->
                      
                      <div class="box-body" style="display: none">
                        <p class="lead"> ¿tienes dudas de como publicar tus anuncios con nosotros? </p>
                        
                        <!-- AYUDA 01-->
                        <div class="box box-default collapsed-box"> 
                          <div class="box-header with-border">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title text-light-blue">&nbsp; Nuestras Reglas de Publicacion</h3></button>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                            <p>Como principio general, el anunciante es personalmente responsable por el contenido del anuncio. Port tanto GranManzana no tiene ninguna responsabilidad por el artículo anunciado o por el contenido del anuncio.</p>
                            <p>Si el anuncio se rechaza hay que modificar los aspectos que han originado el rechazo para adaptarlo a las reglas de publicación.</p>
                            <p>El portal se reserva el derecho de decidir cuándo un anuncio va contra las reglas y la moral de GranManzana.</p>
                            <h3>1. Reglas generales</h3>
                              <ul>
                                <li><b>1.1.- Cumplimiento con la legislación vigente:</b> los anuncios de GranManzana deben cumplir con la legislación vigente. No se publicarán, en ningún caso, anuncios que incluyan contenidos o propaganda de carácter racista, xenófobo, de apología del terrorismo o que atenten contra los derechos humanos o la dignidad de las personas. </li>
                                <li><b>1.2.- Cumplimiento de la normativa de publicación:</b> GranManzana se reserva el derecho, en caso necesario, de rechazar o modificar un anuncio para que este cumpla con las reglas de publicación.</li>
                                <li><b>1.3.- Ubicación de los anuncios:</b> sólo se permitirán anuncios de dentro del territorio español. Como norma general los anuncios tienen que estar insertados en la provincia donde se encuentra el producto o servicio.</li>
                                <li><b>1.4.- Idioma:</b> los anuncios deben estar escritos al menos en una de las lenguas oficiales o cooficiales del estado.</li>
                                <li><b>1.5.- Información del anuncio:</b> se debe describir el producto o servicio con claridad. No está permitido el uso de palabras clave innecesarias o títulos exagerados en forma y/o contenido. Las imágenes deben corresponder a lo que se anuncia sin marcas de agua de otros sites. Los datos de contacto no pueden figurar en los comentarios ya que hay campos habilitados para ello. Tampoco se permite la inclusión de URLs de terceros.</li>
                                <li><b>1.6.- Número de productos por anuncio:</b> GranManzana recomienda que se publique un artículo por anuncio. A pesar de ello, se permite la venta de diferentes productos dentro del mismo anuncio siempre y cuando los articules tengan relación entre ellos El desglose de precio en los comentarios NO será permitido a clientes profesionales. Vehículos e Inmuebles NO pueden ser anunciados en forma de lote; en este caso la relación siempre será de un anuncio, un producto. En la categoría trabajo también se permite una sola oferta por anuncio.</li>
                                <li><b>1.7.- No introducir anuncios duplicados:</b> no se permiten anuncios duplicados. Así, no se puede insertar el mismo anuncio/artículo más de vez al mismo tiempo.</li>
                                <li><b>1.8.- Derechos de autor:</b> todos los derechos del texto del anuncio y la imagen se ceden a GranManzana. No se permite enlazar a imágenes de otros anuncios o copiar el texto completo de otro anuncio. Las imágenes están protegidas por los derechos de autor.</li> 
                                <li><b>1.9.- Artículos no permitidos:</b> en ningún caso se permitirá la publicación de productos o servicios que vayan en contra de la legislación vigente. A efectos enunciativos y no limitativos se adjunta el listado de productos/servicios Prohibidos en el portal.</li>
                              </ul>
                             <h3>2. Reglas específicas</h3>
                             <ul>
                                <li>
                                  <p><b>2.1.- Animales:</b> GranManzana.es impone ciertas restricciones en anuncios de animales y se reserva el derecho a denegar la publicación en esta categoría cuando lo considere necesario:</p>
                                  <p>No se permiten animales depredadores ni especies protegidas. Tampoco se pueden anunciar animales que necesiten permisos especiales según la legislación vigente, a no ser que esté claramente especificado en el anuncio que el vendedor dispone de los consiguientes permisos y que todos los papeles están en regla.</p>
                                  <p>Los animales anunciados en GranManzana.es deben haber cumplido la edad de destete recomendada por veterinarios para cada especie. A estos efectos, los gatos anunciados deben ser mayores de seis semanas y los perros han de haber cumplido las ocho semanas. (Ver Normativa Autonómica para anuncios de Animales)</p>
                                  <p>Puede leer más sobre las leyes de protección de la Naturaleza en la web del Ministerio de Medio Ambiente (<a href="http://www.magrama.gob.es/es/" target="_blank">www.magrama.gob.es</a>)</p>
                                
                                </li>
                                <li>
                                  <p><b>2.2 Servicios profesionales no permitidos:</b> no se permitirá ningún tipo de servicio que conlleve cualquier práctica ilegal o que vaya contra el decoro de la página. Especialmente se prohíben servicios que impliquen la vulneración de las medidas de seguridad del producto, así como cualquier tipo de anuncio o servicio donde se ofrezca servicios sexuales, de relax o características similares.</p>
                                  <p>Se permitirán los servicios relacionados con la videncia y el tarot, siempre y cuando los mismos no incluyan servicios de magia negra, malos deseos, brujería, vudú o líneas eróticas encubiertas. Asimismo, no se permitirá anunciar los servicios de curanderos, hechiceros, esperanzadores, ni cualquier otro tipo de servicio o producto relacionado.</p>
                                </li>   
                                  <li><b>2.3.- Trabajo:</b> sólo permitirá anuncios de ofertas concretas de empleo convencional por cuenta ajena. A fin de evitar fraudes en este sentido, no se permitirán prácticas de dudosa legalidad fiscal tales como la oferta de empleo piramidal o cualquier que implique una inversión por parte del candidato.
                                </li>
                                <p>&nbsp;</p>
                                <li style="list-style: none">
                                  <p><b>Productos Prohibidos</b></p>
                                  <ul>
                                    <li>Medicamentos/Fármacos con prescripción médica</li>
                                    <li>Drogas (marihuana, semillas)</li>
                                    <li>Armas de fuego (excepto airsoft)</li>
                                    <li>Aves fringílidas (las mixtas están permitidas)</li>
                                    <li>Animales especies protegidas</li>
                                    <li>Restos de animales</li>
                                    <li>Inhibidor de radares</li>
                                    <li>Productos que se anuncien como falsificación</li>
                                    <li>Fotos menores</li>
                                    <li>Fotos desnudos</li>
                                    <li>Papeles de registro</li>
                                    <li>Productos de uso personal relacionados con el sexo</li>
                                    <li>Spray pimienta</li>
                                    <li>Bases de datos</li>
                                    <li>Insignias y uniformes militares/policía vigentes</li>
                                    <li>Puntos carnet de conducir</li>
                                    <li>Peleas de gallos</li>
                                    <li>Anuncios solidarios</li>
                                  </ul>
                                  <p>&nbsp;</p>
                                  <p><b>Servicios/Empleo</b></p>
                                  <ul>
                                    <li>Venta piramidal</li>
                                    <li>Masajes de contactos / relax</li>
                                    <li>Avales bancarios</li>
                                    <li>Apostador profesional</li>
                                    <li>Ofertas de trabajo sin contrato o trabajo no remunerado</li>
                                  </ul>
                                </li>

                                </li>
                                <li></li>
                                <li></li>
                             </ul>
                          </div><!-- /.box-body -->
                        </div>                     
      
                      </div><!-- /.box-body -->
                    </div>

                    <!-- Cláusula de Protección de Datos -->
                    <div class="box box-solid collapsed-box">
                      
                      <div class="box-header">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title">&nbsp; Cláusula de Protección de Datos</h3></button>
                      </div><!-- /.box-header -->
                      
                      <div class="box-body" style="display: none">
                        <p class="lead"> Cláusula informatíva para la recogida y cesión de datos de carácter personal</p>
                        
                        <!-- AYUDA 01-->
                        <div class="box box-default collapsed-box"> 
                          <div class="box-header with-border">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title text-light-blue">&nbsp; ¿Cómo puedo añadir un anuncio a mi lista de favoritos?</h3></button>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                            <p>A los efectos de lo dispuesto en la normativa vigente relativa a la protección de datos de carácter personal, el/los interviniente/s queda/n informado/s y expresamente consiente/n la incorporación de sus datos, incluida la dirección de correo, a los ficheros de datos de carácter personal de los que sea responsable "GRAN MANZANA" así como el tratamiento informatizado o no de los mismos con una finalidad comercial y publicitaria por "GRAN MANZANA" autorizando expresamente a ésta para publicar el anuncio en la WEB o en cualquiera de las publicaciones impresas del grupo "GRAN MANZANA".</p>
                            <p>"GRAN MANZANA" garantiza que todos los datos personales contenidos en el presente documento serán utilizados con la finalidad, en la forma y con las limitaciones y derechos que concede la Ley Orgánica 15/1999, de Protección de Datos de Carácter Personal. El presente consentimiento se otorga sin perjuicio de todos los derechos que le asisten en virtud de la norma antes citada, y especialmente de la posibilidad de ejercitar gratuitamente los derechos de oposición, acceso e información, rectificación, cancelación de sus datos y revocación de su autorización sin efectos retroactivos, que podrán ser ejercitados dirigiendo comunicación por escrito a la oficina principal de "GRAN MANZANA" sita en C/ Gil Cordero, 16, 1º, 10.001, de Cáceres.</p>
                          </div><!-- /.box-body -->
                        </div>                     
      
                      </div><!-- /.box-body -->
                    </div>

                    <!-- Condiciones Generales de Uso -->
                    <div class="box box-solid collapsed-box">
                      
                      <div class="box-header">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title">&nbsp; Condiciones Generales de Uso</h3></button>
                      </div><!-- /.box-header -->
                      
                      <div class="box-body" style="display: none">
                        <p class="lead"> El presente documento tiene por objeto establecer las Condiciones Generales de Uso de www.granmanzana.es. </p>
                        
                        <!-- AYUDA 01-->
                        <div class="box box-default collapsed-box"> 
                          <div class="box-header with-border">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title text-light-blue">&nbsp; Condiciones de Uso</h3></button>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                            <ol>
                               <li>
                                  <b>OBJETO :</b> 
                                  <p>"GRAN MANZANA" se reserva el derecho a modificar las presentes Condiciones Generales de Uso con el objeto de adecuarlas a la legislación vigente aplicable en cada momento, las novedades jurisprudenciales y las prácticas habituales de mercado.</p>
                                  <p>Las presentes Condiciones Generales de Uso no excluyen la posibilidad de que determinados Servicios de www.granmanzana.es, por sus características particulares, sean sometidos, además de a las Condiciones Generales de Uso, a sus propias condiciones particulares de uso (en adelante las Condiciones Particulares)</p>
                                  <p>La utilización por parte del Usuario de cualquiera de los Servicios de www.granmanzana.es supone y expresa su adhesión y aceptación expresa a todas las Condiciones Generales de Uso, así como a las Condiciones Particulares que, en su caso, sean de aplicación.</p>
                               </li>
                               <li>
                                  <b>CONDICIONES DE ACCESO Y UTILIZACIÓN: </b>
                                  <ul>
                                    <li>
                                      <b>Condición de Usuario</b>
                                      <p>La utilización de cualquier Servicio de www.granmanzana.es atribuye la Condición de Usuario del mismo.</p>
                                    </li>
                                    <li>
                                      <b>Necesidad de Registro</b>
                                      <p>Con carácter general para el acceso a www.granmanzana.es NO será necesario el Registro del Usuario de www.granmanzana.es. No obstante la utilización de determinados Servicios, como es la publicación de anuncios, está condicionada al Registro Previo del Usuario. Este registro se efectuará en la forma expresamente señalada en el propio Servicio.</p>
                                    </li>
                                    <li>
                                      <b>Gratuidad de los Servicios:</b>
                                      <p>Con carácter general los Servicios para particulares a través de www.granmanzana.es tendrán carácter gratuito. No obstante, la utilización de determinados Servicios destinados a profesionales y empresas está sujeta a contraprestación económica en la forma y términos específicamente determinados contractualmente.</p>
                                    </li>
                                    <li>
                                      <b>Uso de contenidos y servicios</b>
                                      <p>El Usuario reconoce y acepta que el uso de los contenidos y/o servicios ofrecidos por "GRAN MANZANA" será bajo su exclusivo riesgo y/o responsabilidad.</p>
                                      <p>El Usuario se compromete a utilizar la web y todo su contenido y Servicios conforme a lo establecido en la ley, la moral, el orden público y en las presentes Condiciones Generales de Uso, y en las Condiciones Particulares que, en su caso, le sean de aplicación. Asimismo, se compromete hacer un uso adecuado de los servicios y/o contenidos y a no emplearlos para realizar actividades ilícitas o constitutivas de delito, que atenten contra los derechos de terceros y/o que infrinjan la regulación sobre propiedad intelectual e industrial, o cualesquiera otras normas del ordenamiento jurídico aplicable.</p>
                                      <p>
                                        El Usuario se compromete a no trasmitir, introducir, difundir y poner a disposición de terceros, cualquier tipo de material e información (datos contenidos, mensajes, dibujos, archivos de sonido e imagen, fotografías, software, etc.) que sean contrarios a la ley, la moral, el orden público y las presentes Condiciones Generales de Uso y, en su caso, a las Condiciones Particulares que le sean de aplicación. A título enunciativo, y en ningún caso limitativo o excluyente, el Usuario se compromete a:
                                      </p>
                                      <ul>
                                        <li>No introducir o difundir contenidos o propaganda de carácter racista, xenófobo, pornográfico, de apología del terrorismo o que atenten contra los derechos humanos.</li>
                                        <li>No introducir o difundir en la red programas de datos (virus y software nocivo) susceptibles de provocar daños en los sistemas informáticos del proveedor de acceso, sus proveedores o terceros usuarios de la red Internet.</li>
                                        <li>No difundir, transmitir o poner a disposición de terceros cualquier tipo de información, elemento o contenido que atente contra los derechos fundamentales y las libertades públicas reconocidos constitucionalmente y en los tratados internacionales.</li>
                                        <li>No difundir, transmitir o poner a disposición de terceros cualquier tipo de información, elemento o contenido que constituya publicidad ilícita o desleal.</li>
                                        <li>No transmitir publicidad no solicitada o autorizada, material publicitario, "correo basura", "cartas en cadena", "estructuras piramidales", o cualquier otra forma de solicitación, excepto en aquellas áreas (tales como espacios comerciales) que hayan sido exclusivamente concebidas para ello.</li>
                                        <li>No introducir o difundir cualquier información y contenidos falsos, ambiguos o inexactos de forma que induzca a error a los receptores de la información.</li>
                                        <li>No suplantar a otros usuarios utilizando sus claves de registro a los distintos servicios y/o contenidos de los Portales.</li>
                                        <li>No difundir, transmitir o poner a disposición de terceros cualquier tipo de información, elemento o contenido que suponga una violación de los derechos de propiedad intelectual e industrial, patentes, marcas o copyright que correspondan a los titulares del Portal o a terceros</li>
                                        <li>No difundir, transmitir o poner a disposición de terceros cualquier tipo de información, elemento o contenido que suponga una violación del secreto de las comunicaciones y la legislación de datos de carácter personal.</li>
                                      </ul>
                                    </li>
                                  </ul>
                               </li>
                               <li>
                                 <b>PROPIEDAD INTELECTUAL E INDUSTRIAL</b>
                                 <p>Los contenidos, elementos e información a los que el usuario pueda acceder a través de www.granmanzana.es están sujetos a derechos de propiedad industrial e intelectual, patentes marcas, copyright de los titulares de los mismos. En consecuencia el acceso a éstos contenidos o elementos no otorga al Usuario el derecho de alteración, modificación, explotación, reproducción, distribución o comunicación pública o cualquier otro derecho que corresponda al titular del derecho afectado.</p>
                               </li>
                               <li>
                                  <b>EXCLUSIÓN DE GARANTÍAS. RESPONSABILIDAD.</b>
                                  <ul>
                                    <li>
                                      <b>Disponibilidad y Continuidad de los Servicios</b>
                                      <p>"GRAN MANZANA" NO garantiza la disponibilidad, acceso y continuidad del funcionamiento de www.granmanzana.es y de sus Servicios.</p>
                                      <p>"GRAN MANZANA" NO será responsable, con los límites establecidos en el Ordenamiento Jurídico vigente, de los daños y perjuicios causados al Usuario como consecuencia de la indisponibilidad, fallos de acceso y falta de continuidad de www.granmanzana.es y sus servicios.</p>
                                    </li>
                                    <li>
                                      <b>Contenidos y Servicios de "GRAN MANZANA"</b>
                                      <p>"GRAN MANZANA" responderá única y exclusivamente de los Servicios que preste por sí misma. Dicha responsabilidad quedará excluida en los casos en que concurran causas de fuerza mayor o en los supuestos en que la configuración de los equipos del Usuario no sea la adecuada para permitir el correcto uso de los servicios de Internet prestados por "GRAN MANZANA". En cualquier caso, la eventual responsabilidad de "GRAN MANZANA" frente al usuario por todos los conceptos quedará limitada como máximo al importe de las cantidades percibidas directamente del usuario por "GRAN MANZANA", con exclusión en todo caso de responsabilidad por daños indirectos o por lucro cesante.</p>
                                      
                                    </li>
                                    <li>
                                      <b>Contenidos y Servicios de Terceros</b>
                                      <p>"GRAN MANZANA" no garantiza la licitud, fiabilidad, utilidad, veracidad, exactitud, exhaustividad y actualidad de los contenidos, informaciones y Servicios de terceros en la web.</p>
                                      <p>"GRAN MANZANA" no controla con carácter previo y no garantiza la ausencia de virus y otros elementos en los Contenidos y servicios prestados por terceros a través de dicha web que puedan introducir alteraciones en el sistema informático, documentos electrónicos o ficheros de los usuarios.</p>
                                      <p>"GRAN MANZANA" no será responsable, ni indirectamente ni subsidiariamente, de los daños y perjuicios de cualquier naturaleza derivados de la utilización y contratación de los Contenidos y de los Servicios de terceros en el Portal así como de la falta de licitud, fiabilidad, utilidad, veracidad, exactitud, exhaustividad y actualidad de los mismos. Con carácter enunciativo, y en ningún caso limitativo, no será responsable por los daños y perjuicios de cualquier naturaleza derivados de: </p>
                                        <ul>
                                          <li> 1) la infracción de los derechos propiedad intelectual e industrial y el cumplimiento defectuoso o incumplimiento de los compromisos contractuales adquiridos por terceros; </li>
                                          <li> 2) la realización de actos de competencia desleal y publicidad ilícita; </li>
                                          <li> 3) la inadecuación y defraudación de las expectativas de los Servicios y Contenidos de los terceros;</li>
                                          <li> 4) los vicios y defectos de toda clase de los Servicios y contenidos de terceros prestados a través de www.granmanzana.es </li>.
                                        </ul>  
                                          <p>La exoneración de responsabilidad señalada en los párrafos anteriores será de aplicación en el caso de que "GRAN MANZANA" no tenga conocimiento efectivo de que la actividad o la información almacenada es lícita o de que lesiona bienes o derechos de un tercero susceptibles de indemnización, o si la tuviesen actúen con diligencia para retirar los datos y contenidos o hacer imposible el acceso a ellos.</p>
                                    </li>
                                    <li>
                                      <b>Conducta de los Usuarios</b>
                                      <p>"GRAN MAZANA" no garantiza que los Usuarios utilicen los contenidos y/o servicios del mismo de conformidad con la ley, la moral, el orden público, ni las presentes Condiciones Generales y, en su caso, las condiciones Particulares que resulten de aplicación Asimismo, no garantiza la veracidad y exactitud, exahustividad y/o autenticidad de los datos proporcionados por los Usuarios.</p>
                                      <p>"GRAN MANZANA" no será responsable, indirecta ni de los daños y perjuicios de cualquier naturaleza derivados de la utilización de los Servicios y Contenidos de los Portales por parte de los Usuarios o que puedan derivarse de la falta de veracidad, exactitud y/o autenticidad de los datos o informaciones proporcionadas por los Usuarios, o de la suplantación de la identidad de un tercero efectuada por un Usuario en cualquier clase de actuación a través de "GRAN MANZANA". A título enunciativo, pero no limitativo, "GRAN MANZANA" no será responsable indirecta o subsidiariamente de:</p>
                                      <ul>
                                        <li>Los contenidos, informaciones, opiniones y manifestaciones de cualquier Usuario o de terceras personas o entidades que se comuniquen o exhiban a través de www.granmanzana.es</li>
                                        <li>Los daños y perjuicios causados a terceros derivados de la utilización por parte del Usuario de los servicios y contenidos de www.granmanzana.es</li>
                                        <li>Los daños y perjuicios causados por la falta de veracidad, exactitud o incorrección de la identidad de los usuarios y de toda información que éstos proporcionen o hagan accesible a otros usuarios</li>
                                        <li>de los daños y perjuicios derivados de infracciones de cualquier usuario que afecten a los derechos de otro usuario, o de terceros, incluyendo los derechos de copyright, marca, patentes, información confidencial y cualquier otro derecho de propiedad intelectual e industrial</li>
                                      </ul>
                                    </li>
                                  </ul>
                               </li>
                               <li>
                                  <b>CONTRATACIÓN CON TERCEROS A TRAVÉS de www.granmanzana.es</b>
                                  <p>El Usuario reconoce y acepta que cualquier relación contractual o extracontractual que, en su caso, formalice con los anunciantes o terceras personas contactadas a través de www.granmanzana.es , así como su participación en concursos, promociones, compraventa de bienes o servicios, se entienden realizados única y exclusivamente entre el Usuario y el anunciante y/o tercera persona. En consecuencia, el Usuario acepta que "GRAN MANZANA" no tiene ningún tipo de responsabilidad sobre los daños o perjuicios de cualquier naturaleza ocasionados con motivo de sus negociaciones, conversaciones y/o relaciones contractuales o extracontractuales con los anunciantes o terceras personas físicas o jurídicas contactadas a través de www.granmanzana.es.</p>
                               </li>
                               <li>
                                  <b>DISPOSITIVOS TÉCNICOS DE ENLACE</b>
                                  <p>El Portal www.granmanzana.es pone a disposición de los Usuarios dispositivos técnicos de enlace y herramientas de búsqueda que permiten a los Usuarios el acceso a websites titularidad de otras entidades (enlaces).</p>
                                  <p>El Usuario reconoce y acepta que la utilización de los Servicios y contenidos de las websites enlazadas será bajo su exclusivo riesgo y responsabilidad y exonera a "GRAN MANZANA" de cualquier responsabilidad sobre disponibilidad técnica de las websites enlazadas, la calidad, fiabilidad exactitud y/o veracidad de los servicios, informaciones, elementos y/o contenidos a los que el Usuario pueda acceder en las mismas y en los directorios de búsqueda incluidos en el Portal.</p>
                                  <p>"GRAN MANZANA" no será responsable indirecta ni subsidiariamente de los daños y perjuicios de cualquier naturaleza derivados de: </p>
                                    <ul>
                                      <li>a) el funcionamiento, indisponibilidad, inaccesibilidad y la ausencia de continuidad de las websites enlazadas y/o los directorios de búsqueda disponibles; </li>
                                      <li>b) la falta de mantenimiento y actualización de los contenidos y servicios contenidos en las web sites enlazadas;</li>
                                      <li>c) la falta de calidad, inexactitud, ilicitud, inutilidad de los contenidos y servicios de las web sites enlazadas.</li>
                                    </ul>
                                  </p>
                                  <p>La exoneración de responsabilidad señalada en los párrafos anteriores será de aplicación en el caso de que "GRAN MANZANA" no tenga conocimiento efectivo de que la actividad o la información a la que remite es lícita o de que lesiona bienes o derechos de un tercero susceptibles de indemnización o, si la tuviese, actúe con diligencia para retirar los datos y contenidos o hacer imposible el acceso a ellos.</p>
                               </li>
                               <li>
                                  <b>MODIFICACIONES Y EXCLUSIONES</b>
                                  <p>"GRAN MANZANA" se reserva el derecho a efectuar las modificaciones que estime oportunas, pudiendo modificar, suprimir e incluir, unilateralmente y sin previo aviso, nuevos contenidos y/o servicios, así como la forma en que éstos aparezcan presentados y localizados.</p>
                                  <p>"GRAN MANZANA" se reserva el derecho a denegar o retirar el acceso al portal y/o los servicios ofrecidos, sin necesidad de preaviso a instancia propia o de un tercero, a aquellos usuarios que incumplan las presentes Condiciones Generales de Uso y/o las condiciones Particulares que, en su caso, resulten de aplicación.</p>
                                  
                               </li>
                               <li>
                                  <b>MENORES DE EDAD</b>
                                  <p>Con carácter general, para hacer uso de los servicios, los menores de edad deben haber obtenido previamente la autorización de sus padres, tutores o representantes legales, quienes serán responsables de todos los actos realizados por los menores a su cargo. En aquellos Servicios en los que expresamente se señale, el acceso quedará restringido única y exclusivamente a mayores de 18 años.</p>

                              </li>
                               <li>
                                  <b>DURACIÓN Y TERMINACIÓN</b>
                                  <p>
                                    La prestación de los servicios y/o contenidos de www.granmanzana.es tiene una duración indefinida. Sin perjuicio de lo anterior, "GRAN MANZANA" está facultada para dar por terminada, suspender o interrumpir unilateralmente, en cualquier momento y sin necesidad de preaviso, la prestación del servicio, sin perjuicio de lo que se hubiera dispuesto al respecto en las correspondientes condiciones particulares.
                                  </p>
                               </li>
                               <li>
                                  <b>LEY Y JURISDICCIÓN</b>
                                  <p>Todas las cuestiones relativas al Portal se rigen por las Leyes del Reino de España y se someten a la jurisdicción de los Juzgados y Tribunales españoles competentes.</p>
                               </li>
                            </ol>
                          </div><!-- /.box-body -->
                        </div>                     
                      </div><!-- /.box-body -->
                    </div>

                    <!-- Consejos para la Publicación de Anuncios -->
                    <div class="box box-solid collapsed-box">
                      
                      <div class="box-header">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title">&nbsp; Consejos para la Publicación de Anuncios</h3></button>
                      </div><!-- /.box-header -->
                      
                      <div class="box-body" style="display: none">
                        <p class="lead"> - </p>
                        
                        <!-- AYUDA 01-->
                        <div class="box box-default collapsed-box"> 
                          <div class="box-header with-border">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i><h3 class="box-title text-light-blue">&nbsp; Consejos para la Publicación de Anuncios</h3></button>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                             <h3>EL TÍTULO.</h3>
                                <p>El Título es lo más importante. Debe contener palabras que una persona buscaría para intentar encontrar lo que se ofrece. Además debe ser tan atractivo que invite a leer el resto del anuncio. Las visitas a un anuncio no solo llegan desde granmanzana, buena parte lo hacen desde Google y el título es el factor más importante para aparecer primero en una búsqueda.</p> 
                             <h3>LA DESCRIPCIóN.</h3>
                                <p>El texto debe contener vocabulario variado sobre la temática del anuncio. Cuantas más palabras tenga más facilidad para ser encontrado por alguna combinación de términos tanto en el buscador de granmanzana como en Google.</p>
                             <h3>ENLACES A TU ANUNCIO.</h3>
                                <p>Para que un anuncio sea leído por más usuarios puedes enlazarlo desde foros, blogs, páginas personales,... No solo se consigue tener más audiencia sino que Google da mejores posiciones a anuncios que están enlazados desde otras páginas.</p>
                             <h3>NO REPETIR ANUNCIOS.</h3>
                                <p>Es muy importante no repetir el texto de un anuncio por varias razones: Google considera spam la repetición de contenidos y hará que no aparezcan bien posicionados en las búsquedas. Por otro lado, en granmanzana no se permite la repetición de anuncios y si se detectan pueden ser borrados y bloqueada la cuenta. Y finalmente, los usuarios desconfían de anuncios repetidos porque dan mala imagen al utilizar métodos parecidos a los estafadores. Mejor calidad que cantidad.</p>
                             <h3>LAS IMÁGENES.</h3>
                                <p>Es fundamental poner imágenes siempre que éstas aporten información de interés para los usuarios. Se puede decir que un coche está en perfecto estado pero si no se ve, no se cree.</p>
                             <h3>EL PRECIO.</h3>
                                <p>Un usuario interesado en un artículo no se molestará en ir llamando a los anuncios que no tienen precio solo para saberlo.</p>
                             <h3>LOS DATOS DE CONTACTO.</h3>
                                <p>Es preferible dejar tanto email como teléfono porque hay usuarios que o solo llaman o solo mandan emails. El email es además necesario para poder gestionar el anuncio. El email no será mostrado a los usuarios para evitar el spam.</p>
                             <h3>LA RENOVACIÓN DE ANUNCIOS.</h3>
                                <p>Es recomendable renovar los anuncios porque volverán a aparecer al principio del listado.</p>     
                          </div><!-- /.box-body -->
                        </div>                     
      
                      </div><!-- /.box-body -->
                    </div>

                  </div>
                </div>
            </section>

        </div>


        <?php require_once('../../footer.php'); ?>

    </div> <!-- end wrapper  -->

      <?php require_once('../../script-footer.php'); ?>






    <!-- jQuery 2.1.4 -->
    <script src="http://pruebas.granmanzana.es/areapersonal/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="http://pruebas.granmanzana.es/areapersonal/bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://pruebas.granmanzana.es/areapersonal/plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="http://pruebas.granmanzana.es/areapersonal/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="http://pruebas.granmanzana.es/areapersonal/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="http://pruebas.granmanzana.es/areapersonal/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="http://pruebas.granmanzana.es/areapersonal/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="http://pruebas.granmanzana.es/areapersonal/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="http://pruebas.granmanzana.es/areapersonal/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="http://pruebas.granmanzana.es/areapersonal/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="http://pruebas.granmanzana.es/areapersonal/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="http://pruebas.granmanzana.es/areapersonal/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="http://pruebas.granmanzana.es/areapersonal/dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="http://pruebas.granmanzana.es/areapersonal/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="http://pruebas.granmanzana.es/areapersonal/dist/js/demo.js"></script>
  </body>
  </html>