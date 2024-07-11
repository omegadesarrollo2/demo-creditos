<style type="text/css">
input[type='checkbox'] {
    -webkit-appearance: none;
    width: 30px;
    height: 30px;
    background: white;
    border-radius: 5px;
    border: 2px solid #555;
    margin-bottom: -9px;
}

input[type='checkbox']:checked {
    background: #abd;
    background: url('/corte/ok.png');
    background-size: cover;
}
</style>

<div class="container">
    <div class="row">
        <form id="form1" name="form1" method="post" action="/page/sistema/guardarpaso/" class="col-12">
            <div class="col-12">
                <?php if ($_GET['consulta']==""): ?>
                <div class="row">
                    <div class="col-6 text-left">
                        <h3 class="titulo">Solicitud WEB<?php echo $this->numero; ?></h3>
                    </div>
                    <div class="col-6 text-right">
                        <h3 class="paso">Paso 2/3</h3>
                    </div>
                    <div align="left" class="col-12">
                        <div class="separador_login2"></div>
                    </div>
                </div>
                <?php endif ?>
            </div>
            <div class="col-12">
                <div class="row form-group">

                    <div class="col-md-12 col-lg-12">




                        <div align="center" class="col-lg-12">

                            <br>
                            <div class="titulo-seccion"><strong>Autorización de descuento</strong></div>

                            <div align="justify" class="col-12 caja-formulario">
                                <br>
                                <p> En cumplimiento de los artículos 55 y 56 de la Ley 1481 de 1989 y los artículos 149
                                    y 150 del código sustantivo de trabajo yo (nosotros)
                                    <strong><?php echo $this->nombre; ?><?php if($this->solicitud->tipo_garantia=="2"){ echo ", deudor(es) mayor (es) de
                                    edad ".$this->codeudor->nombres; } ?></strong>
                                    ,relacionado (s), identificado (s) y actuando en las condiciones como aparece
                                    en el encabezado de esta autorización de descuento, manifiesto (amos) que autorizo
                                    (amos) expresa e irrevocablemente al pagador de la empresa donde laboro (amos)
                                    actualmente o de la empresa donde llegare (mos) a laborar o prestar mis
                                    (nuestros)servicios, para que de mi (nuestros) salario (s), pensión (es),
                                    vacaciones, prestaciones, indemnizaciones, liquidaciones o cualquier otro emolumento
                                    que me (nos) corresponda por la prestación de mis (nuestros) servicios, así como a
                                    la EPS o ARL que cancele el citado el ingreso, descuente y cancele a favor del Fondo
                                    de Empleados FESDIS en forma indivisible, incondicional e ininterrumpida y hasta
                                    completar el monto total adeudado en capital e intereses. De igual forma, en caso de
                                    retiro de la empresa que determina el vínculo de asociación o cualquier otra empresa
                                    en la que llegare (mos) a prestar mis (nuestros) servicios antes de la cancelación
                                    total de la obligación, autorizo (amos) de manera voluntaria, expresa e
                                    irrevocablemente al pagador de la respectiva empresa, al fondo de cesantías al que
                                    esté (mos) vinculado (s) o la entidad correspondiente, para que descuente y retenga
                                    sin límite de cuantía sobre cualquier suma que deba pagárseme (nos) por concepto de
                                    salarios, honorarios, vacaciones, prestaciones sociales, bonificaciones especiales,
                                    ocasionales o permanentes, bonos y cualquier otro pago que perciba por otro concepto
                                    en virtud a la relación contractual y no estipulado literalmente, la cantidad que
                                    sea necesaria para cubrir el saldo insoluto de la (s) obligación(es) contraídas con
                                    el Fondo de Empleados FESDIS. En caso de respaldar crédito de vivienda bajo la línea
                                    específica las sumas de los descuentos aquí autorizados se deben entender como abono
                                    o prepago parcial disminuyendo el valor del plazo.</p>



                                <p> estos efectos declaro (amos) suficiente la certificación del Fondo de Empleados
                                    FESDIS sobre el saldo debido a su favor. Las autorizaciones aquí plasmadas estarán
                                    vigentes mientras exista cualquier obligación nuestra a favor del Fondo de Empleados
                                    FESDIS.</p>
                                <strong>Autorizo el descuento:</strong> <input name="autorizo" type="checkbox" value="1"
                                    <?php if($_GET['mod']=="detalle_solicitud"){ echo 'checked="checked" '; } ?>
                                    required />
                            </div>

                            <br />
                            <!-- <div class="titulo-seccion"><strong>Tratamiento de datos</strong></div>

                            <div align="justify" class="caja-formulario col-12">
                                <br>
                                <p>También declaro que he sido informado y que conozco los parámetros definidos en la <a
                                        href="http://www.FESDIS.com/page/conocenos/detalle/73/politica-de-proteccion-de-datos"
                                        target="_blank">política de tratamiento de datos personales</a>, la cual se
                                    encuentra publicado en la página web de FESDIS, <a href="https://www.FESDIS.com"
                                        target="_blank">www.FESDIS.com</a>. por lo anterior, autorizo el tratamiento de
                                    mis datos personales y el de mi núcleo básico familiar.</p>

                                <div align="left"><strong>Aceptación:</strong> <input name="autorizo2" type="checkbox"
                                        value="1"
                                        <?php if($_GET['mod']=="detalle_solicitud"){ echo 'checked="checked" '; } ?>
                                        required /></div>
                            </div> -->
                            <div class="titulo-seccion"><strong>Autorización para consultar y reportar centrales de
                                    riesgo</strong></div>

                            <div align="justify" class="caja-formulario col-12">
                                <br>
                                <p>Autorizo de manera permanente e irrevocable al Fondo de Empleados FESDIS, para que
                                    exclusivamente con fines estadísticos, de control, supervisión y de información,
                                    reporte el nacimiento, modificación, extinción de obligaciones contraídas con
                                    anterioridad o que se lleguen a contraer fruto de cualquier contrato, acto o negocio
                                    jurídico. La presente autorización comprende además el reporte de información a
                                    bancos de datos y/o centrales de riesgo referentes a la existencia de deudas
                                    vencidas y sin cancelar y/o utilización indebida de los servicios financieros. No
                                    solo faculto al Fondo de Empleados FESDIS a reportar, procesar y divulgar a bancos
                                    de datos y/o centrales de riesgo encargados del manejo de los datos comerciales,
                                    personales y económicos, sino también a solicitar información sobre mi relación
                                    comercial con el sistema financiero y comercial y que los datos sobre mi reportados,
                                    sean procesados para el logro del propósito de las centrales y sean circularizados
                                    con fines comerciales.</p>

                                <div align="left"><strong>Aceptación:</strong> <input name="autorizo2" type="checkbox"
                                        value="1"
                                        <?php if($_GET['mod']=="detalle_solicitud"){ echo 'checked="checked" '; } ?>
                                        required /></div>
                            </div>

                            <br />


                            <div class="titulo-seccion"><strong>Autorizacion de origen de ingresos</strong></div>

                            <div align="justify" class="caja-formulario col-12">
                                <br>
                                <p>Declaro que los recursos o bienes descritos en el formato de vinculación y/o
                                    actualización de datos del Fondo de Empleados FESDIS, proviene de actividades
                                    lícitas, de conformidad con la normatividad colombiana. 2. Que no admitiré que
                                    terceros efectúen depósitos en mis cuentas de fondos, provenientes de las
                                    actividades ilícitas contempladas en el código penal colombiano o en cualquier otra
                                    norma que lo adicione, ni efectuaré transacciones destinadas a tales actividades o a
                                    favor de personas relacionadas con las mismas. 3. Que todas las actividades o
                                    ingresos que se perciben provienen de actividades lícitas. 4. Que no me encuentro en
                                    ninguna lista de reporte internacional o bloqueado por actividades de narcotráfico,
                                    lavado de activos o delitos asociados al turismo sexual con menores de edad. 5. Que
                                    en mi contra no se adelanta ningún proceso en instancias nacionales o
                                    internacionales por ninguno de los aspectos anteriores. 6. Autorizo a resolver
                                    cualquier acuerdo, beneficio, negocio o contrato celebrado con el Fondo de Empleados
                                    FESDIS o cualquiera de sus capítulos, en caso de infracción de cualquier de los
                                    numerales contenidos en este documento, eximiendo a la entidad de toda
                                    responsabilidad que se derive por información errónea, falsa o inexacta que yo
                                    hubiere proporcionado en este documento o violación del mismo.</p>

                                <div align="left"><strong>Aceptación:</strong> <input name="autorizo3" type="checkbox"
                                        value="1"
                                        <?php if($_GET['mod']=="detalle_solicitud"){ echo 'checked="checked" '; } ?>
                                        required /></div>
                            </div>
                            <div class="titulo-seccion"><strong>Otras autorizaciones</strong></div>

                            <div align="justify" class="caja-formulario col-12">
                                <br>
                                <p>Autorizo al Fondo de Empleados FESDIS, a grabar en cualquier medio de almacenamiento
                                    de información, las conversaciones telefónicas de la negociación, acuerdo y
                                    ejecución de operaciones realizadas por mí y los empleados de FESDIS, de acuerdo al
                                    decreto 2555 de 2010, de la Superintendencia Financiera de Colombia, se entiende que
                                    la información obtenida es de carácter reservado, pudiendo ser reservada por el
                                    Fondo de Empleados FESDIS con fines probatorios, absteniéndose de realizar
                                    divulgaciones ilícitas o fraudulentas de las mismas, o darle a conocer a terceros
                                    con fines diferentes a los previstos y expresos con el consentimiento de asociado o
                                    cliente. Autorizo al Fondo de Empleados FESDIS para que se me notifique y se me
                                    realice el cobro de mi obligación por otros medios tales como mensajes de texto,
                                    carta o correo electrónico.</p>

                                <div align="left"><strong>Aceptación:</strong> <input name="autorizo4" type="checkbox"
                                        value="1"
                                        <?php if($_GET['mod']=="detalle_solicitud"){ echo 'checked="checked" '; } ?>
                                        required /></div>
                            </div>
                            <br />

                        </div>


                    </div>

                </div>
            </div>




            <?php if($_GET['mod']!="detalle_solicitud"){ ?>
            <div align="center"><input name="Anterior" type="button" value="Anterior" class="btn btn-azul d-none"
                    onclick="window.location='/page/sistema/paso5/?id=<?php echo $this->id; ?>';" /> <input
                    name="Enviar" type="submit" value="Siguiente" class="btn btn-verde d-inline-block" /></div><br>
            <?php }?>

            <input name="paso" type="hidden" value="6" />
            <input name="id" type="hidden" value="<?php echo $this->id; ?>" />
        </form>
    </div>