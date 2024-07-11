<style>
.border-right {
    border-right: 1px solid #3D3D3D;
}

.border-left {
    border-left: 1px solid #3D3D3D;
}

.border-left2 {
    border-left: 2px solid #3D3D3D;
}

.border-bottom {
    border-bottom: 1px solid #3D3D3D;
}
.border-bottom2 {
    border-bottom: 1px solid #3D3D3D;
}
.border-top {
    border-top: 1px solid #3D3D3D;
}

.border-top2 {
    border-top: 2px solid #3D3D3D;
}

.fondo-azul {
    background-color: #bbceea
}
.lista-pdf{

}
</style>

<div><strong>ACREEDOR: FONDO DE EMPLEADOS DE LA SECRETARÍA DISTRITAL DE INTEGRACIÓN SOCIAL “FESDIS”</strong><br><strong>PAGARÉ Nº: <?php echo $this->solicitud->pagare?></strong><br><strong>VENCIMIENTO FINAL: (año-mes-día)</strong> _______________
</div>
<div><strong>Yo (Nosotros):</strong>
</div>
<br>
<table class="border-top2 border-bottom">
    <thead>
        <tr class="fondo-azul ">
            <th align="center" class="border-left border-right border-bottom2">Nombre de deudores</th>
            <th align="center" class="border-right border-bottom2">Tipo de identificación</th>
            <th align="center" class="border-right border-bottom2">Número de identificación</th>
            <th align="center" class="border-right border-bottom2">Ciudad de expedición</th>
            <th align="center" class="border-right border-bottom2">Calidad en que firma</th>
        </tr>
    </thead>
    <tr style="background-color:#fff" class="border-top border-bottom">
    <?php $nombre1=$this->solicitud->nombres." ".$this->solicitud->nombres2." ".$this->solicitud->apellido1." ".$this->solicitud->apellido2;
    $nombre1=str_replace("  ", " ",$nombre1);
    ?>
    <td align="center" class="border-left border-right border-bottom2"><?php echo $nombre1?></td>
    <td align="center" class=" border-right border-bottom2"><?php echo $this->solicitud->tipo_documento?></td>
    <td align="center" class="border-right border-bottom2"><?php echo $this->solicitud->documento?></td>
    <td align="center" class="border-right border-bottom2"><?php echo $this->ciudades[$this->solicitud->ciudad_documento]?></td>
    <td align="center" class="border-right border-bottom2">OTORGANTE</td>
    </tr>
    <?php foreach ($this->codeudores as $key => $value) {?>
    <tr style="background-color:#fff" class="border-top2">
    <?php $nombre=$value->nombres." ".$value->nombres2." ".$value->apellido1." ".$value->apellido2;
    $nombre=str_replace("  ", " ",$nombre);
    ?>
    <td align="center" class="border-left border-right border-bottom2"><?php echo $nombre?></td>
    <td align="center" class=" border-right border-bottom2"><?php echo $value->tipo_documento?></td>
    <td align="center" class="border-right border-bottom2"><?php echo $value->cedula?></td>
    <td align="center" class="border-right border-bottom2"><?php echo $this->ciudades[$value->ciudad_documento]?></td>
    <td align="center" class="border-right border-bottom2">CODEUDOR</td>
    </tr>
    <?php } ?>
</table>
<br><br>
<div style="text-align:justify">Mayor (es) de edad, identificado (s) como aparece al pie de mí (nuestra) correspondiente firma, obrando en nombre
    propio declaro (amos): <strong>PRIMERO</strong>: Que
    por virtud del presente título valor, pagaré (emos) solidaria, indivisible e incondicionalmente a la orden del FONDO
    DE EMPLEADOS DE LA SECRETARÍA
    DISTRITAL DE INTEGRACIÓN SOCIAL “FESDIS”, a quien represente sus derechos o a cualquier otro tenedor legítimo del
    presente título valor, en
    sus oficinas de Bogotá o en el lugar que este señale, la suma de _______________ (_______________) moneda legal
    colombiana, que de dicha
    entidad he (mos) recibido en calidad de mutuo comercial con intereses. <strong>SEGUNDO. Amortización:</strong> Me
    (Nos) obligo (amos) a pagar la suma recibida en
    _______________ (_______________) cuotas mensuales, por un valor de _______________ ($_______________) cada una en
    moneda legal colombiana,
    la primera la pagaré (emos) el día (año-mes-día) _______________ y así sucesivamente y sin interrupción cada mes en
    el día señalado anteriormente y
    hasta completar el valor total del saldo adeudado. <strong>TERCERO. Intereses</strong>: Que sobre la suma debida
    reconoceré (emos), intereses vencidos equivalentes
    al _______________ por ciento efectivo anual (_______________% E.A.) sobre el saldo del crédito. <strong>CUARTO.
        Interés de mora:</strong> En caso de mora pagaré
    (emos) intereses moratorios a la tasa máxima legal vigente autorizado por la autoridad competente y certificado por
    la Superintendencia Financiera o
    la Entidad que rija al momento de verificarse la mora _______________ % E.A). <strong>QUINTO. Vencimiento
        anticipado:</strong> Autorizo (amos) al FONDO DE
    EMPLEADOS DE LA SECRETARÍA DISTRITAL DE INTEGRACIÓN SOCIAL “FESDIS”, o a cualquier otro tenedor legítimo del
    presente título valor, para
    extinguir el plazo o plazos que se estipulen para el pago de la totalidad del saldo insoluto, más los intereses y
    los gastos de cobranza, incluyendo honorarios
    del abogado, si ocurriere uno cualquiera de los siguientes eventos sin dar lugar a requerimientos previos, a los
    cuales renunciamos expresamente: a) Si
    hubiere mora en el pago de una o más cuotas de capital o de intereses del préstamo otorgado. b) Por la pérdida de la
    calidad de asociado del FONDO
    DE EMPLEADOS DE LA SECRETARÍA DISTRITAL DE INTEGRACIÓN SOCIAL “FESDIS” .c) En caso que sea (mos) demandado (s) o me
    (nos) sean
    embargados bienes por personas distintas al FONDO DE EMPLEADOS DE LA SECRETARÍA DISTRITAL DE INTEGRACIÓN SOCIAL
    “FESDIS”. d)
    Cuando con respecto al deudor principal se presente alguna (s) de las causales previstas para la extinción del
    plazo, ella operará de forma automática
    respecto de todas las obligaciones que tenga vigente el deudor principal. e) Por desmejoramiento de las garantías
    constituidas o persecución judicial de
    las mismas, f) Por el sometimiento del deudor principal o de los deudores solidarios al régimen de insolvencia o de
    liquidación patrimonial, g) Porque dentro
    del proceso de insolvencia no se haya conservado la prelación de las obligaciones contraídas con el FONDO DE
    EMPLEADOS DE LA SECRETARÍA
    DISTRITAL DE INTEGRACIÓN SOCIAL “FESDIS”, h) Por la muerte del deudor principal o de los deudores solidarios.
    <strong>SEXTO</strong>. Los deudores en virtud a
    la solidaridad que asumen mediante este pagaré aceptan expresamente, que cuando respecto al deudor principal, señor
    (a) YEIMI ROJAS DUQUE exista
    alguna causal de exigibilidad anticipada del plazo de la deuda que ella contrae, dicha (s) causal (es) operará en
    forma automática respecto de los deudores
    solidarios. En consecuencia no podrán oponerse al cobro que del pagaré haga el ACREEDOR, cuando se verifique alguna
    causal de exigibilidad anticipada.
    <strong>SÉPTIMO. Autorización de Descuentos:</strong> Los obligados en el presente título autorizamos expresa e
    irrevocablemente al pagador de la empresa donde nos
    encontremos vinculados prestando nuestros servicios, o a la entidad que realice el pago de nuestra pensión, licencia
    o subsidio por incapacidad; para que
    descuente de cualquier cantidad que deba pagarnos y a favor del FONDO DE EMPLEADOS DE LA SECRETARÍA DISTRITAL DE
    INTEGRACIÓN SOCIAL
    “FESDIS”, o quien represente sus derechos, la suma representada en el presente título valor, hasta que se cubra el
    valor total de los créditos adquiridos
    a satisfacción. De igual forma, en caso de que exista retiro de la empresa en la cual estamos prestando nuestros
    servicios o cualquier otra empresa en
    la que llegaremos a prestarlos antes de la cancelación total de la obligación, autorizamos al pagador de la
    respectiva Empresa, al Fondo de Cesantías
    al que estemos vinculados o la entidad correspondiente, para que descuente y retenga sin límite de cuantía sobre
    cualquier suma que deba pagársenos
    por concepto de salarios, honorarios, vacaciones, prestaciones sociales, bonificaciones especiales, ocasionales o
    permanentes, bonos y cualquier otro
    pago que perciba por otro concepto en virtud a la relación contractual y no estipulado literalmente, la cantidad que
    sea necesaria para cubrir el saldo
    insoluto de la (s) obligación (es) contraídas con el FONDO DE EMPLEADOS DE LA SECRETARÍA DISTRITAL DE INTEGRACIÓN
    SOCIAL “FESDIS”. Las
    autorizaciones aquí plasmadas estarán vigentes mientras exista cualquier obligación nuestra a favor del FONDO DE
    EMPLEADOS DE LA SECRETARÍA
    DISTRITAL DE INTEGRACIÓN SOCIAL “FESDIS”. <strong>OCTAVO. Cesión o endoso:</strong> Aceptamos cualquier cesión o
    endoso que de este título valor realice
    al FONDO DE EMPLEADOS DE LA SECRETARÍA DISTRITAL DE INTEGRACIÓN SOCIAL “FESDIS” y reconocemos al tenedor en
    cualquier proceso
    judicial. <strong>NOVENO. Costos:</strong> Son a cargo de los deudores los gastos y derechos fiscales que se
    ocasionen por el otorgamiento de este pagaré; igualmente
    en este caso de cobro judicial o extrajudicial serán a su cargo las costas y gastos de cobranza.
    <strong>DÉCIMO</strong>: Dejamos expresa que “FESDIS” podrá hacer
    uso de la cláusula quinta, ante la simple ocurrencia de las causales allí mencionadas sin necesidad de
    requerimiento, comunicación o trámite adicional,
    en ningún caso nos acogeremos a la ley de insolvencia económica y en el evento de realizarlo automáticamente sin
    ningún proceso o comunicación, la
    deuda se trasladará a los deudores solidarios o garantías reales existentes; así mismo autorizamos y reconocemos que
    los aportes sociales y los ahorros permanentes son garantía del crédito, de conformidad con el artículo 16 del
    Decreto Ley 1481 de 1989. <strong>UNDÉCIMO:</strong> Autorizamos a “FESDIS” o a quien
represente sus derechos u ostente en el futuro la calidad de acreedor, a consultar, solicitar, suministrar, reportar, procesar y divulgar toda la información
que se refiera a nuestro comportamiento crediticio, financiero, comercial de servicios y de terceros de información financiera (Ley 1581 de 2012 y Decreto
Reglamentario 1377 de 2013). En constancia se firma en la ciudad de _______________ el día (año-mes-día) 2020-11-26.
</div><br pagebreak="true" /> 
<div>
<strong>DEUDOR(ES);</strong><br><br><br><br><br><br><br><br><br>
</div>
<table width="60%" class="border-top"> 
<tr>
<td>Nombre:</td>
<td align="left"><?php echo $nombre1?></td>
</tr>
<tr>
<td>Tipo de identificación:</td>
<td align="left"><?php echo $this->solicitud->tipo_documento?></td>
</tr>
<tr>
<td>Número de identificación:</td>
<td align="left"><?php echo $this->solicitud->documento?></td>
</tr>
<tr>
<td>Ciudad de domicilio: </td>
<td align="left"><?php echo $this->ciudades[$value->ciudad_residencia]?></td>
</tr>
<tr>
<td>Dirección:</td>
<td align="left"><?php echo $this->solicitud->direccion_residencia?></td>
</tr>
<tr>
<td>Teléfono:</td>
<td align="left"><?php echo $this->solicitud->telefono?></td>
</tr>
</table>
<br><br><br>
<?php if(count($this->codeudores)>0){?>
<table width="60%" class="border-top">
<?php foreach ($this->codeudores as $key => $value) {?>
    <tr style="background-color:#fff" class="border-top2">
    <?php $nombre=$value->nombres." ".$value->nombres2." ".$value->apellido1." ".$value->apellido2;
    $nombre=str_replace("  ", " ",$nombre);
    ?> 
<tr>
<td>Nombre:</td>
<td align="left"><?php echo $nombre ?></td>
</tr>
<tr>
<td>Tipo de identificación:</td>
<td align="left"><?php echo $value->tipo_documento?></td>
</tr>
<tr>
<td>Número de identificación:</td>
<td align="left"><?php echo $value->cedula?></td>
</tr>
<tr>
<td>Ciudad de domicilio: </td>
<td align="left"><?php echo $this->ciudades[$value->ciudad_residencia]?></td>
</tr>
<tr>
<td>Dirección:</td>
<td align="left"><?php echo $value->direccion_residencia?></td>
</tr>
<tr>
<td>Teléfono:</td>
<td align="left"><?php echo $value->telefono?></td>
</tr>
<?php } ?>
</table>
<?php }?>
<br pagebreak="true" /> 
<div align="center"><strong><font size="10">CARTA DE INSTRUCCIONES<br>PARA EL DILIGENCIAMIENTO DEL PAGARÉ EN BLANCO</font></strong></div>
<div>
Señores<br>FONDO DE EMPLEADOS DE LA SECRETARÍA DISTRITAL DE INTEGRACIÓN SOCIAL “FESDIS”<br>Ciudad
</div>
<div><strong>Yo (Nosotros):</strong>
</div>
<br>
<table class="border-top2 border-bottom">
    <thead>
        <tr class="fondo-azul ">
            <th align="center" class="border-left border-right border-bottom2">Nombre de deudores</th>
            <th align="center" class="border-right border-bottom2">Tipo de identificación</th>
            <th align="center" class="border-right border-bottom2">Número de identificación</th>
            <th align="center" class="border-right border-bottom2">Ciudad de expedición</th>
            <th align="center" class="border-right border-bottom2">Calidad en que firma</th>
        </tr>
    </thead>
    <tr style="background-color:#fff" class="border-top border-bottom">
    <?php $nombre1=$this->solicitud->nombres." ".$this->solicitud->nombres2." ".$this->solicitud->apellido1." ".$this->solicitud->apellido2;
    $nombre1=str_replace("  ", " ",$nombre1);
    ?>
    <td align="center" class="border-left border-right border-bottom2"><?php echo $nombre1?></td>
    <td align="center" class=" border-right border-bottom2"><?php echo $this->solicitud->tipo_documento?></td>
    <td align="center" class="border-right border-bottom2"><?php echo $this->solicitud->documento?></td>
    <td align="center" class="border-right border-bottom2"><?php echo $this->ciudades[$this->solicitud->ciudad_documento]?></td>
    <td align="center" class="border-right border-bottom2">OTORGANTE</td>
    </tr>
    <?php foreach ($this->codeudores as $key => $value) {?>
    <tr style="background-color:#fff" class="border-top2">
    <?php $nombre=$value->nombres." ".$value->nombres2." ".$value->apellido1." ".$value->apellido2;
    $nombre=str_replace("  ", " ",$nombre);
    ?>
    <td align="center" class="border-left border-right border-bottom2"><?php echo $nombre?></td>
    <td align="center" class=" border-right border-bottom2"><?php echo $value->tipo_documento?></td>
    <td align="center" class="border-right border-bottom2"><?php echo $value->cedula?></td>
    <td align="center" class="border-right border-bottom2"><?php echo $this->ciudades[$value->ciudad_documento]?></td>
    <td align="center" class="border-right border-bottom2">CODEUDOR</td>
    </tr>
    <?php } ?>
</table>
<br><br>
<div align="justify">identificado(s) como aparece al pie de mi(nuestras) correspondiente(s) firma(s) obrando en mi(nuestra) calidad de deudor(es) autorizo(amos) en forma
permanente e irrevocable al FONDO DE EMPLEADOS DE LA SECRETARÍA DISTRITAL DE INTEGRACIÓN SOCIAL “FESDIS” o cualquier otro tenedor
legítimo del pagaré que he(mos) suscrito a favor de “FESDIS”, para que haciendo uso de las facultades conferidas en el artículo 622 del Código de Comercio
diligencie los espacios en blanco contenidos en el pagaré N°. 1093273 cuando se presente una de las circunstancias de exigibilidad contenidas en la
cláusula quinta del texto del pagaré objeto de esta autorización.</div>
<div>Para diligenciar el pagaré “FESDIS”, no requerirá dar aviso al(a los) firmante(s) del mismo y se ceñirá de acuerdo a las siguientes instrucciones:
<ol class="lista-pdf">
<li>El espacio reservado para el número del pagaré, será diligenciado con el número que “FESDIS” haya asignado.</li>
<li>El espacio reservado para la identificación del deudor principal y deudores solidarios será diligenciado con el nombre y el número de cédula de
ciudadanía del deudor principal y deudores solidarios que suscriben la solicitud del crédito, el pagaré y la presente carta de instrucciones.</li>
<li>El espacio reservado para la cuantía del pagaré será igual al monto de las sumas que adeude a “FESDIS” tanto por capital como intereses
remuneratorios y moratorios.</li>
<li>El espacio reservado para la fecha de otorgamiento y vencimiento, será diligenciado con las fechas que determine “FESDIS”.</li>
<li>El espacio reservado para el plazo y valor de las cuotas, será diligenciado con el valor en letras y números correspondiente al valor de las cuotas
mensuales, determinadas por la división entre el valor del préstamo concedido más los respectivos intereses y el número de meses correspondientes
al plazo autorizado por “FESDIS” para el pago total de la obligación.</li>
<li>El espacio correspondiente al interés, será diligenciado con el porcentaje de interés corriente con el que fue aprobado el crédito por “FESDIS”.</li>
<li>El espacio correspondiente a la tasa de interés moratoria será la máxima legal vigente.</li>
<li>El espacio reservado para la ciudad de otorgamiento del pagaré, será diligenciado con el nombre de la ciudad en que fue suscrita la presente carta
de instrucciones</li>
<li>El pagaré así llenado según los preceptos que se enumeran en el pagaré será exigible inmediatamente y prestará mérito ejecutivo sin más requisitos.</li>
</ol>
</div>
<div>
Dejo(amos) constancia que la presente autorización estará vigente mientras exista cualquier obligación mi(nuestra) a favor de “FESDIS” y de igual forma
declaro(amos) que he(mos) recibido copia de la presente carta de instrucciones.</div>
<div>En constancia de lo anterior se firma esta carta de instrucciones el día (año-mes-día) _______________</div>
<div>
<strong>DEUDOR(ES);</strong><br><br><br><br><br><br><br><br><br>
</div>
<table width="60%" class="border-top"> 
<tr>
<td>Nombre:</td>
<td align="left"><?php echo $nombre1?></td>
</tr>
<tr>
<td>Tipo de identificación:</td>
<td align="left"><?php echo $this->solicitud->tipo_documento?></td>
</tr>
<tr>
<td>Número de identificación:</td>
<td align="left"><?php echo $this->solicitud->documento?></td>
</tr>
<tr>
<td>Ciudad de domicilio: </td>
<td align="left"><?php echo $this->ciudades[$value->ciudad_residencia]?></td>
</tr>
<tr>
<td>Dirección:</td>
<td align="left"><?php echo $this->solicitud->direccion_residencia?></td>
</tr>
<tr>
<td>Teléfono:</td>
<td align="left"><?php echo $this->solicitud->telefono?></td>
</tr>
</table>
<br><br><br>
<?php if(count($this->codeudores)>0){?>
<table width="60%" class="border-top">
<?php foreach ($this->codeudores as $key => $value) {?>
    <tr style="background-color:#fff" class="border-top2">
    <?php $nombre=$value->nombres." ".$value->nombres2." ".$value->apellido1." ".$value->apellido2;
    $nombre=str_replace("  ", " ",$nombre);
    ?> 
<tr>
<td>Nombre:</td>
<td align="left"><?php echo $nombre ?></td>
</tr>
<tr>
<td>Tipo de identificación:</td>
<td align="left"><?php echo $value->tipo_documento?></td>
</tr>
<tr>
<td>Número de identificación:</td>
<td align="left"><?php echo $value->cedula?></td>
</tr>
<tr>
<td>Ciudad de domicilio: </td>
<td align="left"><?php echo $this->ciudades[$value->ciudad_residencia]?></td>
</tr>
<tr>
<td>Dirección:</td>
<td align="left"><?php echo $value->direccion_residencia?></td>
</tr>
<tr>
<td>Teléfono:</td>
<td align="left"><?php echo $value->telefono?></td>
</tr>
<?php } ?>
</table>
<?php } ?>