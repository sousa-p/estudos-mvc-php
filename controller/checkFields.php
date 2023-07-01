<?php
  function host_return ($type, $msg) {
    echo json_encode([
      'type' => $type,
      'msg' => $msg
    ]);
    exit();
  }
?>