<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EnLiven Animate</title>
  <link rel="shortcut icon" type="image/jpg" href="res/icons/favicon.ico"/>

  <!-- STYLESHEET -->
  <link rel="stylesheet" href="style/index.css">
  <!-- EXTERNAL SCRIPTS -->
  <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
  <script src="https://kit.fontawesome.com/3d9aefd90b.js" crossorigin="anonymous"></script>
  <script src="scripts/pixi/pixi.min.js"></script>
  <!-- FRONTEND SCRIPTS -->
  <script src="scripts/navbar.js" async></script>
  <script src="scripts/home-navbar.js" async></script>
  <script src="scripts/properties.js" async></script>
  <script src="scripts/treeview.js" async></script>
  <script src="scripts/import.js" async></script>
  <!-- BACKEND SCRIPTS -->
  <script src="scripts/display.js" async></script>
  <script src="scripts/buttons.js" async></script>
  <script src="scripts/moving.js" async></script>
  <script src="scripts/scaling.js" async></script>
  <script src="scripts/rotating.js" async></script>
  <script src="scripts/converting.js" async></script>
  <script src="scripts/timeline.js" async></script>
  <script src="scripts/playing.js" async></script>
  <script src="scripts/looping.js" async></script>
  <script src="scripts/input.js" async></script>
  <script src="scripts/add.js" async></script>
  <script src="scripts/export.js" async></script>
  <script src="scripts/onion.js" async></script>
  <script src="scripts/undo.js" async></script>
  <script src="scripts/background.js" async></script>
  <script src="scripts/keyboard.js" async></script>
  <script src="scripts/Parenting.js" async></script>
  <!-- MAIN SCRIPT -->
  <script src="scripts/main.js" async></script>
</head>

<body>
  <div id="grid">
    <!-- TOP NAVBAR -->
    <div id="navbar">
      <a id="home" class="navbar-button" href="newhome.html"><i class="fas fa-leaf"></i></a>
      <div class="dropdown">
        <button onclick="displayDropdown('file-dropdown')" class="navbar-button">File</button>
        <div id="file-dropdown" class="dropdown-content">
          <a href="javascript:location.reload(true)">New File</a>
          <button onclick="exportE()">Export</button>
        </div>
      </div>
      <div class="dropdown">
        <button onclick="displayDropdown('edit-dropdown')" class="navbar-button">Edit</button>
        <div id="edit-dropdown" class="dropdown-content">
          <button onclick="undo();">Undo</button>
          <!-- <a href="#redo">Redo</a> -->
          <!-- <a href="#cut">Cut</a>
          <a href="#copy">Copy</a>
          <a href="#paste">Paste</a> -->
        </div>
      </div>
      <div class="dropdown">
        <button onclick="displayDropdown('view-dropdown')" class="navbar-button">View</button>
        <div id="view-dropdown" class="dropdown-content">
          <!-- <a href="#fullscreen">Full Screen</a> -->
          <button onclick="play();">Play</button>
          <button onclick="playFromStart();">Play from Start</button>
          <button onclick="pause();">Pause</button>
        </div>
      </div>
      <div class="dropdown">
        <button onclick="displayDropdown('add-dropdown')" class="navbar-button">Add</button>
        <div id="add-dropdown" class="dropdown-content">
          <button onclick="addCircle();">Circle</button>
          <button onclick="addSquare();">Square</button>
          <button onclick="addTriangle();">Triangle</button>
          <button onclick="addHuman();">Human</button>
        </div>
      </div>

      <button id="delete" class="navbar-button" type="button" onclick="deleteSelectedSprite();">Delete</button>
      <div class="dropdown">

      <button onclick="displayDropdown('background-dropdown')" class="navbar-button">Background</button>
      <div id="background-dropdown" class="dropdown-content">
        <button onclick="addDefault();">Default</button>
        <button onclick="addBlackBackground();">BlackBackground</button>
        <button onclick="addYourName();">YourNameBackground</button>
      </div>

    </div>
    </div>
    
    <!-- RELATIONS PANEL -->
    <div id="relations" class="panel">
      <ul id="relations-list">
      </ul>
    </div>

    <!-- CANVAS PANEL -->
    <div id="canvas">
    </div>

    <!-- PROPERTIES PANEL -->
    <div id="properties" class="panel">
      <p id="x">X</p><input type="number" id="xpos" name="xpos" min="-100" max="100000">
      <p id="y">Y</p><input type="number" id="ypos" name="ypos" min="-100" max="100000">
      <p id="w">W</p><input type="number" id="width" name="width" min="0" max="100000">
      <p id="h">H</p><input type="number" id="height" name="height" min="0" max="100000">
      <p id="r">R</p><input type="number" id="rotation" name="rotation" min="-100000" max="100000">
      <p id = "c">Color Picker<input type="color" id="colorpicker" value="#1b9834">
      <button onclick="changeColor()" class="navbar-button"> Change Color</button></p>
    </div>
    
    <!-- TIMELINE PANEL -->
    <div id="timeline" class="panel">
      <button class="timeline-button" onclick="play();"><i class="fas fa-play"></i></button>
      <button class="timeline-button" onclick="pause();"><i class="fas fa-pause"></i></button>
      <button class="timeline-button" onclick="addKeyframe();"><i class="fas fa-plus"></i></button>
      <button id="deleteKeyframeButton" class="delete-disabled" onclick=""><i class="fas fa-minus"></i></button>
      <button class="timeline-button" onclick="editKeyframe();">REPLACE</button>
      <span></span>
      <button id="onion" class="onion-disabled" type="button" onclick="toggleOnionSkins();"><i class="fas fa-ellipsis-h"></i></button>
      <button id="loop" class="loop-disabled" type="button" onclick="toggleLooping();"><i class="fas fa-undo-alt"></i></button>
      <div id="fpsSlider-container" style="background-color: #d1e1d1; border-radius: 10px; padding: 10px;">
        <p style="text-align: justify;">FPS</p>
        <label id="fpsSlider-label" for="slider">FPS</label>
        <input id="fpsSlider" type="range" name="fpsSlider" min="20" max="120" value="60">
      </div>
      <div id="tweensSlider-container"style="background-color: #d1e1d1; border-radius: 10px; padding: 10px;" >
        <p style="text-align: justify;">TWEENS</p>
        <label id="tweensSlider-label" for="slider">TWEENS</label>
        <input id="tweensSlider" type="range" name="tweensSlider" min="0" max="30" value="20">
      </div>
      <div id="timeline-keyframes"></div>
    </div>
  </div>
</body>
</html>
