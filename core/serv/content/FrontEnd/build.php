<?php
  $disabled = true;
  if ($disabled !== false) {
    header("Location: /Core/");
    exit;
  }
?>
<body class='hold-transition'>
  <div class="container">
    <h2>Bitcraft Core<br><small><em>This site is not yet set up.</small></em></h2>
    <p>If you are the owner of this site, please <a href="/Core/">Login</a> and configure the application.</p>
  </div>
</body>
