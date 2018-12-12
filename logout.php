<script src="/iframe.js"></script>
<?php

  unset($_COOKIE['admin']);
  setcookie('admin', null, -1, '/');
  unset($_COOKIE['name']);
  setcookie('name', null, -1, '/');
  echo '<script type="text/javascript">',
   'reloadParent();',
   '</script>';
?>
