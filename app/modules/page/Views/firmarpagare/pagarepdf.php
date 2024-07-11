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

<div align="center"><strong>FONDO DE EMPLEADOS D1 SAS <br>FONDTODOS.<br>PAGARÉ Y CARTA DE INSTRUCCIONES</strong>
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
<div style="text-align:justify">Actuando en mi(nuestro) propio nombre y representación, declaro(amos) que: PRIMERO. - DERECHO INCORPORADO: Prometo(emos) pagar a la orden del FONDO DE
EMPLEADOS DE D1 SAS, con Nit.901-281-483-7 (en adelante Fondtodos) en su oficina ubicada en la ciudad de _______________, la suma de $_______________
moneda corriente, que le debo(debemos) en forma solidaria e incondicional. El pago lo realizaré(mos) en _______________ cuotas por valor de $_______________ cada
una, siendo exigible la primera de ellas el día _______________ y así sucesivamente el mismo día hasta la cancelación total de la deuda. La primera cuota del crédito
podrá variar considerando los intereses remuneratorios causados desde la fecha de desembolso hasta la fecha de corte. SEGUNDO. - INTERESES CORRIENTES: Que
sobre cada una de las cuotas y sobre los saldos insolutos de capital a mi(nuestro) cargo pagaré(mos) intereses remuneratorios liquidados y pagaderos en la modalidad mes
vencido a la tasa efectiva anual del _______________%. TERCERO. - INTERESES DE MORA: En caso de mora en la cancelación de una o más cuotas, pagaré(mos)
intereses de mora liquidados a la tasa más alta permitida por la ley y certificada por la Superintendencia Financiera de Colombia. Los intereses de mora se causarán desde la
exigibilidad de la cuota vencida hasta la fecha en que se verifique su pago. CUARTO.- CLÁUSULA ACELERATORIA: Fondtodos podrá declarar extinguido el plazo pactado y
exigir anticipadamente el derecho incorporado en este instrumento, sin necesidad de requerimiento judicial o extrajudicial alguno y por tanto, exigir a partir de ese momento su
pago total, sus intereses moratorios, primas de seguros y los gastos ocasionados por la cobranza que haya pagado por mi(nuestra) cuenta o que se causen con posterioridad,
cuando se cumpla alguna de las siguientes causales: (1) Por mora en el pago de una o más de las cuotas pactadas. (2) Cuando a juicio de Fondtodos las garantías constituidas
para respaldar el crédito no mantengan los niveles de cobertura adecuados, o sufran deterioro o sean perseguidas por otros acreedores o autoridades administrativas. (3)
Cuando haya inexactitud o falsedad en los documentos presentados a Fondtodos para obtener la aprobación y/o desembolso del respectivo crédito. (4) Cuando la información
comercial y financiera actualizada que posea Fondtodos y/o la información proveniente de las centrales de riesgo y/o el servicio de la deuda permitan establecer que se
ha alterado o mermado sustancialmente la solvencia y capacidad de pago del(los) deudor(es) que a juicio de Fondtodos ponga en peligro el pago de la deuda. (5) Cuando
no se le dé al crédito la destinación para la cual fue concedido. (6) Cuando incurra(mos) en mora en el pago de cualquier otro crédito que me(nos) fuere otorgado por
Fondtodos individual, conjunta o separadamente. (7) Si llegare a enajenar el(los) bienes dados en garantía sin la autorización de Fondtodos. (8) Cuando incurra(mos) en otra
causal establecida en la ley, sus normas reglamentarias o disposiciones de autoridad competente para exigir el pago de la obligación contenida en este pagaré. Parágrafo.-
Restitución del Plazo: De conformidad con lo establecido en el artículo 69 de la Ley 45 de 1990, Fondtodos podrá restituir el plazo de la obligación a mi(nuestros) cargo,
en cuyo caso los intereses de mora se liquidarán sobre las cuotas periódicas vencidas aun cuando éstas comprendan solamente intereses, evento en el cual me(nos)
obligo(amos) a suscribir un nuevo pagaré, en el entendido de que ni la restitución de plazo, ni la suscripción del nuevo pagaré, conllevan a una novación o la extinción de
las garantías constituidas, las cuales se mantendrán vigentes en respaldo de las obligaciones existentes y de las contenidas en los nuevos documentos de deuda. QUINTO.
- SUBSISTENCIA DE LA SOLIDARIDAD: Que la forma solidaria en que me(nos) obligo(amos) subsiste ante cualquier variación a lo estipulado o en caso de prórroga de
la obligación y dentro de todo el tiempo de la misma. Igualmente declaro(amos) que entre los codeudores nos conferimos representación recíproca, para que con solo uno
de nosotros se pacte la reestructuración, refinanciación, novación o prórroga de la deuda, y ante cualquier novedad se mantendrá la solidaridad que adquirimos respecto
de las obligaciones derivadas de este pagaré, así como la vigencia de las garantías otorgadas. SEXTO. - INSTRUCCIONES DE DILIGENCIAMIENTO: De conformidad con
lo establecido en el artículo 622 del Código de Comercio, he(mos) otorgado el presente pagaré con espacios en blanco, los cuales podrán ser diligenciados por su tenedor
legítimo conforme a las siguientes instrucciones: [1] El espacio relativo a la ciudad donde debe efectuarse el pago corresponderá a la ciudad de Tocancipá (Cundinamarca)
o el domicilio del deudor a elección del acreedor. [2] El espacio relativo a la suma incorporada se diligenciará con el valor de capital e intereses que comprenden el crédito
junto con todos las gastos y comisiones que se causen a mi(nuestro) cargo por concepto de impuestos, primas de seguro, honorarios por las gestiones de cobranza que
efectivamente se hayan desplegado para lograr la recuperación de la cartera, y en general, cualquier gasto o cuenta por cobrar que se cargue a mi(nuestro) estado de
Cuenta y que tenga causación directa con la deuda. [3] El espacio correspondiente al número de cuotas se llenará con el plazo o cantidad de instalamentos a que me(nos)
fue aprobado el crédito. [4] El espacio reservado para el valor de la cuota deberá ser llenado con el monto equivalente a cada instalamento teniendo en cuenta el cálculo
del capital por la tasa de interés fraccionado por el número de cuotas pactadas. [5] El espacio relativo a la fecha de pago de la primera cuota deberá ser diligenciado con la
fecha que corresponda al pago del primer estado de Cuenta que se produzca a mi(nuestro) nombre después del desembolso del crédito. [6] El espacio correspondiente a
la fecha de vencimiento se llenará con la fecha en que se haga exigible la última cuota a mi(nuestro) cargo, pero sí se hiciere uso de la cláusula aceleratoria se diligenciará
con la fecha del día en que se llenen los espacios en blanco. [7] El espacio de la tasa de interés corriente deberá ser llenado con la tasa de interés remuneratorio que
esté cobrando Fondtodos a la fecha de desembolso del crédito expresada en términos efectivos anuales, y [8] La ciudad y fecha de otorgamiento del pagaré corresponderá
a la ciudad y la fecha en que Fondtodos lo diligencie o complete. SÉPTIMO. - GARANTÍA: Doy(damos) como garantía, además de la solidaridad y responsabilidad personal
en que me(nos) obligo(amos), los aportes sociales individuales y demás ahorros que poseo(emos) en Fondtodos, sobre los cuales autorizo(amos) descontar para cubrir los
saldos insolutos que sean actualmente exigibles a mi(nuestro) cargo. OCTAVO. - DESCUENTO POR NOMINA: Desde ahora autorizo(amos) irrevocablemente a mi(nuestro)
empleador para descontar de mi(nuestro) salario y demás emolumentos a mi(nuestro) favor, y pagar a favor de Fondtodos las sumas que mensualmente se causen como
consecuencia del crédito, dentro de los límites legales autorizados. De la misma forma autorizo(amos) para que con fines de control de mi(nuestra) capacidad de pago
y tratamiento de datos personales, mi(nuestro) empleador o entidad pagadora y Fondtodos se compartan entre sí la información relativa a mi(nuestro) salario, honorarios,
devengos, créditos, descuentos y datos personales. La presente autorización se extiende en el evento que llegare a cambiar de empleador o entidad pagadora en los términos
del artículo 7° de la Ley 1527 de 2012, permitiendo a Fondtodos exigir al nuevo empleador o entidad pagadora el descuento de los dineros que se causen a mi(nuestro) favor,
pudiendo descontarse hasta el 50% de mi(nuestro) salario, pensión u honorarios, en los términos que dan cuenta el artículo 55° y 56° del Decreto 1481 de 1989, con el
fin de pagar los saldos insolutos a mi(nuestro) cargo. NOVENO. - AUTORIZACIONES: Autorizo(amos) irrevocablemente a Fondtodos para: (I) En el evento de la terminación
de mi(nuestro) contrato de trabajo, se retenga de la liquidación definitiva de la relación laboral, cesantías, intereses de cesantías, prima, vacaciones e indemnizaciones, las
sumas correspondientes al saldo insoluto de la obligación a mi(nuestro) cargo, en los términos que dan cuenta el artículo 55° y 56° del Decreto 1481 de 1989. (II) Consultar,
reportar y procesar mi(nuestro) comportamiento crediticio, financiero o comercial ante las Centrales de Información Financiera legalmente constituidas, ya sea nacionales
o extranjeras, así como ante cualquier entidad que administre o maneje bases de datos. En general, la presente autorización comprende la facultad para realizar cualquier
tratamiento lícito de mis datos personales, comerciales y financieros, incluyendo la facultad para compartir información D1 SAS o del tenedor legítimo de este pagaré.
(III) Registrar en forma extracartular los abonos que efectúe a la obligación, para la cual será suficiente la constancia registrada en los extractos del crédito. (IV) Compensar
contra mis(nuestros) aportes el saldo insoluto de la obligación en el evento de retiro de Fondtodos por cualquier causa.<br><br>
En constancia se firma en la ciudad de _______________ el día (año-mes-día) <?php echo date("Y-m-d")?>
</div>
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
<td align="left"><?php echo $this->ciudades[$this->solicitud->ciudad_residencia]?></td>
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
