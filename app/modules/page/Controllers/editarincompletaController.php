<?php

/**
 *
 */

class Page_editarincompletaController extends Page_mainController
{

  public function indexAction()
  {
    $id = $this->_getSanitizedParam("id");

    $solicitudModel = new Administracion_Model_DbTable_Solicitudes();
    $solicitud = $solicitudModel->getById($id);
    if ($solicitud->vencimiento_aplazado == 1 || $solicitud->validacion == 8 || $solicitud->validacion == 4) {
      header("Location: https://creditosfondtodos.com.co/");
    }
    $hash = $this->_getSanitizedParam("hash");
    $hash2 = md5($solicitud->cedula . "F0nK");
    if ($hash && $hash == $hash2) {
      $this->_view->solicitud = $solicitud;
      $this->_view->id = $id;
      $linea = $solicitud->linea;
      $lineaModel = new Administracion_Model_DbTable_Lineas();
      $this->_view->linea = $lineaModel->getList(" codigo='$linea' ", "")[0];

      $documentosModel = new Administracion_Model_DbTable_Documentos();
      $documentos = $documentosModel->getList(" solicitud = '$id' AND tipo='1' ", "")[0];
      //print_r($documentos);
      $this->_view->documentos = $documentos;
    } else {
      //header("Location: https://creditosfondtodos.com.co/");
    }
  }
  public function updateAction()
  {
    $id = $this->_getSanitizedParam("id");
    $solicitudModel = new Administracion_Model_DbTable_Solicitudes();
    $solicitud = $solicitudModel->getById($id);
    $uploadImage =  new Core_Model_Upload_Document();
    $documentosModel = new Administracion_Model_DbTable_Documentos();
    $tipo = 1;

    $documentosAdicionalesModel = new Administracion_Model_DbTable_Documentosadicionales();

    //print_r($_FILES);
    if ($_FILES['otros_documentos4']['name'] != '') {
      $archivo = $uploadImage->upload("otros_documentos4");
      $data['titulo'] = $archivo;
      $data['archivo'] = $archivo;
      $data['fecha'] = date("Y-m-d h:i:s");
      $data['quien'] = 0;
      $data['solicitud'] = $id;
      $documentosAdicionalesModel->insert($data);

      //echo $archivo;
      //$documentosModel->editar('otros_documentos4',$archivo,$id,$tipo);
    }
    if ($_FILES['otros_documentos5']['name'] != '') {
      $archivo = $uploadImage->upload("otros_documentos5");
      $data['titulo'] = $archivo;
      $data['archivo'] = $archivo;
      $data['fecha'] = date("Y-m-d h:i:s");
      $data['quien'] = 0;
      $data['solicitud'] = $id;
      $documentosAdicionalesModel->insert($data);
      //$documentosModel->editar('otros_documentos5',$archivo,$id,$tipo);
    }
    if ($_FILES['otros_documentos6']['name'] != '') {
      $archivo = $uploadImage->upload("otros_documentos6");
      $data['titulo'] = $archivo;
      $data['archivo'] = $archivo;
      $data['fecha'] = date("Y-m-d h:i:s");
      $data['quien'] = 0;
      $data['solicitud'] = $id;
      $documentosAdicionalesModel->insert($data);
      //$documentosModel->editar('otros_documentos5',$archivo,$id,$tipo);
    }
    $solicitudModel->editField($id, "validacion", 0);
    $solicitudModel->editField($id, "estado_autorizo", "");
    $solicitudModel->editField($id, "documentos_actualizados", 1);
    $logestado = new Administracion_Model_DbTable_Logestado();
    $hoy = date("Y-m-d");
    $hora = date("H:i:s");
    $dataestado["solicitud"] = $id;
    $dataestado["estado"] = "Actualización de documentos";
    $dataestado["usuario"] = "Asociado";
    $dataestado["fecha"] = $hoy . " " . $hora;
    $logestado->insert($dataestado);
    header("Location: /page/editarincompleta/envio");
  }
  public function envioAction()
  {
  }
}
