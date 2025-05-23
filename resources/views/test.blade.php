<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CBT Visibility Test</title>
  <style>
    body {
      font-family: sans-serif;
      background: #f9f9f9;
      padding: 20px;
    }
    #log {
      background: #111;
      color: #0f0;
      padding: 10px;
      height: 300px;
      overflow-y: scroll;
      border-radius: 10px;
      font-family: monospace;
    }
  </style>
</head>
<body>
  <h2>CBT Visibility & Focus Test</h2>
  <p>Website ini akan mencatat jika kamu keluar tab, minimize, atau hilang fokus.</p>
  <div id="log"></div>

  <script>
    const logDiv = document.getElementById('log');
    function log(msg) {
      const time = new Date().toLocaleTimeString();
      logDiv.innerHTML += `[${time}] ${msg}<br>`;
      logDiv.scrollTop = logDiv.scrollHeight;
    }

    document.addEventListener('visibilitychange', () => {
      if (document.hidden) {
        log('TAB HIDDEN: Kamu keluar dari tab atau membuka recent apps.');
      } else {
        log('TAB VISIBLE: Kamu kembali ke tab.');
      }
    });

    window.addEventListener('blur', () => {
      log('WINDOW BLUR: Kemungkinan kamu switch app atau buka recent.');
    });

    window.addEventListener('focus', () => {
      log('WINDOW FOCUS: Kamu kembali ke browser.');
    });

    log('Monitoring dimulai...');
  </script>
</body>
</html>