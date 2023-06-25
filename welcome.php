<style>
  @import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@100;500&display=swap');

* {
  margin: 0;
  padding: 0;
}

body {
  background: #282c34;
  font-size: 2vmin;
  font-family: JetBrains Mono, monospace;
  height: 100vh;
  width: 100vw;
  display: flex;
  justify-content: center;
  align-items: center;
  color: #e4bb68;
}

.string {
  display: flex;
  flex-direction: column;
  text-align: center;
  animation: move 4s infinite;
}

.greeting {
  position: relative;
  top: 8.6vmin;
  animation: white-out 5s infinite;
}

.closure::after {
  content: '';
  position: absolute;
  height: 25vmin;
  width: 40vmin;
  background: #282c34;
  transform: translate(-45vmin, -24.5vmin);
}

.closure::before {
  content: '';
  position: absolute;
  height: 25vmin;
  width: 40vmin;
  background: #282c34;
  transform: translate(-40vmin, 5vmin);
}

.en {
  color: #fa8231;
}

.es {
  color: white;
}

.de {
  color: #c678dd;
}

.it {
  color: #a9b0bd;
}

@keyframes move {
  25% {
    transform: translatey(-3vmin);
    opacity: 1;
  }
  50% {
    transform: translatey(-8vmin);
  }
  75% {
    transform: translatey(-13.7vmin);
  }
}
</style>
<h1>System<span style="color:white;">.<span style="color:#e06c75;">out</span>.</span><span style="color:#61afef;">println</span>("</h1>
<div class="string">
  <h1 class="greeting en">Hello World!</h1>
  <h1 class="greeting en">WELCOME!!</h1>
  <h1 class="greeting en">Loged In!</h1>
</div>
<h1 class="closure">");</h1>
<?php
header( "refresh:3; dashboard.php" ); 
?>