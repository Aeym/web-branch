<?php
function lookfor($tab, $cat) {
  foreach($tab as $test) {
    if ($test == $cat)
      return (1);
  }
  return (0);
}
 ?>
