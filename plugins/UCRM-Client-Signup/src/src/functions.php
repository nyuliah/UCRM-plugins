<?php
## Format and write Logs for plugin.log
function log_event($log_title, $event, $type='log') {
  $current_time = date(DATE_ATOM);
  $message = "\n[{$current_time}][{$type}]  - [#{$log_title}] \n";
  $message .= $event;
  $message .= "\n[{$current_time}][{$type}] - [/{$log_title}] \n";
  
  file_put_contents(PROJECT_PATH.'/data/plugin.log', $message, FILE_APPEND | LOCK_EX);
}

## Return json responses to requests
function json_response($message = null, $code = 200, $no_format=false) {
  http_response_code($code);
  if ($no_format) {
    return $message;
  } else {
    return json_encode(array(
      'status' => $code,
      'message' => $message
    ));
  }
}